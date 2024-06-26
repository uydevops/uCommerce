<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdSettingsController extends Controller
{
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

    private function saveAds($request, $update = false)
    {
        $sliderImage = $request->file('slider_image');
        $smallBannerImage = $request->file('small_banner_image');
        $smallBannerImage2 = $request->file('small_banner_image_2');
        $mediumBannerImage = $request->file('medium_banner_image');


        $data = [
            'slider_title' => $request->input('slider_title'),
            'slider_description' => $request->input('slider_description'),
            'small_banner_title' => $request->input('small_banner_title'),
            'small_banner_description' => $request->input('small_banner_description'),
            'medium_banner_title' => $request->input('medium_banner_title'),
            'medium_banner_description' => $request->input('medium_banner_description'),
        ];

        if ($sliderImage) {
            $data['slider_image'] = $this->uploadImage($sliderImage);
        }

        if ($smallBannerImage) {
            $data['small_banner_image'] = $this->uploadImage($smallBannerImage);
        }

        if ($mediumBannerImage) {
            $data['medium_banner_image'] = $this->uploadImage($mediumBannerImage);
        }

        if ($smallBannerImage2) {
            $data['small_banner_image_2'] = $this->uploadImage($smallBannerImage2);
        }

        if ($update) {
            DB::table('ad_settings')->where('id', 1)->update($data);
        } else {
            DB::table('ad_settings')->insert($data);
        }

        return redirect()->back()->with('success', 'Reklam ayarları başarıyla ' . ($update ? 'güncellendi.' : 'kaydedildi.'));
    }

    public function addAds(Request $request)
    {
        return $this->saveAds($request);
    }

    public function updateAds(Request $request)
    {
        return $this->saveAds($request, true);
    }
}
