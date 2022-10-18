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
use App\Http\Requests\OvertimePayRequest;
use App\Repository\EloquentSettingRepository;

class EmployeeController extends Controller
{
    private $eloquentSetting;

    public function __construct(EloquentSettingRepository $eloquentSetting){
        $this->eloquentSetting = $eloquentSetting;
    }

    public function update(SettingRequest $request ){

      
     
        $query= $this->eloquentSetting->getSetting();

        return $query;
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
 
 
    public function calculate(OvertimePayRequest $request, GetCalculate $getCalculate){

        $url = $request->query('month');
        $month=date("m",strtotime($url));
 
        $setting = $this->eloquentSetting->getSetting()->value;
        $data = Employee::with('Overtimes')->get();
        
       $data = $getCalculate->handle($data,$setting, $month);
       if($data==false){
        return response()->json(array(
            'code'      =>  400,
            'message'   =>  "no data on this month"
        ), 400);  
       }
     
        return response()->json(array(
            'code'      =>  200,
            'data'   =>  $data
        ), 200);   
    }
}
