<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class Ordercontroller extends Controller
{
    public function print()
    {
        $tran = ['a', 'b'];
        $pdf = Pdf::loadView('invoice.form', $tran);
        return $pdf->download('form.pdf');
    }
}
