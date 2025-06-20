<?php

namespace App\Controllers;

use App\Models\Tea;
use App\Providers\View;
use App\Providers\Validator;

class TeaController
{
    public function index()
    {
        $tea = new Tea;
        $select = $tea->select('type');
        if ($select) {
            return View::render('tea/index', ['teas' => $select]);
        }
        return View::render('error');
    }

    public function show($data)
    {
        if (isset($data['id']) && $data['id'] != null) {
            $tea = new Tea;
            $selectId = $tea->selectId($data['id']);

            if ($selectId) {
                return View::render('tea/show', ['tea' => $selectId]);
            } else {
                return View::render('error', ['message' => 'Tea not found!']);
            }
        } else {
            return View::render('error', ['message' => '404 not found!']);
        }
    }

    public function create()
    {
        View::render('tea/create');
    }

    public function store($data = [])
    {
        $validator = new Validator;
        $validator->field('type', $data['type'])->required();
        $validator->field('brand', $data['brand'])->required();
        $validator->field('description', $data['description'])->max(255);
        $validator->field('price', $data['price'])->required();

        if ($validator->isSuccess()) {
            $tea = new Tea;
            $insertTea = $tea->insert($data);

            if ($insertTea) {
                return View::redirect('tea/show?id=' . $insertTea);
            } else {
                return View::render('error', ['message' => 'Could not insert tea']);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('tea/create', ['errors' => $errors, 'tea' => $data]);
        }
    }

    public function edit($get = [])
    {
        if (isset($get['id'])) {
            $tea = new Tea;
            $selectId = $tea->selectId($get['id']);

            if ($selectId) {
                return View::render('tea/edit', ['inputs' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error');
        }
    }

    public function update($data = [], $get = [])
    {
        if (isset($get['id'])) {
            $validator = new Validator;
            $validator->field('type', $data['type'])->required();
            $validator->field('brand', $data['brand'])->required();
            $validator->field('description', $data['description'])->max(255)->required();
            $validator->field('price', $data['price'])->required();

            if ($validator->isSuccess()) {
                $tea = new Tea;
                $update = $tea->update($data, $get['id']);

                if ($update) {
                    return View::redirect('tea/show?id=' . $get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                return View::render('tea/edit', ['errors' => $errors, 'inputs' => $data]);
            }
        } else {
            return View::render('error');
        }
    }

    public function delete($data)
    {

        $tea = new Tea;
        $delete = $tea->delete($data['id']);
        if ($delete) {
            return View::redirect('tea');
        } else {
            return View::render('error', ['message' => '404 not found!']);
        }
    }
}
