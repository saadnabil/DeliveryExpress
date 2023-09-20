<?php
namespace App\Services\Delivery;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Complain;
class ComplainService{
    use ApiResponseTrait;
    public function store(array $data){
        $delivery = auth()->user();
        $complain = new Complain(['message' => $data['message']]);
        $delivery->complains()->save($complain);
        return $this->sendResponse([]);
    }
}
