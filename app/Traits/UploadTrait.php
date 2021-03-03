<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadTrait {
    public function uploadOne(UploadedFile $uploadedFile,$folder,$filename) {
        $file = $uploadedFile->storeAs($folder,$filename.".".$uploadedFile->guessExtension(),'public');
        return $file;
    }
}