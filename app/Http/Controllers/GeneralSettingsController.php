<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;

class GeneralSettingsController extends Controller
{
    public function settings()
    {
        $settings = GeneralSettings::find(1);
        return view('dashboard.settings', compact('settings'));
    }

    private function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('images');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $image->move($destinationPath, $imageName);

        return $imageName;
    }

    public function updateSettings(Request $request)
    {
        $settings = GeneralSettings::find(1);

        $data = $request->except('_token', 'logo', 'footer_logo');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = $this->uploadImage($logo);
            $data['logo'] = $logoName;
        }

        if ($request->hasFile('footer_logo')) {
            $footerLogo = $request->file('footer_logo');
            $footerLogoName = $this->uploadImage($footerLogo);
            $data['footer_logo'] = $footerLogoName;
        }

        $settings->update($data);

        return redirect()->back()->with('success', 'Ayarlar başarıyla güncellendi');
    }
}
