<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;
class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        
        for ($i = 1; $i <= 10; $i++) {
            Employee::create([
                'full_name' => "Employee $i",
                'phone_number' => "1234567$i",
                'position' => "Position $i",
                'salary' => 50000 + ($i * 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
