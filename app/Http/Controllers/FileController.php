<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class FileController extends Controller
{
    public function getResizeImage()
    {
        return view('files.resizeimage');
    }

    public function postResizeImage(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
    
        $destinationPath = public_path('thumbnails');
        $thumb_img = Image::make($photo->getRealPath())->resize(400, 250, function($constraint)
	{
	    $constraint->aspectRatio();
	});
        $thumb_img->save($destinationPath.'/'.$imagename,80);
                    
        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);
        
        return back()
            ->with('success','Image Upload successful')
            ->with('imagename',$imagename);
    }
}