<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Globalplace' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background-color: #f36522 !important; }
        .container { padding-top: 20px; }
    </style>
    <!-- 🎨 Nuestro CSS -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>

    <?= view('partials/menu') ?> <!-- 🟢 Menú incluido en todas las páginas -->

    <div class="container">
        <?= $this->renderSection('content') ?> <!-- 🟢 Aquí va el contenido de cada vista -->
    </div>

    <?= view('partials/footer') ?> <!-- 🟢 Pie de página -->

</body>
</html>