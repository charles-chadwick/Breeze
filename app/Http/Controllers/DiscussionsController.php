<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class DiscussionsController extends Controller
{
    public function __invoke(Patient $patient)
    {
        return view('discussions.index', [
            'discussions' => $patient->discussions,
        ]);
    }
}
