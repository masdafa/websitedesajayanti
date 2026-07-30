<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ActivityRegistration;

class ActivityRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $activities = ActivityRegistration::when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20);
        return view('admin.activities_reg.index', compact('activities', 'status'));
    }

    public function show(ActivityRegistration $activities_reg)
    {
        return view('admin.activities_reg.show', compact('activities_reg'));
    }

    public function update(Request $request, ActivityRegistration $activities_reg)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'notes'  => 'nullable|string',
        ]);
        $activities_reg->update($data);
        return redirect()->route('admin.activities-reg.index')->with('success', 'Status pendaftaran diperbarui.');
    }

    public function destroy(ActivityRegistration $activities_reg)
    {
        $activities_reg->delete();
        return redirect()->route('admin.activities-reg.index')->with('success', 'Pendaftaran dihapus.');
    }
}
