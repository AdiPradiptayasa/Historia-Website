<?php


namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Kategori;
use App\Models\Kontribusi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $History = new History;
        $Kontribusi = new Kontribusi;

        if (isset($_GET['s'])) {
            $s = $_GET['s'];
            $History = $History->where('sjrh_nama', 'like', "%$s%");
        }

        if (isset($_GET['s'])) {
            $s = $_GET['s'];
            $Kontribusi = $Kontribusi->where('sejarah_nama', 'like', "%$s%");
        }

        if (isset($_GET['kategori_id']) && $_GET['kategori_id'] != '') {
            $History = $History->where('kategori_id', $_GET['kategori_id']);
        }

        $History = $History->get();
        $Kontribusi = $Kontribusi->get();
        $Kategori = Kategori::all();

        return view('home', compact( 'History', 'Kontribusi' ,'Kategori'));
    }
    
    public function detail($slug) {
        $history = History::where('slug', $slug)->first();
    
        if (!$history) {
            return redirect()->route('home')->with('error', 'Data not found');
        }
        
        return view('detail', compact('history'));
    }
    public function detailUser($slug) {
        $kontribusi = Kontribusi::where('slug', $slug)->first();
    
        if (!$kontribusi) {
            return redirect()->route('home')->with('error', 'Data not found');
        }
    
        return view('detailUser', compact('kontribusi'));
    }
    
    public function kategori(Request $request)
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

        return view('kategori', compact('title', 'History', 'Kontribusi', 'Kategori'));
    }
}
