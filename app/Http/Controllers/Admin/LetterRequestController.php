<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LetterRequest;

class LetterRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $letters = LetterRequest::when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20);
        return view('admin.letters.index', compact('letters', 'status'));
    }

    public function show(LetterRequest $letter)
    {
        return view('admin.letters.show', compact('letter'));
    }

    public function update(Request $request, LetterRequest $letter)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,proses,selesai',
            'notes'  => 'nullable|string',
        ]);
        $letter->update($data);
        return redirect()->route('admin.letters.index')->with('success', 'Status pengajuan diperbarui.');
    }

    public function destroy(LetterRequest $letter)
    {
        $letter->delete();
        return redirect()->route('admin.letters.index')->with('success', 'Pengajuan dihapus.');
    }
}
