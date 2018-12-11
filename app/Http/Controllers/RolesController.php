<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesStoreRequest;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.roles');
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

    public function getRoles(){
        $roles = Role::all();
        return Datatables::of($roles)->addColumn('action', function ($role) {
            $re = '/roles/' . $role->id;
            $sh = '/roles/show/' . $role->id;
            $del = '/roles/delete/' . $role->id;
            return '<a href=' . $re . '><i class="material-icons">create</i></a><a href=' . $del . ' title="Delete" style="color:red"><i class="material-icons">delete_forever</i></a>';
        })
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesStoreRequest $request)
    {
        //
        $input = $request->validated();
        DB::beginTransaction();

        try{
            $office_clerk = [
                'clerk-delete' => true,
                'clerk-add' => true,
                'clerk-update' => true,
                'clerk-view' => true,
            ];

            $role = Role::create(['name'=>$input['name'],'display_name'=>$input['display_name'], 'permissions' =>$office_clerk,
                'guard_name'=>'web']);

            DB::commit();
            return response()->json(['role'=>$role,'message'=>'Role created successfully.'],200);

        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Role could not be saved at the moment ' . $e->getMessage()], 400);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        if($role->name =="app-admin"){

        }else{
            $role->delete();
        }
        return redirect('roles');
    }
}
