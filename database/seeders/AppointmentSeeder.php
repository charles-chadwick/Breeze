<?php

namespace Database\Seeders;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Facades\CauserResolver;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('appointments')
          ->truncate();
        $content = collect(file(database_path('src/RickAndMortyContent.csv')));
        $patients = User::patient()
                        ->get();

        foreach ($patients as $patient) {

            for ($i = 0 ; $i <= rand(0, 25) ; $i++) {

                $date_and_time = Carbon::parse($patient->created_at)
                                       ->setHour(8)
                                       ->setMinutes(0)
                                       ->addYears(rand(0, 2))
                                       ->addDays(rand(1, 28))
                                       ->addHours(rand(0, 8));

                $status = fake()->randomElement(AppointmentStatus::class);

                if ($date_and_time < Carbon::now() && $status == AppointmentStatus::Confirmed) {
                    $status = AppointmentStatus::Completed;
                } elseif ($date_and_time > Carbon::now()  && $status == AppointmentStatus::Completed) {
                    $status = AppointmentStatus::Confirmed;
                }

                $appointment_user = User::clinicalStaff()
                                        ->inRandomOrder()
                                        ->first();
                CauserResolver::setCauser($appointment_user);

                $appointment_data = [
                    'date_and_time' => $date_and_time,
                    'title'         => str(collect($content)->random())
                        ->limit(25)
                        ->title(),
                    'status'        => $status,
                    'type'          => fake()->randomElement([
                        'In-Office',
                        'Phone Call',
                        'Video Call'
                    ]),
                    'patient_id'    => $patient->id,
                    'description'   => '<p>'.str(collect($content)
                            ->random(rand(1, 3))
                            ->each(function ($con) {
                                return trim(str_replace([
                                    '"',
                                    '"'
                                ], '', $con));
                            })
                            ->implode('</p><p>')).'</p>',
                    'created_at'    => $date_and_time,
                    'updated_at'    => $date_and_time,
                ];

                Appointment::factory()
                           ->create($appointment_data);
            }
        }
    }
}
