<?php

namespace App\Models;

use App\Models\CRUD;

class Tea extends CRUD
{
    protected $table = "tea";
    protected $primaryKey = "id";
    protected $fillable = ['type', 'brand', 'description', 'price'];
}
