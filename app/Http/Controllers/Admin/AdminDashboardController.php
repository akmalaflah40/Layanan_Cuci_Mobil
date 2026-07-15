<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCustomer = User::where('role','user')->count();

        $bookingHariIni = Booking::whereDate(
            'tanggal_booking',
            Carbon::today()
        )->count();

        $bookingMingguIni = Booking::whereBetween(
            'tanggal_booking',
            [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]
        )->count();

        $pendapatan = Booking::where('status','Selesai')
                        ->sum('total_harga');

        $bookings = Booking::with('service')
                    ->latest()
                    ->take(5)
                    ->get();

        return view('admin.dashboard',compact(
            'totalCustomer',
            'bookingHariIni',
            'bookingMingguIni',
            'pendapatan',
            'bookings'
        ));
    }
    public function reports()
{
    $totalPendapatan = Booking::where('status', 'Selesai')
        ->sum('total_harga');

    $totalBooking = Booking::count();

    $totalCustomer = User::where('role', 'user')->count();

    $transaksi = Booking::with('service')
        ->where('status', 'Selesai')
        ->latest()
        ->get();

    $grafik = [];

    for ($i = 1; $i <= 12; $i++) {

        $grafik[$i] = Booking::where('status', 'Selesai')
            ->whereMonth('tanggal_booking', $i)
            ->sum('total_harga');
    }

    return view('admin.reports', compact(
        'totalPendapatan',
        'totalBooking',
        'totalCustomer',
        'transaksi',
        'grafik'
    ));
}
}