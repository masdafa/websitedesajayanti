<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $agendas = Agenda::when($search, fn($q) => $q->where('title', 'like', "%$search%"))
            ->orderBy('event_date', 'desc')
            ->paginate(15);
        return view('admin.agendas.index', compact('agendas', 'search'));
    }

    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'event_date'   => 'required|date',
            'event_time'   => 'nullable',
            'location'     => 'nullable|string|max:255',
            'category'     => 'required|string|max:100',
            'is_published' => 'boolean',
        ]);
        $data['is_published'] = $request->has('is_published');
        Agenda::create($data);
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'event_date'   => 'required|date',
            'event_time'   => 'nullable',
            'location'     => 'nullable|string|max:255',
            'category'     => 'required|string|max:100',
            'is_published' => 'boolean',
        ]);
        $data['is_published'] = $request->has('is_published');
        $agenda->update($data);
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil dihapus.');
    }
}
