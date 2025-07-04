<?php

namespace App\Models;

use App\Models\CRUD;

class Client extends CRUD
{
    protected $table = "client";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'username', 'password', 'email'];
}
