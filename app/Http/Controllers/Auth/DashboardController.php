<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Pdf_file; 
 



class DashboardController extends Controller
{
    public function index()
{
    $pdfFile = Pdf_file::where('name', 'how_to_use_webdatabase')->first(); 
    return view('user.dashboard', ['pdfFile' => $pdfFile]);
}


}
