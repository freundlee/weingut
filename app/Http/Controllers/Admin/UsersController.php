<?php

namespace Weingut\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Weingut\Http\Controllers\Controller;
use Weingut\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        $params = [
            'title' => 'Users Listing',
            'users' => $users,
        ];
        
        return view('admin.users.users_list')->with($params);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create User',
        ];
        
        return view('admin.users.users_create')->with($params);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        
        return redirect()->route('users.index')->with('success', "The user <strong>$user->name</strong> has successfully been created.");
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        $params = [
            'title' => 'Delete User',
            'user' => $user,
        ];
        
        return view('admin.users.users_delete')->with($params);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        $params = [
            'title' => 'Edit User',
            'user' => $user,
        ];
        
        return view('admin.users.users_edit')->with($params);
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
        $user = User::find($id);
        
        if (!$user){
            return redirect()
            ->route('users.index')
            ->with('warning', 'The user you requested for has not been found.');
        }
        
        $user->email = $request->input('email');
        
        $user->save();
        
        return redirect()->route('users.index')->with('success', "The user <strong>$user->name</strong> has successfully been updated.");
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user){
            return redirect()
            ->route('users.index')
            ->with('warning', 'The user you requested for has not been found.');
        }
        
        $user->delete();
        
        return redirect()->route('users.index')->with('success', "The user <strong>$user->name</strong> has successfully been archived.");
    }
}
