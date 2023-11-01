<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; 
use App\Models\Film_condition; 
use App\Models\Charactaristic_test; 
use App\Models\Material;
use App\Models\Additive;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        // $additive = $request->input('additive');
        $material = $request->input('material');
        

        // $query = Experiment::query();
        $query = Material::query();

        $query->join('experiments', function($query) use ($request) {
            $query->on('materials.experiment_id', '=', 'experiments.id');
            });

        // $query = Experiment::join('materials','experiments.id', '=', 'experiment_id')
        // ->join('additives', 'experiments.id', '=', 'experiment_id')->get();
        // 一対多の関係の際は多の方のテーブルを基準にしないと一意に定まらず、おかしなことになる

        //Eager loradingで解決できるかもしれない
        // $query = Experiment::with(['material'])

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('name', 'LIKE', "%{$keyword}%");
        }

        // if(!empty($additive)) {
        //     $query->where('ad_name', 'LIKE', "%{$additive}%");
        // }

        if(!empty($material)) {
            $query->where('m_name', 'LIKE', "%{$material}%");
        }

        $selected_experiments = $query->get();

        // $additives_list = Additive::all();
        $materials_list = Material::get();

        

        return view('user.search.index', compact('selected_experiments', 'keyword', 'material', 'materials_list'));

        // $experiments = Experiment::get();

        // return view('user.search.index', compact('experiments'));
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
        $experiment = Experiment::findOrFail($id);

        return view('user.search.show', compact('experiment'));
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
