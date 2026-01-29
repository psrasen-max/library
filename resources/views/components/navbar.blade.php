<nav class="navbar navbar-expand-sm nv-transparent px-0">

    <div class="container d-flex">

        <a class="navbar-brand" href="#">
            <img src="https://www.expopecas.com.br/assets/img/expo-pecas-logo.png">
        </a>

        <div class="collapse navbar-collapse d-flex" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-item nav-link" href="#">Sobre</a>

                <a class="nav-item nav-link" href="#">Galerias</a>

                <a class="nav-item nav-link" href="#">Publicações</a>

                <a class="nav-item nav-link" href="#">Inscreva-se</a>

                <a class="nav-item nav-link" href="#">Quero ser expositor</a>

                <div class="panel-expositor">
                    <a class="nav-item nav-link btn-panel" href="#">Área de Expositor</a>
                </div>

            </div>
        </div>

    </div>

</nav>

<style>
 
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap');


body {
    font-family: 'Montserrat', sans-serif;
}


.navbar {
    width: 100%;
    min-height: 90px;
    background-color: #ffffff !important;
    padding: 0 20px;
    align-items: center;
    transition: all 0.3s ease;
    

}


.navbar-brand img {
    
    width: auto;
    height: 65px;
}

/* 4. ALINHAMENTO DO MENU */
.navbar-nav {
    /* Garante que os itens fiquem centralizados verticalmente */
    align-items: center;

    /* FORÇA O MENU PARA A DIREITA (Corrige o ml-auto se estiver usando Bootstrap 5) */
    margin-left: auto !important;

    /* Espaçamento entre os links */
    gap: 20px;
}

/* 5. OS LINKS (SOBRE, GALERIAS...) */
.navbar-nav .nav-link {
    font-size: 13px;
    font-weight: 600;
    line-height: 34px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #000000 !important;
    border-radius: 4px;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #ffd700 !important;
    /* Amarelo ao passar o mouse */
}

/* =======================================================
   6. O BOTÃO AMARELO (PANEL EXPOSITOR)
   ======================================================= */

.panel-expositor {
    background-color: #ffe600;
    /* Amarelo Gema */
    border-radius: 6px;
    height: 40px;
    /* Altura fixa para criar o bloco */
    padding: 0 25px;
    /* Largura interna */

    /* Flexbox para centralizar o texto dentro da caixa */
    display: flex;
    align-items: center;
    justify-content: center;

    transition: background-color 0.3s ease;
    cursor: pointer;

    /* Margem extra para separar dos outros links */
    margin-left: 10px;
}

.panel-expositor:hover {
    background-color: #e6cf00;
    /* Escurece levemente no hover */
}

/* O TEXTO DENTRO DO BOTÃO */
.panel-expositor .btn-panel {
    color: #000000 !important;
    /* Força preto */
    font-weight: 800;
    font-size: 13px;
    text-transform: uppercase;
    padding: 0 !important;
    /* Remove padding padrão do link */
    margin: 0 !important;
    text-align: center;
    line-height: 1.2;
    white-space: nowrap;
    /* Mantém em uma linha (se quiser quebrar, avise) */
}
</style>