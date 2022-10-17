<?php

namespace App\Services;

class GetCalculate{

    public  function differenceInHours($startdate,$enddate){
        $starttimestamp = strtotime($startdate);
        $endtimestamp = strtotime($enddate);
        $difference = abs($endtimestamp - $starttimestamp)/3600;
        return $difference;
    }

    public function handle($data, $setting){

        $duration= 0;
        foreach ($data as $query => $item) {
            
         
            if(count($item->overtimes )!== 0){
                foreach ($item->overtimes as $key => $value) {
                    $value['overtime_duration']=$this->differenceInHours(strval($value->time_ended),strval($value->time_started));
                    $duration +=  $value['overtime_duration'];
                }
            };

            $item['overtime_duration_total']=$duration;

            if($setting=='1'){
                $item['amount']=($item->salary/173)*$duration;
                
            }else{
                $item['amount']=1000*$duration;

            }
          
        };

        return $data;
    }


}

 
 