<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\form;

class Invoice extends Controller
{
    public function form(form $form)
    {
        return $form;
        return view('invoice.form');
    }
}
