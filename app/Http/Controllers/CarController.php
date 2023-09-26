<?php

namespace App\Http\Controllers;
//import model car
use App\Models\Car;
//return type view
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import facade "storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * index
     *
     * @return View
     */public function index(): View
     {
        //get cars
        $cars = Car::latest()->paginate(5);

        //render view with cars
        return view('cars.index', compact('cars'));
     }
      /**
     * create
     *
     * @return View
     */
    public function create() :View
    {
        return view('cars.create');
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
            'gambar'    =>'required|mimes:jpeg,jpg,png|max:2048',
            'tipe'      =>'required',
            'merk'      =>'required',
            'stock'     =>'required',
            'warna'     =>'required',
            'status'    =>'required',
            'deskripsi' =>'required',
            'no_seri'   =>'required'
        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/cars', $gambar->hashName());

        //create car
        Car::create([
            'gambar'    =>$gambar->hashName(),
            'tipe'      =>$request->tipe,
            'merk'      =>$request->merk,
            'stock'     =>$request->stock,
            'warna'     =>$request->warna,
            'status'    =>$request->status,
            'deskripsi' =>$request->status,
            'no_seri'   =>$request->no_seri
        ]);

        //redirect to index
        return redirect()->route('cars.index')->with(['success' => 'Mobil Berhasil Disimpan']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get car by ID
        $cars = Car::findOrFail($id);

        //render view with post
        return view('cars.show', compact('cars'));
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
        $cars = Car::findOrFail($id);
        //render view with post
        return view('cars.edit', compact('cars'));
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
            'gambar'    =>'required|mimes:jpeg,jpg,png|max:2048',
            'tipe'      =>'required',
            'merk'      =>'required',
            'stock'     =>'required',
            'warna'     =>'required',
            'status'    =>'required',
            'deskripsi' =>'required',
            'no_seri'   =>'required'
        ]);
        //get post by ID
        $car = Car::findOrFail($id);
        //check if imageis uploaded
        if ($request->hasFile('gambar')){
            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/cars', $gambar->hashName());
            //delete old image
            Storage::delete('public/cars/' .$car->gambar);

            //update post with new image
            $car->update([
            'gambar'    =>$gambar->hashName(),
            'tipe'      =>$request->tipe,
            'merk'      =>$request->merk,
            'stock'     =>$request->stock,
            'warna'     =>$request->warna,
            'status'    =>$request->status,
            'deskripsi' =>$request->status,
            'no_seri'   =>$request->no_seri
            ]);
        }else{
            //update post without image
            $car->update([
                'status'       =>$request->status,
                'merk'        =>$request->merk
            ]);
        }

        //redirect to index
        return redirect()->route('cars.index')->with(['success' => 'Merk Mobil Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $car
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $car = Car::findOrFail($id);

        //delete image
        Storage::delete('public/cars/'. $car->gambar);

        //delete post
        $car->delete();

        //redirect to index
        return redirect()->route('cars.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
