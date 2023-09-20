<?php
namespace App\Services\Dashboard;

use App\Models\Activity;
use App\Models\City;
use App\Models\Complain;
use App\Models\Faq;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class FaqService{
    public function index(){
        $rows = Faq::get();
        return view('dashboard.faqs.index',compact('rows'));
    }

    public function create(){
        return view('dashboard.faqs.create');
    }

    public function store(array $data){
        Faq::create($data);
        return redirect()->route('faqs.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($faq){
        return view('dashboard.faqs.edit' , compact('faq'));
    }

    public function update(array $data , $faq){

        $faq->update($data);
        return redirect()->route('faqs.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($faq){
        $faq->delete();
        return redirect()->route('faqs.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
