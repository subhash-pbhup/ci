<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'password', 'name'];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
