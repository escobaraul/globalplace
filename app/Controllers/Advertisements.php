<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\AdvertisementModel;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Entities\User;

class Advertisements extends Controller
{
    public function index()
    {
        $model = new AdvertisementModel();
        //$data['advertisements'] = $model->findAll();
        $data['advertisements'] = $model->getAdvertisementsWithImages();
        
        return view('advertisements/index', $data);
    }

    public function create()
    {
        helper('form');

        // Verificar que el usuario esté autenticado
        if (!auth()->loggedIn()) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para crear un anuncio.');
        }
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->getCategoryTree();

        return view('advertisements/create', $data);
    }

    public function store()
    {
        // Verificar que el usuario esté autenticado
        if (!auth()->loggedIn()) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para crear un anuncio.');
        }

        // Obtener el ID del usuario autenticado
        $user = auth()->user();
        $user_id = $user->id;

        // Instancia del modelo y captura de los datos
        $model = new AdvertisementModel();

        $data = [
            'user_id'        => $user_id,  // ID del usuario autenticado
            'category_id'    => $this->request->getPost('category_id'),
            'title'          => $this->request->getPost('title'),
            'description'    => $this->request->getPost('description'),
            'price'          => $this->request->getPost('price'),
            'expiration_date'=> $this->request->getPost('expiration_date'),
            'is_paid'        => $this->request->getPost('is_paid'),
            'max_views'      => $this->request->getPost('max_views'),
            'duration_days'  => $this->request->getPost('duration_days'),
        ];

        // Guardar el anuncio
        if ($model->save($data)) {
            //return redirect()->to('/advertisements')->with('success', 'Anuncio creado exitosamente.');
            return redirect()->to('/advertisements/upload/' . $model->getInsertID());
        } else {
            return redirect()->back()->withInput()->with('error', 'No se pudo crear el anuncio.');
        }
    }

    public function edit($id)
    {
        helper('form');
        $model = new AdvertisementModel();
        $data['advertisement'] = $model->find($id);

        return view('advertisements/edit', $data);
    }

    public function update($id)
    {
        $model = new AdvertisementModel();

        $data = [
            'category_id'    => $this->request->getPost('category_id'),
            'title'          => $this->request->getPost('title'),
            'description'    => $this->request->getPost('description'),
            'price'          => $this->request->getPost('price'),
            'expiration_date'=> $this->request->getPost('expiration_date'),
            'is_paid'        => $this->request->getPost('is_paid'),
            'max_views'      => $this->request->getPost('max_views'),
            'duration_days'  => $this->request->getPost('duration_days'),
        ];

        $model->update($id, $data);

        return redirect()->to('/advertisements')->with('success', 'Anuncio actualizado exitosamente.');
    }

    public function delete($id)
    {
        $model = new AdvertisementModel();
        $model->delete($id);

        return redirect()->to('/advertisements')->with('success', 'Anuncio eliminado exitosamente.');
    }
}
