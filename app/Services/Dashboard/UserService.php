<?php
namespace App\Services\Dashboard;

use App\Models\Activity;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserService{

    public function index(){
        $rows = User::latest()->get();
        return view('dashboard.users.index',compact('rows'));
    }

    public function create(){
        $roles = Role::get();
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(array $data){

        $role_id = $data['role_id'];
        unset($data['role_id']);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $user->assignRole($role_id);
        return redirect()->route('users.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($user){
        $user = $user->load('roles');
        $roles = Role::all();
        return view('dashboard.users.edit' , compact('user' , 'roles'));
    }

    public function update(array $data , $user){
        $role_id = $data['role_id'];
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        unset($data['role_id']);
        $user->update($data);
        $user->syncRoles([]);
        $user->assignRole($role_id);
        return redirect()->route('users.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($user){
        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
