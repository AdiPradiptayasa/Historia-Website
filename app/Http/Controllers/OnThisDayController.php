<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialDay;

class OnThisDayController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        $specialDay = SpecialDay::where('date', $today)->first();

        return view('home', compact('specialDay'));
    }
}
