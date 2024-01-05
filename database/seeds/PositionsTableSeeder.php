<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::truncate();
        $positions = [
            ['name' => 'Employee'],
            ['name' => 'Team Leader'],
            ['name' => 'Department Head'],
            ['name' => 'HR Manager'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
