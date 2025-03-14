<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágenes</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <script>
        Dropzone.options.uploadForm = {
            paramName: "images[]",
            maxFiles: 5, 
            acceptedFiles: "image/jpeg,image/png,image/gif,video/mp4,video/mpeg",
            init: function() {
                this.on("addedfile", function(file) {
                    let imageCount = 0;
                    let videoCount = 0;

                    this.files.forEach(f => {
                        if (f.type.startsWith("image/")) {
                            imageCount++;
                        } else if (f.type.startsWith("video/")) {
                            videoCount++;
                        }
                    });

                    if (imageCount > 4 || videoCount > 1) {
                        this.removeFile(file);
                        alert("Solo puedes subir un máximo de 4 imágenes y 1 video.");
                    }
                });
            }
        };
    </script>
</head>
<body>
    <h2>Subir Imágenes para el Anuncio</h2>
    
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"> <?= session()->getFlashdata('error') ?> </p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"> <?= session()->getFlashdata('success') ?> </p>
    <?php endif; ?>

    <form action="<?= site_url('advertisements/upload/' . $advertisement_id) ?>" method="POST" enctype="multipart/form-data" class="dropzone" id="uploadForm">
        <?= csrf_field() ?>
        <div class="dz-message">Arrastra y suelta hasta 4 imágenes y 1 video aquí o haz clic para seleccionar.</div>
    </form>
</body>
</html>
