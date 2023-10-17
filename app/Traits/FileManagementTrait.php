<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileManagementTrait
{

    public function storeFile($path,$file){

        $fileName = time().rand(1,99).'.'.$file->extension();
        $file->move(public_path($path), $fileName);

        return $fileName;

    }


    public function removeFile($disk,$path,$file){

        Storage::disk($disk)->delete("$path/$file");



    }
}
