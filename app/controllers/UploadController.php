<?php

class UploadController extends BaseController {


	public function product($id) {
		if (Input::hasFile('file'))
		{
			$file = Input::file('file');
			$filename = str_random(40) . '.' .  $file->getClientOriginalExtension();
			$uploadpath = public_path('uploads/original');
		    $file->move($uploadpath, $filename);

		    Image::make(public_path('uploads/original/'.$filename))->resize(300,null,true)->save(public_path('uploads/regular/'.$filename));
		    Image::make(public_path('uploads/regular/'.$filename))->resizeCanvas(150,150, 'center')->save(public_path('uploads/thumbnail/'.$filename));

		    $o = new ProductPhoto;
		    $o->product_id = $id;
		    $o->filename = $filename;
		    $o->save();
 		}
	}
}