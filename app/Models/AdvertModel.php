<?php


namespace App\Models;


use CodeIgniter\Model;

class AdvertModel extends Model
{
    protected $table = 'adverts';
    protected $allowedFields = ['user_id', 'title', 'description', 'thumbnail', 'author', 'updated_at'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    /**
     * @param array $data
     * @return array
     */
    protected function beforeInsert(array $data)
    {
        return $data;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function beforeUpdate(array $data)
    {
        return $data;
    }

    public function findByUser($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }
}