<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; 
use App\Models\Film_condition; 
use App\Models\Charactaristic_test; 
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use App\Models\Material;
use App\Models\Material_detail;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;
use App\Models\Antibacteria_test_type;
use App\Models\Ph_material_detail;
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
        $bacterium = $request->input('bacterium');
        $fruit = $request->input('fruit');
        //requestの内容の区別はform内のnameでおこなっている。
        

        $query = Experiment::query();
        // $query = Material::query();
       

        $query->join('materials','experiments.id', '=', 'materials.experiment_id')
            ->join('storing_tests', 'experiments.id', '=', 'storing_tests.experiment_id')
            ->join('antibacteria_tests', 'experiments.id', '=', 'antibacteria_tests.experiment_id')->get();
            
     

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('name', 'LIKE', "%{$keyword}%");
        }


        if(!empty($material)) {
            $query->where('material_id', 'LIKE', "%{$material}%");
        }

        if(!empty($bacterium)) {
            $query->where('bacteria_id', 'LIKE', "%{$bacterium}%");
        }

        if(!empty($fruit)) {
            $query->where('storing_fruit_id', 'LIKE', "%{$fruit}%");
        }


        $selected_experiments = $query->paginate(5);

        $materials_list = Material::select('material_id')->distinct()->get();
        $fruits_list = Storing_test::select('storing_fruit_id')->distinct()->get();
        $bacteria_list = Antibacteria_test::select('bacteria_id')->distinct()->get();

        

        return view('user.search.index', compact('selected_experiments', 'keyword', 'material', 'materials_list',
         'bacterium', 'bacteria_list', 'fruit', 'fruits_list'));

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
        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $ph_materials_list = Ph_material_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
        $antibacteria_test_list = Antibacteria_test_type::orderby('name','asc')->get();

        $experiment = Experiment::findOrFail($id);
        $materials = Material::where('experiment_id', $id)->get();
        $film_conditions = Film_condition::where('experiment_id', $id)->get();
        $charactaristic_tests = Charactaristic_test::where('experiment_id', $id)->get();
        $storing_tests = Storing_test::where('experiment_id', $id)->get();
        $antibacteria_tests = Antibacteria_test::where('experiment_id', $id)->get();
        
        

        return view('user.search.show', compact('experiment', 'materials','film_conditions',
                    'charactaristic_tests','storing_tests','antibacteria_tests', 'materials_list',
                    'ph_materials_list', 'fruits_list', 'bacteria_list', 'antibacteria_test_list'));

        // $experiment = Experiment::findOrFail($id);
        // $materials = Material::where('experiment_id', $id)->get();
        // $film_conditions = Film_condition::where('experiment_id', $id)->get();
        
        
        // return view('user.search.show', compact('experiment', 'materials','film_conditions'));
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
