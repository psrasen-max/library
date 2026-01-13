const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const debug = require('gulp-debug');
const rename = require('gulp-rename');
const del = require('del');
const minifyCss = require('gulp-clean-css');
const terser = require("gulp-terser");
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
    web: {
        scssFiles: [
            assetsDir + '/scss/web.scss',
        ],
        jsFiles: [
            assetsDir + '/js/web/*.js',
            assetsDir + '/js/web/**/*.js',
        ]
    },
    admin: {
        scssFiles: [
            assetsDir + '/scss/admin.scss',
        ],
        jsFiles: [
            assetsDir + '/js/admin/*.js',
            assetsDir + '/js/admin/**/*.js',
        ]
    }
};

var scssWatchFiles = [
    assetsDir + '/scss/**/*.scss'
];

//Arquivos externos js
var vendorJsFiles = [
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery-ui/dist/jquery-ui.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'node_modules/parsleyjs/dist/parsley.js',
    'node_modules/parsleyjs/dist/i18n/pt-br.js',
    'node_modules/bootbox/dist/bootbox.js',
    'node_modules/jquery-mask-plugin/dist/jquery.mask.js',
    'node_modules/moment/moment.js',
    'node_modules/moment/locale/pt-br.js',
    'node_modules/rrule/dist/es5/rrule.js',
    'node_modules/fullcalendar/dist/fullcalendar.js',
    'node_modules/fullcalendar/dist/locale/pt-br.js',
    'node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.js',
    'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js',
    'node_modules/jquery-maskmoney/dist/jquery.maskMoney.min.js',
    'node_modules/select2/dist/js/select2.js',
    'node_modules/select2/dist/js/i18n/pt-BR.js',
    'node_modules/autosize/dist/autosize.js',
    'node_modules/superfish/dist/js/superfish.js',
    'node_modules/sortablejs/Sortable.js',
    'node_modules/bootstrap4-tagsinput-douglasanpa/tagsinput.js',
    'node_modules/popper.js/dist/umd/popper.js',
    'node_modules/swiper/swiper-bundle.js',
    'node_modules/shpjs/dist/shp.js',
    'node_modules/@turf/turf/turf.min.js',
    'node_modules/js-cookie/dist/js.cookie.min.js',
    'node_modules/jsqr/dist/jsQR.js',
    'node_modules/chart.js/dist/chart.js',
    'node_modules/jquery.qrcode/jquery.qrcode.min.js',
    'node_modules/quagga/dist/quagga.js',

    // DataTables (base deve vir primeiro)
    'node_modules/datatables.net/js/dataTables.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',

    // DataTables Módulos + Bootstrap 4
    'node_modules/datatables.net-autofill/js/dataTables.autoFill.js',
    'node_modules/datatables.net-autofill-bs4/js/autoFill.bootstrap4.js',

    'node_modules/datatables.net-buttons/js/dataTables.buttons.js',
    'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.js',

    'node_modules/datatables.net-datetime/js/dataTables.dateTime.js',

    'node_modules/datatables.net-fixedcolumns/js/dataTables.fixedColumns.js',
    'node_modules/datatables.net-fixedcolumns-bs4/js/fixedColumns.bootstrap4.js',

    'node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.js',
    'node_modules/datatables.net-fixedheader-bs4/js/fixedHeader.bootstrap4.js',

    'node_modules/datatables.net-keytable/js/dataTables.keyTable.js',
    'node_modules/datatables.net-keytable-bs4/js/keyTable.bootstrap4.js',

    'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
    'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.js',

    'node_modules/datatables.net-rowgroup/js/dataTables.rowGroup.js',
    'node_modules/datatables.net-rowgroup-bs4/js/rowGroup.bootstrap4.js',

    'node_modules/datatables.net-scroller/js/dataTables.scroller.js',
    'node_modules/datatables.net-scroller-bs4/js/scroller.bootstrap4.js',

    'node_modules/datatables.net-searchbuilder/js/dataTables.searchBuilder.js',
    'node_modules/datatables.net-searchbuilder-bs4/js/searchBuilder.bootstrap4.js',

    'node_modules/datatables.net-searchpanes/js/dataTables.searchPanes.js',
    'node_modules/datatables.net-searchpanes-bs4/js/searchPanes.bootstrap4.js',

    'node_modules/datatables.net-select/js/dataTables.select.js',
    'node_modules/datatables.net-select-bs4/js/select.bootstrap4.js',

    'node_modules/datatables.net-staterestore/js/dataTables.stateRestore.js',
    'node_modules/datatables.net-staterestore-bs4/js/stateRestore.bootstrap4.js',
    
    'node_modules/tabulator-tables/dist/js/tabulator.min.js'

]

