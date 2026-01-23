<aside class="sidebar bg-dark">
    <div class="d-flex flex-column align-items-start pt-3 px-3 h-100">

        <a class="navbar-brand mb-4 text-white d-flex align-items-center text-decoration-none" href="#">
            <img src="https://img.freepik.com/vetores-gratis/identidade-de-marca-identidade-corporativa-logo-m-design_460848-10168.jpg?semt=ais_hybrid&w=740&q=80"
                alt="Logo" width="29" height="25" class="rounded me-2">
            <span class="fw-bold link-text">Myne Library</span>
        </a>

        <ul class="nav nav-pills flex-column w-100 gap-2">
            <li class="nav-item">
                <a href="{{ route('geral.painel') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('geral.painel') ? 'active fw-bold' : 'text-white-50' }}">
                    <i class="bi bi-grid-1x2 me-2"></i> 
                    <span class="link-text">Painel Geral</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.painel') }}"
                    class="nav-link d-flex align-items-center {{ request()->routeIs('users.painel') ? 'active fw-bold' : 'text-white-50' }}">
                    <i class="bi bi-people me-2"></i> 
                    <span class="link-text">Painel Usuários</span>
                </a>
            </li>
        </ul>

        <div class="mt-auto w-100 pb-4">
            <hr class="text-white-50"> 
            <a href="javascript:void(0)" id="toggleSidebar" class="nav-link text-white-50 d-flex align-items-center px-0">
                <i class="bi bi-box-arrow-left me-2"></i>
                <span class="link-text">Ocutar Painel</span>
            </a>
        </div>

    </div>
</aside>
