<?php

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\DB;
use App\User;
use App\Role;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        
        DB::table('role_user')->truncate();

       $adminRole= Role::where('name','admin')->first();
       $librarianRole=role::where('name','librarian')->first();
       $studentRole=role::where('name','student')->first();

       $admin= User::create([
            'name'=>'Admin',
            'lastname'=> 'Admin',
            'phone' => 01111100000,
            'email'=> 'admin@admin.com',
            'password'=> Hash::make('admin')
        ]);
        $librarian= User::create([
            'name'=>'Librarian',
            'lastname'=> 'Librarian',
            'phone' => 01111100000,
            'email'=> 'librarian@librarian.com',
            'password'=> Hash::make('librarian')
        ]);
        $student= User::create([
            'name'=>'Student',
            'lastname'=> 'Student',
            'phone' => 01111100000,
            'email'=> 'student@student.com',
            'password'=> Hash::make('student')
        ]);
        $admin->roles()->attach($adminRole);
        $librarian->roles()->attach($librarianRole);
        $student->roles()->attach($studentRole);
    }
}
