<?php 

namespace App\Http\Traits;

use DateTime;
use Storage;

trait FileSystem
{
    public function uploadImage ($path){
        $image_name = request()->image->getClientOriginalName();
        $image_name = time() ."_". rand(100,10000000) . "_" . $image_name ;
        request()->file('image')->storeAs($path,$image_name,'custom_disk');
        return $image_name;
    }

    public function deleteImage($path){
        Storage::disk('custom_disk')->delete($path);
    }

    public function getImageUrl ($path){
        return   Storage::disk('custom_disk')->url($path);
       }
}
