<?php


namespace App\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    protected $fileUpload =true;
    protected function saveImage(UploadedFile $file)
{
    $fileName = time() . $file->getClientOriginalName();
    Storage::disk('public')->putFileAs(
        $fileName, $file, $fileName
    );
    return '/storage/' . $fileName . '/' . $fileName;
    }
    protected function deleteImage($path){
        if( Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
    }
    protected function updateImage(UploadedFile $file, $oldPath){
        $this->deleteImage($oldPath);
        return $this->saveImage($file);
    }


}
