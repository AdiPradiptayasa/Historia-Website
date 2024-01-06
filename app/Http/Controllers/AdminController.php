<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Barang";
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

        return view('backpage.daftar', compact('title', 'History', 'Kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Data";
        $Kategori = Kategori::all();
        return view('backpage.input', compact('title', 'Kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus lengkap',
            'numeric' => 'Kolom :attribute harus angka',
            'file' => 'Perhatikan format dan ukuran file',
        ];

        $validasi = $request->validate([
            'sjrh_nama' => 'required',
            'sjrh_subjudul' => 'required',
            'kategori_id' => 'required', // Sesuaikan dengan kebutuhan Anda
            'sjrh_desc' => 'required',
            'slug' => '',
            'sjrh_img' => 'required|mimes:png,jpg|max:5024',
        ]);

        try {
            $fileName = time() . $request->file('sjrh_img')->getClientOriginalName();
            $path = $request->file('sjrh_img')->storeAs('photos', $fileName);
            $validasi['sjrh_img'] = $path;
            $validasi['sjrh_desc'] = $request->input('sjrh_desc');
            $response = History::create($validasi);

            /*return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response,
            ]);*/
            return redirect('admin')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect('admin')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ...
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Data";
        $Kategori = Kategori::all();
        $History = History::find($id);
        return view('backpage.input', compact('title', 'Kategori', 'History'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus lengkap',
            'numeric' => 'Kolom :attribute harus angka',
            'file' => 'Perhatikan format dan ukuran file',
        ];

        $validasi = $request->validate([
            'sjrh_nama' => 'required',
            'sjrh_subjudul' => 'required',
            'sjrh_desc' => 'required',
            'kategori_id' => '',
            'slug' => '',  
            'sjrh_img' => '|mimes:png,jpg|max:5024',
        ]);

        try {
            if($request->file('sjrh_img')){
                $fileName = time() . $request->file('sjrh_img')->getClientOriginalName();
                $path = $request->file('sjrh_img')->storeAs('photos', $fileName);
                $validasi['sjrh_img'] = $path;
            }
            $response = History::find($id)->update($validasi);
            return redirect('admin')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect('admin')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $History = History::find($id);
            $History->delete();
            return redirect('admin');
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage(),
            ]);
        }
    }
    public function upload(Request $request)
    {
       if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function editing($id)
    {
        // Ambil data dari database berdasarkan ID
        $History = History::find($id);

        // Pastikan data ditemukan
        if (!$History) {
            return abort(404); // Jika data tidak ditemukan, tampilkan halaman 404 Not Found
        }
        // Kirim data ke view edit.blade.php (gantilah ModelName dan edit.blade.php sesuai dengan nama model dan view yang Anda gunakan)
        return view('admin.input', compact('History'));
    }

}