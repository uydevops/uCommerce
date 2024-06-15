<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use Illuminate\Support\Facades\Storage;

class GeneralSettingsController extends Controller
{
    public function settings()
    {
        $settings = GeneralSettings::find(1);
        return view('dashboard.settings', compact('settings'));
    }

    private function uploadImage($image)
    {
        // Resmin adını ve yolunu belirle
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'images/' . $imageName;

        // Resmi storage'a kaydet
        Storage::disk('public')->put($imagePath, file_get_contents($image));

        // Dosya yolunu döndür
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
