<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name', 'email', 'password'];
    protected $useTimestamps = true;
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword($data) {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}