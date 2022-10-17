<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\GetCalculate;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\OvertimesRequest;

class EmployeeController extends Controller
{
    public function update(SettingRequest $request )
 
    {
     
        $query= Setting::get()->first();

        $query->value = $request->value;
              $query->save();
            
        return response()->json(array(
                'code'      =>  200,
                'data'   =>  $query
        ), 200);   
        
    
    }
    public function storeEmployee(EmployeeRequest $request){

 
       $query= Employee::create($request->all());//
       
        return response()->json(array(
            'code'      =>  201,
            'data'   =>  $query
        ), 201);   
    }
    public function storeOvertimes(OvertimesRequest $request){
        $query = Overtime::create($request->all());
        return response()->json(array(
            'code'      =>  201,
            'data'   =>  $query
        ), 201);   
        
        
    }
 
 
    public function calculate(Request $request, GetCalculate $getCalculate){
        $setting = Setting::get()->first()->value;
        $data = Employee::with('Overtimes')->get();
        
       $data = $getCalculate->handle($data,$setting);
        return response()->json(array(
            'code'      =>  201,
            'data'   =>  $data
        ), 200);   
    }
}
