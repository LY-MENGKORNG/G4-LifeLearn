<?php
namespace App\Traits;

trait UploadFile{

    public static function saveFile($file, $path = 'documents')
    {
        $fileName = time().'_'.$file->getClientOriginalName();

        $file->move(public_path($path), $fileName);

        // $image->storeAs($path,$imageName,'public');
        return $fileName;
    }
}
