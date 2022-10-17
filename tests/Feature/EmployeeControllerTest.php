<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Setting;
use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Reference;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $response = $this->get('/');

        // $response->assertStatus(200);
        // $employee = factory(Employee::class)->create();

      
        // $overtime = factory(Overtime::class)->create();
        // $reference = factory(Reference::class)->create();
        // $setting = factory(Setting::class)->create();
        
 
        // ======================================== patch=> /settings
     

        $settingApiFalse= $this->patch('/api/settings', [
       
            'key' => $this->faker->words(3, true),
            'value' =>$this->faker->randomDigitNotNull()   
        ]);
        $settingApiFalse->assertStatus(302);

        $settingApiTrue=$this->patch('/api/settings', [
  
            'key' => "overtime_method",
            'value' =>$this->faker->shuffle([1, 2])
        ]);
        $settingApiTrue->assertStatus(200);

        // ======================================== post=> /employees


        $employeeApiFalse = $this->post('/api/employees',[
            'name' => 'a',
            'salary' =>1999999
        ]);
        $employeeApiFalse->assertStatus(302);

        $employeeApiFalse = $this->post('/api/employees',[
            'name' => 1,
            'salary' =>10000001
        ]);
        $employeeApiFalse->assertStatus(302);



        $employeeApiTrue = $this->post('/api/employees',[
            'name' => "budi" . $this->faker->randomNumber(5, true),
            'salary' => 2000000

        ]);
        $employeeApiTrue->assertStatus(201);
 

        // // ======================================== post=> /overtimes


        $overtimeApiFalse= $this->post('/api/overtimes',[
            'employee_id' => $this->faker->randomNumber(5, false),
            'date' => $this->faker->date(),
            'time_started' => $this->faker->date(),
            'time_ended' => $this->faker->date()
        ]);
         $overtimeApiFalse->assertStatus(302);

        $overtimeApiTrue= $this->post('/api/overtimes',[
            'employee_id' => 1,
            'date' => $this->faker->date(),
            'time_started' => "05:37",
            'time_ended' => "12:37"
        ]);
         $overtimeApiTrue->assertStatus(201);
        
        

        // // ======================================== post=> /overtime-pays/calculate
      
        Employee::create([
            'id' => 1 ,
            'name'=> "budi",
            'salary'=> 2000000,
            'created_at'=> "2022-10-17T08:30:48.000000Z",
            'updated_at'=> "2022-10-17T08:30:48.000000Z"
        ]);

        $overtimeApiFalse= $this->get('/api/overtime-pays/calculate?month=10-17-2022');
        $overtimeApiFalse->assertStatus(302);
           
        $overtimeApiTrue= $this->get('/api/overtime-pays/calculate?month=2022-10');
        $overtimeApiTrue->assertStatus(200);




    }

    
}
