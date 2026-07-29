<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceInfo;
use Illuminate\Http\Request;

class ServiceInfoController extends Controller
{
    public function index()
    {
        $services = ServiceInfo::orderBy('sort_order')->get();
        return view('admin.service_infos.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service_infos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'required|string',
            'color'       => 'required|in:blue,red,green,amber',
            'sort_order'  => 'nullable|integer|min:0',
        ]);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        ServiceInfo::create($data);
        return redirect()->route('admin.service-infos.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(ServiceInfo $serviceInfo)
    {
        return view('admin.service_infos.edit', compact('serviceInfo'));
    }

    public function update(Request $request, ServiceInfo $serviceInfo)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'required|string',
            'color'       => 'required|in:blue,red,green,amber',
            'sort_order'  => 'nullable|integer|min:0',
        ]);
        $serviceInfo->update($data);
        return redirect()->route('admin.service-infos.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(ServiceInfo $serviceInfo)
    {
        $serviceInfo->delete();
        return redirect()->route('admin.service-infos.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
