<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20)->appends(request()->query());
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users,email',
            'status' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        if (User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => $request->date_of_birth,
            'role_id' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password)
        ])) {
            return redirect('user')->with('success', 'User created successfully.');
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
        if ($id != 1) {
            $user = User::find($id);
            $roles = Role::get();
            return view('user.edit', compact('user', 'roles'));
        }
        return redirect('user')->with('error', "Your can't be edit super admin.");
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
        if ($id != 1) {
            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required',
                'status' => 'required',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'role' => 'required',
            ]);
            if (User::where('id', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'dob' => $request->date_of_birth,
                'role_id' => $request->role,
                'status' => $request->status,
            ])) {
                return redirect('user')->with('success', 'User updated successfully.');
            }
        }
        return redirect('user')->with('error', "Your can't be edit super admin.");
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
