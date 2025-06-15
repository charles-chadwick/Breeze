<?php

namespace Database\Seeders;

use App\Models\Medication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach ($this->medicationList() as $med) {
            // Brand Name,Generic Name,Manufacturer,Strength,Dosage Form,NDC,Schedule
            Medication::create([
                'brand_name' => $med['brand_name'],
                'generic_name' => $med['generic_name'],
                'manufacturer' => $med['manufacturer'],
                'strength' => $med['strength'],
                'dose_form' => $med['dose_form'],
                'ndc' => $med['ndc'],
                'schedule' => $med['schedule'],
                'created_by' => 1
            ]);
        }
    }

    public  function medicationList(): array
    {

        $meds = array_map('trim', file(database_path('src/medications_100.csv')));
        str_getcsv(array_shift($meds));

        return array_map(function ($line) {
            $data = str_getcsv($line);

            return [
                'brand_name' => $data[0] ?? '',
                'generic_name' => $data[1] ?? '',
                'manufacturer' => $data[2] ?? '',
                'strength' => $data[3] ?? '',
                'dose_form' => $data[4] ?? '',
                'ndc' => $data[5] ?? '',
                'schedule' => $data[6] ?? '',
            ];
        }, $meds);
    }
}
