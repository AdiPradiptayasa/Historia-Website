<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Kategori;
use App\Models\Centre_Point;
use App\Models\Spot;
use App\Models\Kontribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator; 

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function index2(){
        $History = new History;
    
        if (isset($_GET['s'])) {
            $s = $_GET['s'];
            $History = $History->where('sjrh_nama', 'like', "%$s%");
        }
    
        if (isset($_GET['kategori_id']) && $_GET['kategori_id'] != '') {
            $History = $History->where('kategori_id', $_GET['kategori_id']);
        }
    
        $History = $History->get();
        $Kategori = Kategori::all();
        
        return view('homeUser', compact('History', 'Kategori'));
    }

    public function signin_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $request->session()->put('username', Auth::user()->name);
            return redirect()->route('homeUser')->with('success-signin', 'Sign In successful');
        } else {
            return redirect()->route('signin')->with('Gagal', 'Email atau Password Salah');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success-logout', 'Logout successful');
    }

    public function signup(){
        return view('daftar');
    }

    public function signup_proses(Request $request){
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:6'
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $request->session()->put('username', $request->name);
        if (Auth::attempt($data)) {
            return redirect()->route('signup')->with('Gagal', 'Email atau Password Salah');
        } else {
            return redirect()->route('signin')->with('success-signin', 'Sign Up successful');
        }
    }

    public function kategoriUser(Request $request)
    {
        $title = "Daftar Sejarah";
        $History = new History;
        $Kontribusi = new Kontribusi;
    
        if ($request->has('s')) {
            $s = $request->s;
            $History = $History->where('sjrh_nama', 'like', "%$s%");
            $Kontribusi = $Kontribusi->where('sejarah_nama', 'like', "%$s%");
        }
    
        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $History = $History->where('kategori_id', $request->kategori_id);
            $Kontribusi = $Kontribusi->where('kategori_id', $request->kategori_id);
        }
    
        $History = $History->get();
        $Kontribusi = $Kontribusi->get();
        $Kategori = Kategori::all();
    
        return view('kategoriUser', compact('title', 'History', 'Kontribusi', 'Kategori'));
    }
    

    public function detail($slug) {
        
        $history = History::where('slug', $slug)->first();
    
        if (!$history) {
            return redirect()->route('home')->with('error', 'Data not found');
        }
    
        return view('detail', ['history' => $history]);
    }
    public function detailUser($slug) {
        
        $kontribusi = Kontribusi::where('slug', $slug)->first();
    
        if (!$kontribusi) {
            return redirect()->route('home')->with('error', 'Data not found');
        }
    
        return view('detailUser', ['kontribusi' => $kontribusi]);
    }

    public function gis_map()
    {
        return view('leaflet.PetaHistoriUser');
    }

    public function spots()
    {
        $centerPoint = Centre_Point::get()->first();
        $spot = Spot::get();

        return view('frontend.homeUser',[
            'centerPoint' => $centerPoint,
            'spot' => $spot
        ]);
    }

    public function detailSpot($slug)
    {
        $spot = Spot::where('slug',$slug)->first();
        return view('frontend.detailUser',['spot' => $spot]);
    }
}