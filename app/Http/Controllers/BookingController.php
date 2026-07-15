<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // ================= USER =================

    public function index()
    {
        $bookings = Booking::with('service')
                    ->latest()
                    ->get();

        $diproses = Booking::where('status','Diproses')->count();
        $selesai = Booking::where('status','Selesai')->count();
        $dibatalkan = Booking::where('status','Dibatalkan')->count();

        return view('user.bookings', compact(
            'bookings',
            'diproses',
            'selesai',
            'dibatalkan'
        ));
    }

    public function create()
    {
        $services = Service::where('status','Aktif')->get();

        return view('booking', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'no_hp' => 'required|max:20',
            'alamat' => 'required',
            'kendaraan' => 'required|max:255',
            'service_id' => 'required|exists:services,id',
            'tanggal_booking' => 'required|date',
            'jam_booking' => 'required',
            'catatan' => 'nullable'
        ]);

        $service = Service::findOrFail($request->service_id);

        Booking::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kendaraan' => $request->kendaraan,
            'service_id' => $service->id,
            'total_harga' => $service->harga,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_booking' => $request->jam_booking,
            'catatan' => $request->catatan,
            'status' => 'Menunggu'
        ]);

        return redirect()->route('booking')
    ->with('payment', true)
    ->with('total', $service->harga);
    }

    // ================= ADMIN =================

    public function adminIndex()
    {
        $bookings = Booking::with('service')
                    ->latest()
                    ->get();

        return view('admin.bookings', [
            'bookings' => $bookings,
            'totalBooking' => Booking::count(),
            'menunggu' => Booking::where('status','Menunggu')->count(),
            'diproses' => Booking::where('status','Diproses')->count(),
            'selesai' => Booking::where('status','Selesai')->count(),
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Dibatalkan'
        ]);

        $booking->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.bookings')
            ->with('success','Status booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
{
    $booking->delete();

    return redirect()->route('admin.bookings')
            ->with('success','Booking berhasil dihapus.');
}
public function history()
{
    $histories = Booking::with('service')
        ->latest()
        ->get();

    return view('user.history', [
        'histories'       => $histories,
        'totalTransaksi'  => $histories->count(),
        'menunggu'        => $histories->where('status','Menunggu')->count(),
        'dibatalkan'      => $histories->where('status','Dibatalkan')->count(),
    ]);
}
}