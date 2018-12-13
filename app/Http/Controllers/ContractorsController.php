<?php

namespace App\Http\Controllers;

use App\Contractor;
use App\Http\Requests\ContractorStoreRequest;
use App\Project;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ContractorsController extends Controller
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
    public function store(ContractorStoreRequest $request)
    {
        //
        $input = $request->validated();
        DB::beginTransaction();
        try{
            $contractor = Contractor::create($input);
            DB::commit();
            return response()->json(['contractor'=>$contractor,'message'=>'Contractor created successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Contractor could not be saved at the moment ' . $e->getMessage()], 400);
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
    public function update(Request $request, Contractor $contractor)
    {
        //
        DB::beginTransaction();
        try{
            $contractor->update($request->all());
            DB::commit();
            return response()->json(['contractor'=>$contractor,'message'=>'Contractor updated successfully'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Contractor could not be updated at the moment ' . $e->getMessage()], 400);
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
