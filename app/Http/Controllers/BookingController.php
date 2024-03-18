<?php

namespace App\Http\Controllers;

use App\Models\tables;
use App\Models\booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = booking::all();
        $tables = tables::get()->pluck('nama_meja');
        return view('booking', compact('bookings', 'tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function admin()
    {
        $bookings = booking::all();
        $bookingsCount = booking::count();
        return view('admin.booking.index', compact('bookings', 'bookingsCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'tgl_booking' => 'required',
            'table' => 'required',
            'message' => 'nullable',
        ]);

        $validated['message'] = filled($validated['message']) ? $validated['message'] : '-';
        booking::create($validated);
        return redirect()->route('booking')->with('success', 'Booking Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(booking $booking)
    {
        //
    }
}