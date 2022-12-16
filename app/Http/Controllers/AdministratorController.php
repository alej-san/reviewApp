<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Carbon;

class AdministratorController extends Controller
{
    
    function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $users = User::all();
        return view('admin.index', ['users' => $users]);
    }

    public function create() {
         $types = [
                'Admin' => 'Administrator',
                'Advanced' => 'Verified User',
                'User' => 'Unverified User'
                ];
        return view('admin.create', ['types' => $types]);
    }

    public function store(Request $request) {
        $message = 'Error creating user';
        
        $user = new User($request->all());
        $user->email_verified_at = \Carbon\Carbon::parse(\Carbon\Carbon::now());
        $user->password = Hash::make($request->input('password'));
        if($user->storeUser()){
            $message = 'New user created';
        }else{
            return back()
            ->withInput()
            ->withErrors(['message' => 'Unexpected error ocurred']);
        }
        
        redirect('admin')->with('message', $message);
    }

    public function show(User $user) {
        return view('admin.show');
    }

    public function edit(User $user) {
            $types = [
                'Admin' => 'Administrator',
                'Advanced' => 'Verified User',
                'User' => 'Unverified User'
                ];
        return view('admin.edit', ['user' => $user, 'types' => $types]);
    }

    public function update(Request $request, User $user) {
        
        $user->name = $request->input('name');
        $user->type = $request->input('type');
        $user->email = $request->input('email');
        if($request->input('password') != null) {
            $user->password = Hash::make($request->input('password'));
        }
        if($user->updateUser(false)) {
              $message = 'User has been updated.';
        }
        else{
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        return redirect('admin')->with('message', $message);
    }

    public function destroy(User $user) {
        $message = $user->name . ' not removed';
        $name = $user->name;
        if($user->deleteUser(Auth::user())){
            $message = $name . ' removed';
        }
        
        return redirect('admin')->with('message', $message);
    }
}