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

    public function addAds(Request $request)
    {
        $sliderImage = $this->uploadImage($request->file('slider_image'));
        $smallBannerImage = $this->uploadImage($request->file('small_banner_image'));
        $mediumBannerImage = $this->uploadImage($request->file('medium_banner_image'));

        DB::table('ad_settings')->insert([
            'slider_title' => $request->input('slider_title'),
            'slider_description' => $request->input('slider_description'),
            'slider_image' => $sliderImage,
            'small_banner_title' => $request->input('small_banner_title'),
            'small_banner_description' => $request->input('small_banner_description'),
            'small_banner_image' => $smallBannerImage,
            'medium_banner_title' => $request->input('medium_banner_title'),
            'medium_banner_description' => $request->input('medium_banner_description'),
            'medium_banner_image' => $mediumBannerImage,
        ]);

        return redirect()->back()->with('success', 'Ad settings have been saved successfully.');
    }


    public function updateAds(Request $request)
    {
        $sliderImage = $request->file('slider_image');
        $smallBannerImage = $request->file('small_banner_image');
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

        DB::table('ad_settings')->where('id', 1)->update($data);

        return redirect()->back()->with('success', 'Reklam ayarları başarıyla güncellendi.');
    }


}
