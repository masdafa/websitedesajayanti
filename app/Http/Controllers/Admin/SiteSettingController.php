<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'hero_title'       => 'nullable|string|max:255',
            'hero_subtitle'    => 'nullable|string',
            'announcement'     => 'nullable|string',
            'profil_text'      => 'nullable|string',
            'visi_text'        => 'nullable|string',
            'misi_text'        => 'nullable|string',
            'housing_map_image'=> 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('housing_map_image')) {
            $oldImage = SiteSetting::get('housing_map_image');
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            $path = $request->file('housing_map_image')->store('maps', 'public');
            $data['housing_map_image'] = $path;
        }

        foreach ($data as $key => $value) {
            if ($key === 'housing_map_image' && !isset($data['housing_map_image'])) continue;
            SiteSetting::set($key, $value ?? '');
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
