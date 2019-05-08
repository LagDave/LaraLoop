<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','>' ,'0')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        return view('admin.users.edit');
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
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect(route('admin.users.index'))->with('success', 'User deleted successfully');
        }
    }

    public function promote(User $user){
        if($user->role_id < 4 && $user->role_id > 1){
            $promoted_id = $user->role_id - 1;
            if(
                $user->update([
                    'role_id' => $promoted_id
                ])
            ){
                return redirect(route('admin.users.index'))->with('success', 'User promoted successfully');
            }
        }
    }
    public function demote(User $user){
        if($user->role_id < 3 && $user->role_id > 1){
            $demoted_id = $user->role_id + 1;
            if(
                $user->update([
                    'role_id' => $demoted_id
                ])
            ){
                return redirect(route('admin.users.index'))->with('success', 'User demoted successfully');
            }
        }
    }
}
