<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhbiEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
          $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'icon', 'description']);

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('phbi_events', 'public');
            }
            $data['images'] = $imagePaths;
        }

        PhbiEvent::create($data);

        return redirect()->route('admin.phbi-events.index')->with('success', 'PHBI berhasil ditambahkan.');
    }

    public function edit(PhbiEvent $phbiEvent)
    {
        return view('admin.phbi_events.edit', compact('phbiEvent'));
    }

    public function update(Request $request, PhbiEvent $phbiEvent)
    {
          $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'icon', 'description']);

        if ($request->hasFile('images')) {
            if (!empty($phbiEvent->images)) {
                foreach ($phbiEvent->images as $img) {
                    if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('phbi_events', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $phbiEvent->update($data);

        return redirect()->route('admin.phbi-events.index')->with('success', 'PHBI berhasil diperbarui.');
    }

    public function destroy(PhbiEvent $phbiEvent)
    {
        if (!empty($phbiEvent->images)) {
            foreach ($phbiEvent->images as $img) {
                if (Storage::disk('public')->exists($img)) Storage::disk('public')->delete($img);
            }
        }
        $phbiEvent->delete();
        return redirect()->route('admin.phbi-events.index')->with('success', 'PHBI berhasil dihapus.');
    }
}
