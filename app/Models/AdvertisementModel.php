<?php

namespace App\Models;

use CodeIgniter\Model;

class AdvertisementModel extends Model
{
    protected $table = 'advertisements';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id', 
        'category_id', 
        'title', 
        'description', 
        'price', 
        'created_at', 
        'expiration_date', 
        'is_paid', 
        'max_views', 
        'duration_days'
    ];
    
    // Definir formatos de fecha
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAdvertisementsWithImages()
    {
        $builder = $this->db->table('advertisements');
        $builder->select('advertisements.*, images.file_path');
        $builder->join('images', 'images.advertisement_id = advertisements.id', 'left');
        $builder->orderBy('advertisements.id', 'DESC');
        $query = $builder->get();

        // Agrupar imágenes por anuncio
        $ads = [];
        foreach ($query->getResultArray() as $row) {
            $ad_id = $row['id'];
            if (!isset($ads[$ad_id])) {
                $ads[$ad_id] = $row;
                $ads[$ad_id]['images'] = [];
            }
            if (!empty($row['file_path'])) {
                $ads[$ad_id]['images'][] = $row['file_path'];
            }
        }
        return array_values($ads);
    }
}