<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Centre_Point;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CentrePointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.CentrePoint.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.CentrePoint.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'coordinate' => 'required'
        ]);

        $centerPoint = new Centre_Point;
        $centerPoint->coordinates = $request->input('coordinate');
        $centerPoint->save();

        if ($centerPoint) {
            return to_route('centre-point.index')->with('success','Data berhasil disimpan');
        } else {
            return to_route('centre-point.index')->with('error','Data gagal disimpan');
        }
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
        try {
            $centrePoint = Centre_Point::findOrFail($id);
            return view('backend.CentrePoint.edit', ['centrePoint' => $centrePoint]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Objek tidak ditemukan, handle kesalahan di sini
            return redirect()->route('route_name_to_redirect')->with('error', 'Centre Point not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $centrePoint = Centre_Point::findOrFail($id);
            $centrePoint->coordinates = $request->input('coordinate');
    
            if ($centrePoint->update()) {
                return redirect()->route('centre-point.index')->with('success', 'Data berhasil diupdate');
            } else {
                return redirect()->route('centre-point.index')->with('error', 'Data gagal diupdate');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Objek tidak ditemukan, handle kesalahan di sini
            return redirect()->route('route_name_to_redirect')->with('error', 'Centre Point not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $centrePoint = Centre_Point::findOrFail($id);
        $centrePoint->delete();
        return redirect()->back();
    }
}
