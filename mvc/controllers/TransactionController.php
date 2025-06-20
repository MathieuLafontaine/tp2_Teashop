<?php

namespace App\Controllers;

use App\Models\Transaction;
use App\Providers\View;

class TransactionController
{
    public function index()
    {
        $transaction = new Transaction;
        $select = $transaction->selectTransaction('date', 'desc');
        if ($select) {
            return View::render('transaction/index', ['transactions' => $select]);
        }
        return View::render('error');
    }
}
