<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Setting;

class SettingsController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:setting-list', ['only' => ['index']]);
         $this->middleware('permission:shipment-create', ['only' => ['store']]);
    }

    public function index(){
        return view('dashboard.settings.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        foreach($data as $key => $col){
            setting::set($key , $col);
        }
        Setting::save();
        return redirect()->route('settings.index')->with(['success' => __('translation.Updated Successfully')]);
    }


}
