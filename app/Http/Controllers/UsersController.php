<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

//        $users = User::with('roles')->get()->toJson();
//        dd($users);
        return view('users.index');
    }

    public function getProfile(){

    }

    public function getUsers(){
        $users = User::with('roles')->get();
        return Datatables::of($users)->addColumn('action', function ($user) {
            $re = 'user/' . $user->id;
            $sh = 'user/show/' . $user->id;
            $del = 'user/delete/' . $user->id;
            return '<a href=' . $sh . '><i class="glyphicon glyphicon-eye-open" title="View Details" style="color:green"></i></a> <a href=' . $re . '><i class="glyphicon glyphicon-edit"></i></a><a href=' . $del . ' title="Delete" style="color:red"><i class="glyphicon glyphicon-trash"></i></a>';
        })
            ->make(true);
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
    public function destroy($id)
    {
        //
    }
}
