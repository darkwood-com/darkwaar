<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Inspiring;

class QuoteController extends Controller
{
    public function get()
    {
        return response()->json(Inspiring::quote());
    }
}
