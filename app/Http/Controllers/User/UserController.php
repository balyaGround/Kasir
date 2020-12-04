<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Master\Toko;
use App\Models\User\Role;
use App\Models\User\User;

//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAll = User::with(['Toko', 'Role'])->get();

        $data = [
            'userAll' => $userAll
        ];
        return view('admin.user-management.User.index', ['data' => $data]);
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
        $image = $request->file('image_user');
        $fileName = "";
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('storage/images/imageUser/small/'). $fileName);
            $image->move(public_path('storage/images/imageUser/big/',$fileName));

//            $img->stream(); // <-- Key point
//            Storage::disk('local')->put('public/images/imageUser/small' . '/' . $fileName, $img, 'public');
//            Storage::disk('local')->put('public/images/imageUser/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
        }

        $data = User::create(['name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'toko_id' => $request->toko_id,
            'role_id' => $request->role_id,
            'image_uri' => $fileName
        ]);

//        return redirect(route('users.index'));
        return redirect()->route('settings');
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

        $toUpdate = User::find($id);
        $toUpdate->name = $request->name;
        $toUpdate->username = $request->username;
        if ($request->password) {
            $toUpdate->password = Hash::make($request->password);
        }
        $toUpdate->email = $request->email;
        $toUpdate->role_id = $request->role_id;
        $toUpdate->toko_id = $request->toko_id;

        $image = $request->file('image_user');
        $fileName = "";
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point
            Storage::disk('local')->put('public/images/imageUser/small' . '/' . $fileName, $img, 'public');
            Storage::disk('local')->put('public/images/imageUser/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
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
        User::find($id)->delete();
        return response('success delete', 200);
        //
    }

    public function passwordView()
    {
        return view('admin.user-management.user.password');
    }

    public function passwordProcess(Request $request)
    {
        $ubahPass = User::find(Auth::id());
        $ubahPass->password = Hash::make($request->new_password);
        $ubahPass->save();
        return redirect()->route('password.index');
    }
    public function profileView()
    {
        return view('admin.user-management.user.account-settings');
    }

    public function profileProcess(Request $request)
    {
        $ubahProfile = User::find(Auth::id());
        $image = $request->file('imageprof');
        $fileName = "";
        if ($image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point
            Storage::disk('local')->put('public/images/imageUser/small' . '/' . $fileName, $img, 'public');
            Storage::disk('local')->put('public/images/imageUser/big' . '/' . $fileName, file_get_contents($image->getRealPath()), 'public');
            $ubahProfile->image_uri = $fileName;
        }

        $ubahProfile->name =$request->nama ?? $ubahProfile->name;
        $ubahProfile->username =$request->username ?? $ubahProfile->username;
        $ubahProfile->email =$request->email ?? $ubahProfile->email;
        $ubahProfile->password = $request->new_password != null ?  Hash::make($request->new_password) : $ubahProfile->password;
        $ubahProfile->save();
        return redirect()->route('profile.index');
    }


    public function getSelectData()
    {
        $role = Role::all();
        $toko = Toko::all();
        $data = ['toko' => $toko, 'role' => $role];
        return json_encode($data);
    }
}
