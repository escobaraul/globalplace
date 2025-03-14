<?php
namespace App\Controllers;

use App\Models\ImageModel;
use CodeIgniter\Controller;

class ImageUploadController extends Controller
{
    public function uploadForm($advertisement_id)
    {
        return view('advertisements/upload', ['advertisement_id' => $advertisement_id]);
    }

    public function upload($advertisement_id)
    {
        $imageModel = new ImageModel();
        $files = $this->request->getFiles();

        if (!$files || !isset($files['images'])) {
            return redirect()->back()->with('error', 'No se recibieron archivos.');
        }

        $imageCount = 0;
        $videoCount = 0;

        foreach ($files['images'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $mimeType = $file->getMimeType();

                if (str_starts_with($mimeType, 'image/')) {
                    $imageCount++;
                    if ($imageCount > 4) {
                        return redirect()->back()->with('error', 'Solo se pueden subir hasta 4 imágenes.');
                    }
                } elseif (str_starts_with($mimeType, 'video/')) {
                    $videoCount++;
                    if ($videoCount > 1) {
                        return redirect()->back()->with('error', 'Solo se permite subir 1 video.');
                    }

                    // Validar duración del video (requiere ffmpeg instalado en el servidor)
                    $filePath = $file->getTempName();
                    $duration = shell_exec("ffprobe -i $filePath -show_entries format=duration -v quiet -of csv=p=0");

                    if ($duration > 60) {
                        return redirect()->back()->with('error', 'El video no puede superar 1 minuto de duración.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Solo se permiten imágenes y videos.');
                }

                // Guardar archivo
                $newName = $file->getRandomName();
                $file->move('writable/uploads', $newName);

                $imageModel->insert([
                    'advertisement_id' => $advertisement_id,
                    'file_path' => 'uploads/' . $newName,
                ]);
            }
        }

        return redirect()->to('/advertisements')->with('success', 'Archivos subidos exitosamente.');
    }
}