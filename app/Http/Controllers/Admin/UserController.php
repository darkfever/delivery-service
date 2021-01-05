<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('
        select users.*, roles.name
        from users
            left join
            model_has_roles on users.id = model_has_roles.model_id
            left join
            roles on model_has_roles.role_id = roles.id');
        return view('admin.user.index', compact(['users']));
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
        $users = DB::select('
        select users.*, roles.name as role_name
        from users
            left join
            model_has_roles on users.id = model_has_roles.model_id
            left join
            roles on model_has_roles.role_id = roles.id
        where users.id = :id ', ['id' => $id]);
        $roles = DB::select('
        select name from roles');
        return view('admin.user.edit', compact(['users', 'roles']));
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
        //dd($request);
        $users = DB::select('
            update users u
            set u.fio = :fio,
                u.phone = :phone,
                u.email = :email
            where u.id = :id',
            [
                'fio'=>$request->fio,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'id'=>$id
            ]
        );
        $roles = DB::select('
            update model_has_roles m
            set m.role_id = (select r.id 
                                from roles r
                            where name = :role_name)
            where m.model_id = :id',
            [
                'role_name'=>$request->role_name,
                'id'=>$id
            ]
        );
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
