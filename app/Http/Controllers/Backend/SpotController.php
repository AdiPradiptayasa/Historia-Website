<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Centre_Point;
use App\Models\Spot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.Spot.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centerPoint = Centre_Point::get()->first();
        return view('backend.Spot.create', ['centerPoint' => $centerPoint]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'coordinate' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg'
        ]);

        $spot = new Spot;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadFile = $file->hashName();
            $file->move('upload/spots/', $uploadFile);
            $spot->image = $uploadFile;
        }

        $spot->name = $request->input('name');
        $spot->slug = Str::slug($request->name, '-');
        $spot->description = $request->input('description');
        $spot->coordinates = $request->input('coordinate');
        $spot->save();

        if ($spot) {
            // Sweet Alert
            return redirect()->route('spot.index')->with('editSuccess', 'Data berhasil disimpan.');
        } else {
            // Sweet Alert
            return redirect()->route('spot.index')->with('error', 'Data gagal disimpan.');
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
        $centerPoint = Centre_Point::get()->first();
        $spot = Spot::findOrFail($id);
        return view('backend.Spot.edit', [
            'centerPoint' => $centerPoint,
            'spot' => $spot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $spot = Spot::findOrFail($id);

    $request->validate([
        'coordinate' => 'required',
        'name' => 'required',
        'description' => 'required',
        'image' => 'file|image|mimes:png,jpg,jpeg',
    ]);

    $spot->name = $request->input('name');
    $spot->slug = Str::slug($request->name, '-');
    $spot->description = $request->input('description');
    $spot->coordinates = $request->input('coordinate');

    if ($request->hasFile('image')) {
        // Delete the existing image file
        $existingImagePath = public_path('upload/spots/' . $spot->image);
        if (File::exists($existingImagePath)) {
            File::delete($existingImagePath);
        }

        // Upload the new image file
        $imageFile = $request->file('image');
        $uploadedImage = $imageFile->hashName();
        $imageFile->move(public_path('upload/spots/'), $uploadedImage);

        // Update the spot with the new image
        $spot->image = $uploadedImage;
    }

    if ($spot->save()) {
        return redirect()->route('spot.index')->with('editSuccess', 'Data berhasil diupdate');
    } else {
        return redirect()->route('spot.index')->with('error', 'Data gagal diupdate');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spot = Spot::findOrFail($id);
        if (File::exists('upload/spots/' . $spot->image)) {
            File::delete('upload/spots/' . $spot->image);
        }

        //Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
        $spot->delete();
        return redirect()->back();
    }
}
