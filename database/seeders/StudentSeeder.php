<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Ayu', 'gender' => 'P', 'nis'=> '001', 'class_id' => '1'],
        //     ['name' => 'Budi', 'gender' => 'L', 'nis'=> '002', 'class_id' => '1'],
        //     ['name' => 'Siti', 'gender' => 'P', 'nis'=> '003', 'class_id' => '2'],
        //     ['name' => 'Tono', 'gender' => 'L', 'nis'=> '004', 'class_id' => '3'],
        // ];

        // foreach ($data as $key => $value) {
        //     Student::insert([
        //         'name' => $value["name"],
        //         'gender' => $value["gender"],
        //         'nis' => $value["nis"],
        //         'class_id' => $value["class_id"],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }
        Student::factory()->count(20)->create();
    }
}
