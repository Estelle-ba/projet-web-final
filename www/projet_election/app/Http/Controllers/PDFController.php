<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Le PDF test',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('testPDF', $data);

        return $pdf->download('test.pdf');
    }
}
