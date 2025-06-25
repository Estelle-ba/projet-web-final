<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Representative;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{

    //Function to generate the PDF of the representatives
    public function generatePDF()
    {
        //Take all the data needed
        $users = User::all();//The users
        $representative = Representative::all();//The representatives
        $class = ClassModel::all();//The class
        $title = 'Les délégués et suppléants';
        $date = date('Y');

        //Load the view with all the data needed
        $pdf = PDF::loadView('pdf.Representatives', compact('users', 'representative', 'class', 'title', 'date'));

        //Download the pdf
        return $pdf->download('Les délégués et suppléants de l\'année '. $date. '.pdf');
    }
}
