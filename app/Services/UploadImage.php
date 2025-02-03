<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class  UploadImage
{
    public function uploadImage($imageFile, $folderPath = 'images', $width = 800, $height = 600)
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($imageFile);

        $image->resize($width, $height);
        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();

        $imagePath = 'uploads/'.$folderPath . '/' . $imageName;
        $image->toPng()->save(public_path($imagePath));

        return $imagePath;
    }
}

?>
