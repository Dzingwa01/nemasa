<?php

namespace App\Http\Controllers;

use App\Project;
use App\SocioEconomicAllowable;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class SocioEconominAllowableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        DB::beginTransaction();
        try{
            $socio = SocioEconomicAllowable::create($input);
            $figures = array_sum(array_values($input));
            $project = $socio->project;
            $project->socio_economic_allowables = $figures;
            $project->work_budget =  $project->contract_sum_excl - ($project->preliminary_general+$project->contigency_allowable+$project->socio_economic_allowables);
            $project->save();
            $project->save();
            DB::commit();
            return response()->json(['socio'=>$socio,'message'=>'Socio Economic Allowables created successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Socio Economic Allowables could not be saved at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocioEconomicAllowable $socio)
    {
        //
        $input = $request->input();
        DB::beginTransaction();
        try{
            $socio->update($input);
            $figures = array_sum(array_values($input));
            $project = $socio->project;
            $project->socio_economic_allowables = $figures;
            $project->work_budget =  $project->contract_sum_excl - ($project->preliminary_general+$project->contigency_allowable+$project->socio_economic_allowables);
            $project->save();

            DB::commit();
            return response()->json(['socio'=>$socio,'project'=>$project,'message'=>'Socio Economic Allowables updated successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Socio Economic Allowables could not be updated at the moment ' . $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
