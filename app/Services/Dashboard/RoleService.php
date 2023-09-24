<?php
namespace App\Services\Dashboard;
use App\Models\Complain;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleService{

    public function index(){
        $rows = Role::latest()->get();
        return view('dashboard.roles.index' , compact('rows'));
    }

    public function create(){
        $permissions = Permission::get();
        return view('dashboard.roles.create', compact('permissions'));
    }

    public function store(array $data){
        $role = Role::Create(['name' => $data ['name']]);
        $role->syncPermissions($data['permission']);
        return redirect()->route('roles.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($role){
        $role -> load('permissions');
        $permissions = Permission::get();
        return view('dashboard.roles.edit',compact('role','permissions'));
    }

    public function update(array $data , $role){

        $role -> update(['name' => $data ['name']]);

        $role->syncPermissions($data['permission']);

        return redirect()->route('roles.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($role){
        $role -> delete();
        return redirect()->route('roles.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
