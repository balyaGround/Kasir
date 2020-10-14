<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bahan::all();
        return view('admin.master.bahan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('logo');
        $fileName = "";
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point

            Storage::disk('local')->put('public/images/imageBahan/small' . '/' . $fileName, $img, 'public');
            Storage::disk('local')->put('public/images/imageBahan/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
        }

        $data = Bahan::create(['nama' => $request->nama, 'harga' => 0, 'quantity' => $request->quantity, 'image_uri' => $fileName]);
        return redirect()->route('bahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $toUpdate = Bahan::find($id);
        $toUpdate->nama = $request->nama;
        $toUpdate->harga = 0;
        $toUpdate->harga = $request->quantity;

        $image = $request->file('logo');
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point

            Storage::disk('local')->put('public/images/imageBahan/small' . '/' . $fileName, $img, 'public');
            Storage::disk('local')->put('public/images/imageBahan/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
            $toUpdate->image_uri = $fileName;
        }

        $toUpdate->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bahan::find($id)->delete();
        return response('success delete', 200);
        //
    }
}
