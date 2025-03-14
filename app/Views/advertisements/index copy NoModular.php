<!DOCTYPE html>
<html>
<head>
    <title>Advertisements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* 🎨 Color de fondo de la página (Alibaba naranja) */
        body {
            background-color: #f36522 !important; /* Forzado con !important ff6a00 */
        }

        /* 📦 Diseño de las cajas de anuncios */
        .card {
            background-color: #f9ba9d !important; /* Fondo blanco */
            border-radius: 10px !important; /* Bordes redondeados */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2) !important; /* Sombra más notoria */
            height: 100% !important; /* Todas las cajas del mismo alto */
            transition: transform 0.3s ease-in-out; /* Efecto hover */
        }

        /* ✨ Efecto al pasar el mouse */
        .card:hover {
            transform: scale(1.05); /* Hace zoom suave */
        }

        /* 🖼 Ajuste de imagen */
        .card img {
            height: 200px !important; /* Tamaño fijo */
            object-fit: cover !important; /* Recorta sin deformar */
            border-radius: 10px 10px 0 0 !important; /* Bordes redondeados arriba */
        }

        /* 🖼 Modal: Ajuste de imagen */
        .modal-body img {
            max-height: 300px !important;
            object-fit: contain !important;
        }
    </style>
</head>
<body>
    <?= view('partials/menu') ?>
    <div class="container mt-4">
        <div class="row">
            <!-- Espacio para la franja lateral (ocupa 3 columnas en pantallas grandes) -->
            <div class="col-lg-3 d-none d-lg-block">
                <h4 class="text-white">Filtros</h4>
                <p class="text-white">Aquí irá el sistema de filtros...</p>
            </div>
            
            <!-- Sección de anuncios -->
            <div class="col-lg-9">
                <h1 class="text-center text-white mb-4">Advertisements</h1>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
                    <?php foreach ($advertisements as $ad): ?>
                        <div class="col d-flex">
                            <div class="card shadow-sm w-100">
                                <!-- Imagen principal con enlace al modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#adModal<?= $ad['id'] ?>">
                                    <?php if (!empty($ad['images'])): ?>
                                        <img src="<?= base_url('writable/' . $ad['images'][0]) ?>" class="card-img-top" alt="Imagen del anuncio">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/no-image.jpg') ?>" class="card-img-top" alt="No Image">
                                    <?php endif; ?>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= esc($ad['title']) ?></h5>
                                    <p class="card-text"><?= esc(substr($ad['description'], 0, 50)) ?>...</p>
                                    <p class="card-text"><strong>Price:</strong> <?= esc($ad['price']) ?></p>
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#adModal<?= $ad['id'] ?>">
                                        Ver detalles
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="adModal<?= $ad['id'] ?>" tabindex="-1" aria-labelledby="adModalLabel<?= $ad['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="adModalLabel<?= $ad['id'] ?>"><?= esc($ad['title']) ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <?php if (!empty($ad['images'])): ?>
                                            <?php foreach ($ad['images'] as $image): ?>
                                                <img src="<?= base_url('writable/' . $image) ?>" class="img-fluid mb-2">
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <img src="<?= base_url('assets/no-image.jpg') ?>" class="img-fluid mb-2">
                                        <?php endif; ?>
                                        <p><?= esc($ad['description']) ?></p>
                                        <p><strong>Price:</strong> <?= esc($ad['price']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> <!-- Fin de la fila de anuncios -->
            </div> <!-- Fin de la sección de anuncios -->
        </div> <!-- Fin del row principal -->
    </div> <!-- Fin del container -->
</body>
</html>

