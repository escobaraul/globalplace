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

    foreach ($files['images'] as $file) {
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('writable/uploads', $newName);

            $imageModel->insert([
                'advertisement_id' => $advertisement_id,
                'file_path' => 'uploads/' . $newName,
            ]);
        }
    }
    return redirect()->to('/advertisements')->with('success', 'Imágenes subidas exitosamente.');
}

}