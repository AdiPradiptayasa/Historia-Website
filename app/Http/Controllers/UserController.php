<?php

namespace App\Http\Controllers;
use App\Models\Kontribusi;
use App\Models\History;
use App\Models\Kategori;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Sejarah";
        $Kontribusi = new Kontribusi;

        if (isset($_GET['s'])) {
            $s = $_GET['s'];
            $Kontribusi = $Kontribusi->where('sejarah_nama', 'like', "%$s%");
        }

        if (isset($_GET['kategori_id']) && $_GET['kategori_id'] != '') {
            $Kontribusi = $Kontribusi->where('kategori_id', $_GET['kategori_id']);
        }

        $Kontribusi = $Kontribusi->get();
        $Kategori = Kategori::all();

        return view('user.menu', compact('title', 'Kontribusi', 'Kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Data";
        $Kategori = Kategori::all();
        return view('user.inputUser', compact('title', 'Kategori'));
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
            'sejarah_nama' => 'required',
            'sejarah_subjudul' => 'required',
            'kategori_id' => 'required', // Sesuaikan dengan kebutuhan Anda
            'sejarah_desc' => '',
            'slug'=>'',
            'sejarah_img' => 'required|mimes:png,jpg|max:5024',
        ]);

        try {
            $fileName = time() . $request->file('sejarah_img')->getClientOriginalName();
            $path = $request->file('sejarah_img')->storeAs('photos', $fileName);
            $validasi['sejarah_img'] = $path;
            $validasi['sejarah_desc'] = $request->input('sejarah_desc');
            $response = Kontribusi::create($validasi);

            /*return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response,
            ]);*/
            return redirect('kontribusi')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect('kontribusi')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
        $Kontribusi = Kontribusi::find($id);
        return view('user.inputUser', compact('title', 'Kategori', 'Kontribusi'));
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
            'sejarah_nama' => 'required',
            'sejarah_subjudul' => 'required',
            'sejarah_desc' => 'required',
            'kategori_id' => '',
            'slug'=>'', 
            'sejarah_img' => '|mimes:png,jpg|max:5024',
        ]);

        try {
            if($request->file('sejarah_img')){
                $fileName = time() . $request->file('sejarah_img')->getClientOriginalName();
                $path = $request->file('sejarah_img')->storeAs('photos', $fileName);
                $validasi['sejarah_img'] = $path;
            }
            $response = Kontribusi::find($id)->update($validasi);
            return redirect('kontribusi')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect('kontribusi')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $Kontribusi = Kontribusi::find($id);
            $Kontribusi->delete();
            return redirect('kontribusi');
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
        $Kontribusi = Kontribusi::find($id);

        // Pastikan data ditemukan
        if (!$Kontribusi) {
            return abort(404); // Jika data tidak ditemukan, tampilkan halaman 404 Not Found
        }
        // Kirim data ke view edit.blade.php (gantilah ModelName dan edit.blade.php sesuai dengan nama model dan view yang Anda gunakan)
        return view('user.inputUser', compact('Kontribusi'));
    }

    
}
