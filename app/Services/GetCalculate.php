<?php

namespace App\Services;

class GetCalculate{

    public  function differenceInHours($startdate,$enddate){
        $starttimestamp = strtotime($startdate);
        $endtimestamp = strtotime($enddate);
        $difference = abs($endtimestamp - $starttimestamp)/3600;
        return $difference;
    }

    public function handle($data, $setting, $month){
        $i=0; 
        $result=[];
        $flag = false;
        
      
        foreach ($data as $query => $item) {
        
            $duration= 0;
                
            if(count($item->overtimes)!==0){
                $temp = [
                    "id"=>$item->id,
                    "name"=>$item->name,
                    "salary"=>$item->salary,
                    "overtimes"=>array(),
                ];
                $overtimes =[];
                foreach ($item->overtimes as $key => $value) {
                   
                    $value['overtime_duration']=$this->differenceInHours(strval($value->time_ended),strval($value->time_started));
                    if($month == date("m",strtotime($value->date))){
                        $flag=true;
                        unset($value->created_at);
                        unset($value->updated_at);
                        unset($value->employee_id);
                        array_push($overtimes,$value);
                        $duration +=  $value['overtime_duration'];
                    }; 
                }
                $temp['overtimes']=$overtimes;
                $temp['overtime_duration_total']=$duration;
                $temp['amount']=0;

                if($setting=='1'){
                    $temp['amount']+=($item->salary/173)*$duration;
                        
                }else{
                    $temp['amount']+=1000*$duration;
        
                };
                array_push($result,$temp);
            }      
        };
        if(!$flag){
            return false;
        };
        return $result;
     
    }


}

 
 