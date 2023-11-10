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
        $material = $request->input('material');
        $additive = $request->input('additive');
        $bacterium = $request->input('bacterium');
        $fruit = $request->input('fruit');
        //requestの内容の区別はform内のnameでおこなっている。
        

        $query = Experiment::query();
        // $query = Material::query();
       

        $query->join('materials','experiments.id', '=', 'materials.experiment_id')
            ->join('additives', 'experiments.id', '=','additives.experiment_id')
            ->join('antibacteria_tests', 'experiments.id', '=', 'antibacteria_tests.experiment_id')
            ->join('storing_tests', 'experiments.id', '=', 'storing_tests.experiment_id') ->get();
            
     

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('name', 'LIKE', "%{$keyword}%");
        }

        if(!empty($additive)) {
            $query->where('ad_name', 'LIKE', "%{$additive}%");
        }

        if(!empty($material)) {
            $query->where('m_name', 'LIKE', "%{$material}%");
        }

        if(!empty($bacterium)) {
            $query->where('a_name', 'LIKE', "%{$bacterium}%");
        }

        if(!empty($fruit)) {
            $query->where('s_name', 'LIKE', "%{$fruit}%");
        }


        $selected_experiments = $query->paginate(10);

        $additives_list = Additive::select('ad_name')->distinct()->get();
        $materials_list = Material::select('m_name')->distinct()->get();
        $bacteria_list = Antibacteria_test::select('a_name')->distinct()->get();
        $fruits_list = Storing_test::select('s_name')->distinct()->get();

        

        return view('user.search.index', compact('selected_experiments', 'keyword', 'material', 'materials_list',
         'additive', 'additives_list', 'bacterium', 'bacteria_list', 'fruit', 'fruits_list'));

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
        $materials = Material::where('experiment_id', $id)->get();
        $additives = Additive::where('experiment_id', $id)->get();
        $film_conditions = Film_condition::where('experiment_id', $id)->get();
        
        
        return view('user.search.show', compact('experiment', 'materials','additives','film_conditions'));
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
