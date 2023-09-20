<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller{
    public function sendResponse($data , $status = 'success' , $code = 200){
        return response()->json([
            'data' => $data,
            'status' => $status,
        ],$code);
    }
}
