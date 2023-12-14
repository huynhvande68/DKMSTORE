<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait UpLoadFileStorageTrait
{
    public function upStorage($request, $nameClient, $folderName)
    {
        if ($request->hasFile($nameClient)) {
            $file = $request->$nameClient;
            // $  = $file->getClientOriginalName();
            $fileNameHas      = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $pathFile = $request->file($nameClient)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHas);
            $dataUploadTrait = [
                'file_name' =>  $fileNameHas,
                'file_path'  =>  Storage::url($pathFile)
            ];
            return $dataUploadTrait;
        }
        return null;
    }

    // upload multiple file

    public function upStorageMultiple($file, $folderName)
    {

        $fileNameOriginal = $file->getClientOriginalName();
        $fileNameHas      = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $pathFile = $file->storeAs('public/' . $folderName, $fileNameHas);
        $dataUploadTrait = [
            'file_name' =>  $fileNameHas,
            'file_path'  =>  Storage::url($pathFile)
        ];
        return $dataUploadTrait;
    }

    // upload customer

    public function upStorageCustomer($request, $nameClient, $folderName)
    {
        if ($request->hasFile($nameClient)) {
            $file = $request->$nameClient;
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHas      = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $pathFile = $request->file($nameClient)->storeAs('public/' . $folderName . '/' . Auth::guard('customer')->id(), $fileNameHas);
            $dataUploadTrait = [
                'file_name' =>  $fileNameOriginal,
                'file_path'  =>  Storage::url($pathFile)
            ];
            return $dataUploadTrait;
        }
        return null;
    }


    public function upStorageDontUser($request, $nameClient, $folderName)
    {
        if ($request->hasFile($nameClient)) {
            $file = $request->$nameClient;
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHas      = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $pathFile = $request->file($nameClient)->storeAs('public/' . $folderName, $fileNameHas);
            $dataUploadTrait = [
                'file_name' =>  $fileNameHas,
                'file_path'  =>  Storage::url($pathFile)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
}
