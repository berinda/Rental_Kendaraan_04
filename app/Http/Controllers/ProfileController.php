<?php

namespace App\Http\Controllers;
//import model car
use App\Models\Profile;
//return type view
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import facade "storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * index
     *
     * @return View
     */public function index(): View
     {
        //get cars
        $profiles = Profile::latest()->paginate(5);

        //render view with cars
        return view('profiles.userindex', compact('profiles'));
     }
      /**
     * create
     *
     * @return View
     */
    public function create() :View
    {
        return view('profiles.usercreate');
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nik'       =>'required',
            'nama'      =>'required',
            'email'      =>'required'
        ]);

        // //upload image
        // $gambar = $request->file('gambar');
        // $gambar->storeAs('public/profiles', $gambar->hashName());

        //create car
        Profile::create([
            'nik'       =>$request->nik,
            'nama'      =>$request->nama,
            'email'     =>$request->email
        ]);

        //redirect to index
        return redirect()->route('profiles.index')->with(['success' => 'Akun Berhasil Disimpan']);
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get car by ID
        $profiles = Profile::findOrFail($id);
        //render view with post
        return view('profiles.useredit', compact('profiles'));
    }
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate
        $this->validate($request, [
            'nik'       =>'required',
            'nama'      =>'required',
            'email'      =>'required'
        ]);
        // //get post by ID
        // $profile = Profile::findOrFail($id);
        // //check if imageis uploaded
        // if ($request->hasFile('gambar')){
        //     //upload new image
        //     $gambar = $request->file('gambar');
        //     $gambar->storeAs('public/profiles', $gambar->hashName());
        //     //delete old image
        //     Storage::delete('public/profiles/' .$profile->gambar);

        //     //update post with new image
        //     $profile->update([
        //         'nik'       =>$request->nik,
        //         'nama'      =>$request->nama,
        //         'email'     =>$request->email
        //     ]);
        // }else{
        //     //update post without image
        //     $car->update([
        //         'status'       =>$request->status,
        //         'merk'        =>$request->merk
        //     ]);
        // }

        //redirect to index
        return redirect()->route('profiles.index')->with(['success' => 'Akun Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $profile
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $profile = Profile::findOrFail($id);

        //delete image
        Storage::delete('public/profiles/'. $profile->gambar);

        //delete post
        $profile->delete();

        //redirect to index
        return redirect()->route('profiles.index')->with(['success' => 'Akun Berhasil Dihapus!']);
    }
}
