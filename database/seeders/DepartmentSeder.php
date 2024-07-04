<?php

namespace Database\Seeders;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartmentSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
            [
                'name'          => 'IT',
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Soft Wear',
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'Social Media',
                'created_at'    => Carbon::now(),
            ],
            [
                'name'          => 'SEO',
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
