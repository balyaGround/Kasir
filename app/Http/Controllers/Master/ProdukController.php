<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Bahan;
use App\Models\Master\Produk;
use App\Models\ProdukJual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProduk = Produk::all();
        $dataBahan = Bahan::all();
        $data = [
            'dataProduk' => $dataProduk,
            'dataBahan' => $dataBahan
        ];
        return view('admin.master.produk.index', ['data' => $data]);
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
            $img->save(public_path('storage/images/imageProduk/small/'). $fileName);
            $image->move(public_path('storage/images/imageProduk/big/',$fileName));

            //ini untuk yg pakai storage
//            $img->stream(); // <-- Key point
//            Storage::disk('local')->put('public/images/imageProduk/small' . '/' . $fileName, $img, 'public');
//            Storage::disk('local')->put('public/images/imageProduk/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');

        }
        $data = Produk::create([
            'nama' => $request->nama,
            'harga_jual' => $request->harga_jual,
            'harga_modal' => $request->harga_modal,
            'image_uri' => $fileName,
            'toko_id'=>$request->toko_id
        ]);
//        return redirect(route('produk.index'));
        return redirect()->route('barang');
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

        $toUpdate = Produk::find($id);
        $toUpdate->nama = $request->nama;
        $toUpdate->harga_jual = $request->harga_jual;
        $toUpdate->harga_modal = $request->harga_modal;
        $toUpdate->toko_id = $request->toko_id;
        $image = $request->file('logo');
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(public_path('storage/images/imageProduk/small/'). $fileName);
            $image->move(public_path('storage/images/imageProduk/big/',$fileName));

//            $img->stream(); // <-- Key point
//            Storage::disk('local')->put('public/images/imageProduk/small' . '/' . $fileName, $img, 'public');
//            Storage::disk('local')->put('public/images/imageProduk/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
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
        Produk::find($id)->delete();
        ProdukJual::where('produk_id',$id)->delete();
        return response('success delete', 200);
        //
    }
}
