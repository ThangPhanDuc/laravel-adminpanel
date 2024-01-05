<?php

use Illuminate\Database\Seeder;
use App\Models\JobTitle;
use App\Models\Position;

class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobTitle::truncate();
        // Get IDs of positions
        $employeePositionID = Position::where('name', 'Employee')->value('id');
        $teamLeaderPositionID = Position::where('name', 'Team Leader')->value('id');
        $departmentHeadPositionID = Position::where('name', 'Department Head')->value('id');
        $hrManagerPositionID = Position::where('name', 'HR Manager')->value('id');

        JobTitle::create(['name' => 'Software Engineer', 'position_id' => $employeePositionID]);
        JobTitle::create(['name' => 'Software Engineer', 'position_id' => $teamLeaderPositionID]);
        JobTitle::create(['name' => 'Software Engineer', 'position_id' => $departmentHeadPositionID]);

        JobTitle::create(['name' => 'Sales Representative', 'position_id' => $employeePositionID]);
        JobTitle::create(['name' => 'Sales Representative', 'position_id' => $teamLeaderPositionID]);
        JobTitle::create(['name' => 'Sales Representative', 'position_id' => $departmentHeadPositionID]);

        JobTitle::create(['name' => 'Marketing Specialist', 'position_id' => $employeePositionID]);
        JobTitle::create(['name' => 'Marketing Specialist', 'position_id' => $teamLeaderPositionID]);
        JobTitle::create(['name' => 'Marketing Specialist', 'position_id' => $departmentHeadPositionID]);

        JobTitle::create(['name' => 'HR Manager', 'position_id' => $hrManagerPositionID]);
    }
}
