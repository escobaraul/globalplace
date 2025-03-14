<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['advertisement_id', 'file_path', 'created_at'];
}