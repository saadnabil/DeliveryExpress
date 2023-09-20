<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\User\CreateUserValidation;
use App\Http\Requests\Api\User\LoginUserValidation;
use App\Services\UserService;

class RegisterController extends BaseController{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(CreateUserValidation $request){
        $data = $request->validated();
        $user = $this->userService->register($data);
        $data['token'] = $user->createToken('myApp')->plainTextToken;
        $data['user'] = $user;
        return $this->sendResponse($data);
    }

    public function login(LoginUserValidation $request){
        $data = $request->validated();
        if(auth()->attempt(['password' => $data['password'],'email' => $data['email']])){
            $user = auth()->user();
            $success['token'] = $user->createToken('myApp')->plainTextToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success);
        }else{
            return response()->json(['message' => 'Unauthenticated'] , 401);
        }
    }
}

