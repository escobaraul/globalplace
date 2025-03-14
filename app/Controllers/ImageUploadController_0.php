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
        
        if ($files = $this->request->getFiles()) {
            foreach ($files['images'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('uploads', $newName);
                    echo "Archivo subido: " . $newName . "<br>";
                
                    $imageModel->insert([
                        'advertisement_id' => $advertisement_id,
                        'file_path' => 'uploads/' . $newName,
                    ]);
                }
            }
            return redirect()->to('/advertisements')->with('success', 'Imágenes subidas exitosamente.');
        }
        
        return redirect()->back()->with('error', 'Error al subir las imágenes.');
    }
}


//if ($file->isValid() && !$file->hasMoved()) {
  //  $newName = $file->getRandomName();
    //$file->move(WRITEPATH . 'uploads', $newName);
    
    //$imageModel->insert([
    //    'advertisement_id' => $advertisement_id,
    //    'file_path' => '/uploads/' . $newName
    //]);
//}
