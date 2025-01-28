<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name','password','email','image'];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
