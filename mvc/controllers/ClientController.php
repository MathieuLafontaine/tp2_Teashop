<?php

namespace App\Controllers;

use App\Models\Client;
use App\Providers\View;
use App\Providers\Validator;

class ClientController
{
    public function index()
    {
        $client = new Client;
        $select = $client->select('name');
        if ($select) {
            return View::render('client/index', ['clients' => $select]);
        }
        return View::render('error');
    }
    public function show($data)
    {
        if (isset($data['id']) && $data['id'] != null) {
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if ($selectId) {
                return View::render('client/show', ['client' => $selectId]);
            } else {
                return View::render('error', ['message' => 'Client not found!']);
            }
        } else {
            return View::render('error', ['message' => '404 not found!']);
        }
    }

    public function create()
    {
        View::render('client/create');
    }

    public function store($data = [])
    {
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(10);
        $validator->field('email', $data['email'])->max(45)->required();
        $validator->field('username', $data['username'])->min(5)->max(50)->unique('Client');
        $validator->field('password', $data['password'])->min(8)->max(20);


        if ($validator->isSuccess()) {
            $client = new Client;
            $insertClient = $client->insert($data);

            if ($insertClient) {
                return View::redirect('client/show?id=' . $insertClient);
            } else {
                return View::render('error', ['message' => '404 not found!']);
            }
        } else {
            $errors = $validator->getErrors();

            return View::render('client/create', ['errors' => $errors, 'client' => $data]);
        }
    }

    public function edit($get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $client = new Client;
            $selectId = $client->selectId($get['id']);
            if ($selectId) {
                return View::render('client/edit', ['inputs' => $selectId]);
            } else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function update($data = [], $get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('name', $data['name'])->min(2)->max(10);
            $validator->field('email', $data['email'])->max(45)->email()->required();
            $validator->field('username', $data['username'])->min(5)->max(50)->unique('Client');
            $validator->field('password', $data['password'])->min(8)->max(20);

            if ($validator->isSuccess()) {
                $client = new Client;
                $update = $client->update($data, $get['id']);
                if ($update) {
                    return View::redirect('client/show?id=' . $get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                $inputs = $data;
                return View::render('client/edit', ['errors' => $errors, 'inputs' => $inputs]);
            }
        }
        return View::render('error');
    }
    public function delete($data)
    {

        $client = new Client;
        $delete = $client->delete($data['id']);
        if ($delete) {
            return View::redirect('client');
        } else {
            return View::render('error', ['message' => '404 not found!']);
        }
    }
}
