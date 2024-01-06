<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Centre_Point;
use App\Models\Spot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function gis_map()
    {
        return view('leaflet.PetaHistori');
    }

    public function spots()
    {
        $centerPoint = Centre_Point::get()->first();
        $spot = Spot::get();

        return view('frontend.home',[
            'centerPoint' => $centerPoint,
            'spot' => $spot
        ]);
    }

    public function detailSpot($slug)
    {
        $spot = Spot::where('slug',$slug)->first();
        return view('frontend.detail',['spot' => $spot]);
    }
}