//Arquivos externos css
var vendorCssFiles = [
    'node_modules/animate.css/animate.css',
    'node_modules/fullcalendar/dist/fullcalendar.css',
    'node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.css',
    'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/superfish/dist/css/superfish.css',
    'node_modules/bootstrap4-tagsinput-douglasanpa/tagsinput.css',
    'node_modules/swiper/swiper-bundle.css',

    // DataTables
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    'node_modules/datatables.net-autofill-bs4/css/autoFill.bootstrap4.css',
    'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.css',
    'node_modules/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.css',
    'node_modules/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.css',
    'node_modules/datatables.net-keytable-bs4/css/keyTable.bootstrap4.css',
    'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.css',
    'node_modules/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.css',
    'node_modules/datatables.net-scroller-bs4/css/scroller.bootstrap4.css',
    'node_modules/datatables.net-searchbuilder-bs4/css/searchBuilder.bootstrap4.css',
    'node_modules/datatables.net-searchpanes-bs4/css/searchPanes.bootstrap4.css',
    'node_modules/datatables.net-select-bs4/css/select.bootstrap4.css',
    'node_modules/datatables.net-staterestore-bs4/css/stateRestore.bootstrap4.css',
    'node_modules/tabulator-tables/dist/css/tabulator.min.css',
    'node_modules/tabulator-tables/dist/css/tabulator_bootstrap5.min.css'
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

function pdfsDev() {
    return scssTask('resources/assets/scss/pdfs.scss', 'pdfs');
}

function pdfsDefinitiveDev() {
    return scssTask('resources/assets/scss/admin/pages/definitive.scss', 'pdfs-definitive');
}

function commonCssProd() {
    return scssTask(environments.common.scssFiles, 'common', 'prod');
}

function webCssDev() {
    return scssTask(environments.web.scssFiles, 'web');
}

function webCssProd() {
    return scssTask(environments.web.scssFiles, 'web', 'prod');
}

function adminCssDev() {
    return scssTask(environments.admin.scssFiles, 'admin');
}

function adminCssProd() {
    return scssTask(environments.admin.scssFiles, 'admin', 'prod');
}

function vendorCssDev() {
    return cssTask(vendorCssFiles, 'vendor');
}

function vendorCssProd() {
    return cssTask(vendorCssFiles, 'vendor', 'prod');
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

function webJsDev() {
    return jsTask(environments.web.jsFiles, 'web');
}

function webJsProd() {
    return jsTask(environments.web.jsFiles, 'web', 'prod');
}

function adminJsDev() {
    return jsTask(environments.admin.jsFiles, 'admin');
}

function adminJsProd() {
    return jsTask(environments.admin.jsFiles, 'admin', 'prod');
}

function vendorJsDev() {
    return jsTask(vendorJsFiles, 'vendor');
}

function vendorJsProd() {
    return jsTask(vendorJsFiles, 'vendor', 'prod');
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
    gulp.watch(scssWatchFiles, webCssDev);
    gulp.watch(scssWatchFiles, adminCssDev);

    // atualizar um arquivo scss específico
    gulp.watch('resources/assets/scss/pdfs.scss', pdfsDev);
    gulp.watch('resources/assets/scss/admin/pages/definitive.scss', pdfsDev);

    // Atualizar arquivos JS
    gulp.watch(environments.common.jsFiles, commonJsDev);
    gulp.watch(environments.web.jsFiles, webJsDev);
    gulp.watch(environments.admin.jsFiles, adminJsDev);
}

gulp.task('clean', gulp.series(cleanBuild));

gulp.task('build', gulp.series(
    cleanBuild, pdfsDev, pdfsDefinitiveDev,
    commonCssProd, commonJsProd,
    webCssProd, webJsProd,
    adminCssProd, adminJsProd,
    vendorCssProd, vendorJsProd,
    images,
    fonts,
));

gulp.task('default', gulp.series(
    cleanBuild, pdfsDev, pdfsDefinitiveDev,
    commonCssDev, commonJsDev,
    webCssDev, webJsDev,
    adminCssDev, adminJsDev,
    vendorCssDev, vendorJsDev,
    images,
    fonts
));

gulp.task('watch', gulp.series('default', watch));