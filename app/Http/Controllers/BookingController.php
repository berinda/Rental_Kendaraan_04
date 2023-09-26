<?php

namespace App\Http\Controllers;
//import model car
use App\Models\Booking;
use App\Models\Car;
//return type view
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import facade "storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * index
     *
     * @return View
     */public function index(): View
     {
        //get cars
        $bookings = Booking::latest()->paginate(5);

        //render view with cars
        return view('bookings.bookindex', compact('bookings'));
     }
      /**
     * create
     *
     * @return View
     */
    public function create() :View
    {
        $car = Car::all();
        return view('bookings.bookcreate', compact('car'));
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
            'nama_customer' =>'required|min:5',
            'nik'           =>'required|min:5',
            'merk'          =>'required|min:0',
            'tanggal_pesan'     =>'required|min:0',
            'tanggal_kembali'   =>'required|min:5',
            'jumlah'        =>'required|min:0',
            'gambar     '   =>'required|mimes:jpeg,jpg,png|max:2048',
            'CarId'         =>'required'
        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/bookings', $gambar->hashName());

        //create car
        Booking::create([
            'nama_customer'  =>$request->nama_customer,
            'nik'            =>$request->nik,
            'merk'           =>$request->merk,
            'tanggal_pesan'      =>$request->tanggal_pesan,
            'tanggal_kembali'    =>$request->tanggal_kembali,
            'jumlah'         =>$request->jumlah,
            'gambar'         =>$gambar->hashName(),
            'CarId'         =>$request->CarId,
        ]);

        //redirect to index
        return redirect()->route('booking.bookindex')->with(['success' => 'Mobil Berhasil Disimpan']);
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
        $bookings = Booking::findOrFail($id);
        //render view with post
        return view('bookings.bookedit', compact('bookings'));
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
            'nama_customer' =>'required|min:5',
            'nik'           =>'required|min:5',
            'merk'          =>'required|min:0',
            'tanggal_pesan'     =>'required|min:0',
            'tanggal_kembali'   =>'required|min:5',
            'jumlah'        =>'required|min:0',
            'gambar     '   =>'required|mimes:jpeg,jpg,png|max:2048',
            'CarId'         =>'required'

        ]);
        //get post by ID
        $booking = Booking::findOrFail($id);
        //check if imageis uploaded
        if ($request->hasFile('gambar')){
            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/bookings', $gambar->hashName());
            //delete old image
            Storage::delete('public/bookings/' .$booking->gambar);

            //update post with new image
            $booking->update([
                'nama_customer'  =>$request->nama_customer,
                'nik'            =>$request->nik,
                'merk'           =>$request->merk,
                'tanggal_pesan'      =>$request->tanggal_pesan,
                'tanggal_kembali'    =>$request->tanggal_kembali,
                'jumlah'         =>$request->jumlah,
                'gambar'         =>$gambar->hashName(),
                'CarId'         =>$request->CarId,
            ]);
        }else{
            //update post without image
            $booking->update([
                'tanggal_kembali'       =>$request->tanggal_kembali,
                'jumlah'        =>$request->jumlah
            ]);
        }

        //redirect to index
        return redirect()->route('bookings.bookindex')->with(['success' => 'Merk Mobil Berhasil Diubah!']);
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
        $booking = Booking::findOrFail($id);

        //delete image
        Storage::delete('public/bookings/'. $booking->gambar);

        //delete post
        $booking->delete();

        //redirect to index
        return redirect()->route('bookings.bookindex')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
