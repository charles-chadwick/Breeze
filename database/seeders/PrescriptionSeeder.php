<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prescriptions')->truncate();
        foreach(Patient::all() as $patient) {

            $medications = Medication::inRandomOrder()->take(rand(1, 10))->get();
            foreach ($medications as $medication) {

              Prescription::factory()->create([
                    'patient_id' => $patient->id,
                    'prescriber_id' => User::where('role', '!=', UserRole::SuperAdmin)->inRandomOrder()->first()->id,
                    'medication_id' => $medication->id,
                ]);
            }


        }
    }
}
