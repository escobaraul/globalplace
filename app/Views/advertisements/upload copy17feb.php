<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágenes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .dropzone {
            border: 2px dashed #007bff;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Subir Imágenes para el Anuncio</h2>
    
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"> <?= session()->getFlashdata('error') ?> </p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"> <?= session()->getFlashdata('success') ?> </p>
    <?php endif; ?>
    
    <form action="<?= site_url('advertisements/upload/' . $advertisement_id) ?>" 
          class="dropzone" 
          id="image-upload" 
          method="POST" 
          enctype="multipart/form-data">
        <?= csrf_field() ?>
    </form>
    
    <script>
        Dropzone.options.imageUpload = {
            paramName: "images[]",
            maxFilesize: 5, // Tamaño máximo en MB por imagen
            acceptedFiles: "image/*",
            dictDefaultMessage: "Arrastra y suelta tus imágenes aquí o haz clic para seleccionar",
            addRemoveLinks: true,
            success: function(file, response) {
                console.log("Imagen subida exitosamente", response);
            },
            error: function(file, response) {
                console.log("Error al subir imagen", response);
            }
        };
    </script>
</body>
</html>
