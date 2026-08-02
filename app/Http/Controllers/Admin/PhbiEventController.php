<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhbiEvent;
use Illuminate\Http\Request;

class PhbiEventController extends Controller
{
    public function index()
    {
        $events = PhbiEvent::latest()->get();
        return view('admin.phbi_events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.phbi_events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        PhbiEvent::create($data);

        return redirect()->route('admin.phbi-events.index')->with('success', 'PHBI berhasil ditambahkan.');
    }

    public function edit(PhbiEvent $phbiEvent)
    {
        return view('admin.phbi_events.edit', compact('phbiEvent'));
    }

    public function update(Request $request, PhbiEvent $phbiEvent)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $phbiEvent->update($data);

        return redirect()->route('admin.phbi-events.index')->with('success', 'PHBI berhasil diperbarui.');
    }

    public function destroy(PhbiEvent $phbiEvent)
    {
        $phbiEvent->delete();
        return redirect()->route('admin.phbi-events.index')->with('success', 'PHBI berhasil dihapus.');
    }
}
