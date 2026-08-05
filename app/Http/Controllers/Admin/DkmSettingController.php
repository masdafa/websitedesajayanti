<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class DkmSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.dkm_settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'dkm_profile_text' => 'nullable|string',
            'dkm_vision_text'  => 'nullable|string',
            'live_dakwah_url'  => 'nullable|string|url|max:255',
            'live_dakwah_url_2'=> 'nullable|string|url|max:255',
            'live_dakwah_url_3'=> 'nullable|string|url|max:255',
            'live_dakwah_url_4'=> 'nullable|string|url|max:255',
        ]);

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value ?? '');
        }

        return redirect()->route('admin.dkm-settings.edit')->with('success', 'Pengaturan DKM berhasil diperbarui.');
    }
}
