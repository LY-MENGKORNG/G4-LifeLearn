<?php
namespace App\Traits;

trait uploadImage{

    public static function saveImage($image, $path = 'images')
    {
        $imageName = time().'_'.$image->getClientOriginalName();

        $image->move(public_path($path), $imageName);

        // $image->storeAs($path,$imageName,'public');
        return $imageName;
    }
}
