<?php

namespace App\Controllers;

use App\Models\AdvertisementModel;
use CodeIgniter\Controller;

class Advertisements extends Controller
{
    public function index()
    {
        $model = new AdvertisementModel();
        $data['advertisements'] = $model->findAll();
        
        return view('advertisements/index', $data);
    }

    public function create()
    {
        helper('form');
        return view('advertisements/create');
    }

    public function store()
    {
        $model = new AdvertisementModel();

        $data = [
            'user_id'        => 1,
            'category_id'    => 1,
            //'user_id'        => $this->request->getPost('user_id'),
            //'category_id'    => $this->request->getPost('category_id'),
            'title'          => $this->request->getPost('title'),
            'description'    => $this->request->getPost('description'),
            'price'          => $this->request->getPost('price'),
            'expiration_date'=> $this->request->getPost('expiration_date'),
            'is_paid'        => $this->request->getPost('is_paid'),
            'max_views'      => $this->request->getPost('max_views'),
            'duration_days'  => $this->request->getPost('duration_days'),
        ];

        $model->save($data);

        return redirect()->to('/advertisements');
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
            'user_id'        => $this->request->getPost('user_id'),
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

        return redirect()->to('/advertisements');
    }

    public function delete($id)
    {
        $model = new AdvertisementModel();
        $model->delete($id);

        return redirect()->to('/advertisements');
    }
}