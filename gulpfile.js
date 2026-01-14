const gulp = require('gulp');
const dartSass = require('sass');
const sass = require('gulp-sass')(dartSass);
const concat = require('gulp-concat');
const debug = require('gulp-debug');
const rename = require('gulp-rename');
const del = require('del');
const minifyCss = require('gulp-clean-css');
const terser = require('gulp-terser');
const argv = require('minimist')(process.argv.slice(2));

var buildDir = 'public/assets';
var assetsDir = 'resources/assets';

var environments = {
    common: {
        scssFiles: [
            assetsDir + '/scss/common.scss',
        ],
        jsFiles: [
            assetsDir + '/js/common/*.js',
            assetsDir + '/js/common/**/*.js',
        ]
    },
};

var scssWatchFiles = [
    assetsDir + '/scss/**/*.scss'
];

//Arquivos externos js
var vendorJsFiles = [

]

//Arquivos externos css
var vendorCssFiles = [
]

// Concatena os arquivos sass, converte e comprime em css
function sass2Css(files, outputName, env = 'dev') {

    outputName = outputName + (argv.tag ? '-' + argv.tag : '');

    var sassConfig = {
        outputStyle: env == 'prod' ? 'compressed' : 'expanded'
    };

    return gulp.src(files)
    .pipe(debug({ title: 'css-debug' }))
    .pipe(concat(outputName + '.scss'))
    .pipe(sass(sassConfig).on('error', sass.logError))
    .pipe(rename(outputName + '.min.css'))
    .pipe(gulp.dest(buildDir + '/css'));
}

// Concatena e mimifica os arquivos css se estiver em produção
function css(files, outputName, env = 'dev') {

    outputName = outputName + (argv.tag ? '-' + argv.tag : '');

    // Obtém o objeto com as chamadas.
    var obj = gulp.src(files)
    .pipe(debug({ title: 'css-debug' }))
    .pipe(concat(outputName + '.css'))
    .pipe(rename(outputName + '.min.css'));

    // Caso seja produção, minifica o css.
    if (env == 'prod') {
        obj.pipe(minifyCss({ compatibility: 'ie8' }));
    }

    return obj.pipe(gulp.dest(buildDir + '/css'));
}

// Concatena os arquivos js e comprime em js
function js2Mimify(files, outputName , env = 'dev') {

    outputName = outputName + (argv.tag ? '-' + argv.tag : '');

    var obj = gulp.src(files)
    .pipe(debug({ title: "js-debug" }))
    .pipe(concat(outputName + ".js"));

    var gulpTerserOptions = {
        output: { comments: false }
    };

    if (env == "prod") {
        obj = obj.pipe(terser(gulpTerserOptions));
    }

    return obj.pipe(rename(outputName + ".min.js"))
    .pipe(gulp.dest(buildDir + "/js"));
}

// Limpa o diretório de build
function cleanBuild() {
    return del([buildDir]);
}

// Copia as imagens da aplicação
function images() {

    return gulp.src("img/**/*", { cwd : assetsDir })
    .pipe(gulp.dest("public/assets/img"));
}

// Copia as fontes de aplicação
function fonts() {

    return gulp.src("fonts/**/*", { cwd : assetsDir })
    .pipe(gulp.dest("public/assets/fonts"));
}

// ---------------------------------------------------------------------------------------------------
// Tasks para CSS/SCSS

function scssTask(files, name, mode) {
    return sass2Css(files, name, mode);
}

function cssTask(files, name, mode) {
    return css(files, name, mode);
}

function commonCssDev() {
    return scssTask(environments.common.scssFiles, 'common');
}

function commonCssProd() {
    return scssTask(environments.common.scssFiles, 'common', 'prod');
}

// ---------------------------------------------------------------------------------------------------
// Tasks para JS

function jsTask(files, name, mode) {
    return js2Mimify(files, name, mode);
}

function commonJsDev() {
    return jsTask(environments.common.jsFiles, 'common');
}

function commonJsProd() {
    return jsTask(environments.common.jsFiles, 'common', 'prod');
}

// ---------------------------------------------------------------------------------------------------
// Tasks avulsas

/**
 * Monitora a alteração e realiza a publicação dos arquivos
 * @returns
 */
function watch() {

    // Atualizar arquivos SCSS
    gulp.watch(scssWatchFiles, commonCssDev);

    // Atualizar arquivos JS
    gulp.watch(environments.common.jsFiles, commonJsDev);
}

gulp.task('clean', gulp.series(cleanBuild));

gulp.task('build', gulp.series(
    cleanBuild, commonCssProd, commonJsProd,
    images,
    fonts,
));

gulp.task('default', gulp.series(
    cleanBuild, commonCssDev, commonJsDev,
    images,
    fonts
));

gulp.task('watch', gulp.series('default', watch));