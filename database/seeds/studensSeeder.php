<?php

use App\Role_user;
use Illuminate\Database\Seeder;
use App\Student;
class studensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=Role_user::where('role_id',3)->first();

            Student::create([
                'user_id'=>$user->id,
                'enroll_no'=> 0
                
            ]);

    }
}
