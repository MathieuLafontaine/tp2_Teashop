<?php

namespace App\Models;

use App\Models\CRUD;

class Transaction extends CRUD
{
    protected $table = "transaction";
    protected $primaryKey = "id";
    protected $fillable = ['client_id', 'quantity', 'totalPrice', 'paymentmethod_id', 'date'];
}
