<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    protected function uploadImages($file)
    {
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath) , $filename);

        $sizes = ["300" , "600" , "900"];
        $url['images'] = $this->resize($file->getRealPath() , $sizes , $imagePath , $filename);
        $url['thumb'] = $url['images'][$sizes[0]];

        return $url;
    }

    private function resize($path , $sizes , $imagePath , $filename)
    {
        $images['original'] = $imagePath . $filename;
        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $filename;

            Image::make($path)->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));
        }

        return $images;
    }



   /* protected function UploadeImages($file)
    {
       /* $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath) , $filename);*/
      /*  $year = Carbon::now()->year;
        $imagePath = "/uploade/images/{$year}";
        $filename = $file->getClientOriginalName();
        $file = $file->move(public_path($imagePath), $filename);
        $sizes = ["300" , "600" , "900"];
        $url['images']=$this->resize($file->getRealPath() ,$imagePath , $filename , $sizes);
        $url['images']['thumb']= $url['images'][$sizes[0]];
        return $url;
    } */

  /*  private function resize($path , $imagePath , $fileName , $sizes)
    {
        $images['original'] = $imagePath.$fileName;
        foreach ($sizes as $size){
            $images[$size] = $imagePath."{$size}_".$fileName;
            Image::make($path)->resize($size , null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));
        }
        return $images;
    }*/

}
