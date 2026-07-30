<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GuestBook;

class GuestBookController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $guests = GuestBook::when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20);
        return view('admin.guests.index', compact('guests', 'status'));
    }

    public function show(GuestBook $guest)
    {
        return view('admin.guests.show', compact('guest'));
    }

    public function update(Request $request, GuestBook $guest)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);
        $guest->update($data);
        return redirect()->route('admin.guests.index')->with('success', 'Status buku tamu diperbarui.');
    }

    public function destroy(GuestBook $guest)
    {
        $guest->delete();
        return redirect()->route('admin.guests.index')->with('success', 'Buku tamu dihapus.');
    }
}
