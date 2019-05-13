<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','>' ,'0')->orderBy('id','desc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        if(Auth::user()->email != $user->email) {
            if ($user->role->name != 'administrator') {
                if ($user->delete()) {
                    return back()->with('success', 'User deleted successfully');
                }
                return back()->with('failed', 'Failed in doing so.');
            }
            return back()->with('failed', 'Administrators cannot be deleted, promoted or demoted.');
        }
        return back()->with('failed', 'You cannot delete logged in account.');
    }

    public function promote(User $user){
        if($user->role_id < 4 && $user->role_id > 1){
            $promoted_id = $user->role_id - 1;
            if(
                $user->update([
                    'role_id' => $promoted_id
                ])
            ){
                return back()->with('success', 'User promoted successfully');
            }
        }
        return back()->with('failed', 'This user cannot be promoted');
    }
    public function demote(User $user){
        if($user->role_id < 3 && $user->role_id > 1){
            $demoted_id = $user->role_id + 1;
            if(
                $user->update([
                    'role_id' => $demoted_id
                ])
            ){
                return back()->with('success', 'User demoted successfully');
            }
        }
        return back()->with('failed', 'This user cannot be demoted');
    }

    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'confirm_password'=>'required|same:password|min:8',
            'role_id'=>'required'
        ]);
        if(User::create($data)){
            return back()->with('success', 'User Added Successfully');
        }
    }
}
