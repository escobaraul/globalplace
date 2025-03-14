<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'parent_id'];

    public function getCategoryTree($parentId = 0, $level = 0)
    {
        $categories = $this->where('parent_id', $parentId)->orderBy('name')->findAll();
        $result = [];

        foreach ($categories as $category) {
            $result[] = [
                'id' => $category['id'],
                'name' => str_repeat('&nbsp;', $level * 4) . ($level === 0 ? "<b>{$category['name']}</b>" : $category['name']),
            ];
            $result = array_merge($result, $this->getCategoryTree($category['id'], $level + 1));
        }

        return $result;
    }
}
