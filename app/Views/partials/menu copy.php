<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <!-- Logo a la izquierda -->
        <a class="navbar-brand" href="<?= site_url('/') ?>">
            <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" height="40">
        </a>

        <!-- Icono de idioma y campo de búsqueda alineados a la derecha -->
        <div class="d-flex align-items-center ms-auto">
            <!-- Icono de idioma -->
            <button class="btn btn-outline-secondary me-2">
                <i class="bi bi-translate"></i>
            </button>

            <!-- Campo de búsqueda -->
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>

<!-- Barra de navegación inferior -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= site_url('/') ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('/compra') ?>">Compra</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('/venta') ?>">Venta</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('/categorias') ?>">Categorías</a></li>
            </ul>
        </div>
    </div>
</nav>
