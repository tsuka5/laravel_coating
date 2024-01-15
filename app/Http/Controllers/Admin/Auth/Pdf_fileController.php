<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Pdf_file;


class Pdf_fileController extends Controller
{
    /**
     * Display the registration view.
     */

    public function index()
    {
        $uploadedFiles = Pdf_file::orderby('created_at', 'asc')->paginate(3);
        return view('admin.pdf_file.index', compact('uploadedFiles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $uploadedFile = $request->file('pdf_file_path'); 
        $filePath = $uploadedFile->store('pdf_files','public');

        $pdfModel = new Pdf_file; 
        $pdfModel->name = $request->name;
        $pdfModel->pdf_file_path = $filePath; 
        $pdfModel->save();

        return redirect()->route('admin.pdf_file.index')
        ->with(['message'=>'Registration Complete',
        'status'=>'info']);
    }

    public function destroy(string $id)
    {
        Pdf_file::findOrFail($id)->delete(); 

        return redirect()
        ->route('admin.pdf_file.index')
        ->with(['message'=>'Delete Complete',
        'status'=>'alert']);
    }
}

 // ファイルを保存
 // リクエストからファイルを取得
 // ファイルを特定のディレクトリに保存し、そのパスを取得
  // ファイルパスをデータベースに保存
   // PdfModel は作成したモデル
   // ファイルパスをデータベースのカラムに保存
