<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; //エロクアント
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()  //コントローラーでのバリデーション
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data_now = Carbon::now();
        $data_parse = Carbon::parse(now());
        // echo $data_now;
        // echo $data_parse;

        $e_all = User::all();
        $q_get = DB::table('users')->select('name','created_at')->get();
        // $q_first = DB::table('users')->select('name')->first();

        // $c_test = collect([
        //     'name' => 'テスト'
        // ]);

        // dd($e_all, $q_get, $q_first, $c_test);
        return view('admin.users.index', compact('e_all', 'q_get'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
