<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Representative;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::all();
        $representative = Representative::all();
        $class = ClassModel::all();

        $data = [
            'title' => 'Les délégués et suppléants',
            'date' => date('Y'),
            'users' => $users,
            'representative' => $representative,
            'class' =>$class
        ];

        $pdf = PDF::loadView('pdf.Representatives', $data);

        return $pdf->download('Les délégués et suppléants de l\'année '. date('Y'). '.pdf');
    }
}
