<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Kategori;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=History::getHistory()->paginate(5);
        return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'sjrh_nama' => 'required',
            'sjrh_subjudul' => 'required',
            'kategori_id' => 'required', 
            'sjrh_desc' => '',
            'sjrh_img' => 'required|mimes:png,jpg|max:1024',
            'status' =>''
        ]);
        try {
            $fileName = time() . $request->file('sjrh_img')->getClientOriginalName();
            $path = $request->file('sjrh_img')->storeAs('photos', $fileName);
            $validasi['sjrh_img'] = $path;
            $response = History::create($validasi);
           
            return response()->json([
                'success' => true,
                'message' => 'success',
            ]);
           
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage(),
            ]);
        }
    }

    function kategori(){
        $data=Kategori::all();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validasi = $request->validate([
            'sjrh_nama' => 'required',
            'sjrh_subjudul' => 'required',
            'kategori_id' => 'required', // Sesuaikan dengan kebutuhan Anda
            'sjrh_desc' => '',
            'sjrh_img' => '',
            'status' =>''
        ]);

        try {
            if($request->file('sjrh_img')){
                $fileName = time() . $request->file('sjrh_img')->getClientOriginalName();
                $path = $request->file('sjrh_img')->storeAs('photos', $fileName);
                $validasi['sjrh_img'] = $path;
            }
            $response = History::find($id);
            $response->update($validasi);

            return response()->json([
                'success' => true,
                'message' => 'success',
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage(),
            ]);
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{    
        $History=History::find($id);
        $History->delete();
        return response ()->json([
            'success'=>true,
            'messages'=>'Success'
        ]);
    } catch(\Exception $e){
        return response()->json([
            'message'=>'Err',
            'errors'=>$e->getMessage()
        ]);
    }
    }
}
