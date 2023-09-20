<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddFaqValidation;
use App\Http\Requests\Dashboard\AddUserValidation;
use App\Http\Requests\Dashboard\UpdateUserValidation;
use App\Models\Complain;
use App\Models\User;
use App\Services\Dashboard\ComplainService;
use App\Services\Dashboard\UserService;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userService;
    function __construct(UserService $userService)
    {
        $this->userService = $userService;
         $this->middleware('permission:user-list', ['only' => ['index']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->userService->index();
    }

    public function create(){
        return $this->userService->create();
    }

    public function store(AddUserValidation $request){
        $data = $request->validated();
        return $this->userService->store($data);
    }

    public function edit(User $user){

        return $this->userService->edit($user);
    }

    public function update(UpdateUserValidation $request ,User $user){
        $data = $request->validated();
        return $this->userService->update($data , $user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $this->userService->destroy($user);
    }
}
