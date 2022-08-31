<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


class TesteController extends Controller
{
    public function index()
    {
        return (['Seja bem vindo ao LC 01']);
    }
}

