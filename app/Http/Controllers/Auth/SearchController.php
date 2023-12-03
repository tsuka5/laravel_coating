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
use App\Models\Material_detail;
use App\Models\Additive_detail;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;
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
            ->join('storing_tests', 'experiments.id', '=', 'storing_tests.experiment_id')
            ->join('antibacteria_tests', 'experiments.id', '=', 'antibacteria_tests.experiment_id')->get();
            
     

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


        $selected_experiments = $query->paginate(5);

        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $additives_list = Additive_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();

        

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

        $file_path = Charactaristic_test::where('experiment_id', $id)->get();
        
        return view('user.search.show', compact('experiment', 'materials','additives','film_conditions','file_path'));
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
