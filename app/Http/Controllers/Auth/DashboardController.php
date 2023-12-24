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
    $pdfFile = Pdf_file::findOrFail(5); 
    // $a = 'gjeo';
    // dd($a);
    return view('user.dashboard', ['pdfFile' => $pdfFile]);
}

// public function downloadPDF()
// {
//     $pdf = PDF::loadView('pdf_view'); // ビューをPDFとして読み込む

//     return $pdf->download('how_to_use_webdatabase.pdf'); // PDFをダウンロード
// }
}
