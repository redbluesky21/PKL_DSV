<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\validasi;
use Intervention\Image\ImageManager;

class ValidasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validasis = Validasi::all()->toArray();
        return view('validasi.index', compact('validasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('validasi.create');
    }

    public function crop()
    {
        $quality = 90;

        $src  = Input::get('image');
        $img  = imagecreatefromjpeg($src);
        $dest = ImageCreateTrueColor(Input::get('w'),
            Input::get('h'));
        imagecopyresampled($dest, $img, 0, 0, Input::get('x'),
            Input::get('y'), Input::get('w'), Input::get('h'),
            Input::get('w'), Input::get('h'));
        imagejpeg($dest, $src, $quality);
         //return <img src='" . $src . "'>";
    return;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'file' => 'required',
		]);
        $filename= 'image.png';
		// menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
		echo 'File Name: '.$file->getClientOriginalName();
		echo '<br>';
		echo 'File Extension: '.$file->getClientOriginalExtension();
		echo '<br>';
		echo 'File Real Path: '.$file->getRealPath();
		echo '<br>';
		echo 'File Size: '.$file->getSize();
		echo '<br>';
		echo 'File Mime Type: '.$file->getMimeType();
        $tujuan_upload = 'ImageToValidate';
        //Menamai dengan nama original file
        //$file->move($tujuan_upload,$file->getClientOriginalName());
        //Menamai file dengan parameter $filename diatas
        $file->move($tujuan_upload,$filename);
        $qrcode = new QrReader('path/to_image');
        $text = $qrcode->text(); //return decoded text from QR Code
        $isi = $text;
        //$file->storeAs($tujuan_upload, 'hi');
        // $file = Input::('Images');
        // Input::file('photo')->move($tujuan_upload, $fileName);
        // $validasi = new Validasi([
        //     'file'  =>  $request->get('file'),
        // ]);
        // $validasi->save();
        //crops
        // $im = imagecreatefrompng('ImageToValidate/image.png'); 
      
        // // find the size of image 
        // $size = min(imagesx($im), imagesy($im)); 
          
        // // Set the crop image size  
        // $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => 250, 'height' => 150]); 
        // if ($im2 !== FALSE) { 
        //     header("Content-type: image/png"); 
        //        imagepng($im2); 
        //     imagedestroy($im2); 
        // } 
        // imagedestroy($im); 
        // $image = imagecreatefromjpeg('ImageToValidate/Image.jpg');
        // $filename2 = 'ImageToValidate/image_cropped.jpg';

        // $thumb_width = 200;
        // $thumb_height = 200;

        // $width = imagesx($image);
        // $height = imagesy($image);

        // $original_aspect = $width / $height;
        // $thumb_aspect = $thumb_width / $thumb_height;

        // if ( $original_aspect >= $thumb_aspect )
        // {
        // // If image is wider than thumbnail (in aspect ratio sense)
        // $new_height = $thumb_height;
        // $new_width = $width / ($height / $thumb_height);
        // }
        // else
        // {
        // // If the thumbnail is wider than the image
        // $new_width = $thumb_width;
        // $new_height = $height / ($width / $thumb_width);
        // }

        // $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

        // // Resize and crop
        // imagecopyresampled($thumb,
        //                 $image,
        //                 0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
        //                 0 - ($new_height - $thumb_height) / 2, // Center the image vertically
        //                 0, 0,
        //                 $new_width, $new_height,
        //                 $width, $height);
        // imagejpeg($thumb, $filename, 80);
        // $thumb->move($tujuan_upload,$filename2);

        return redirect()->route('validasi.index')->with('success', 'Data Added');
        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $validasi = Validasi::find($id);
        return view('validasi.edit', compact('validasi', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'file'  =>  ['required'],
        ]);

        $validasi = Validasi::find($id);
        $validasi->file = $request->get('file');
        $validasi->update();
        return redirect()->route('validasi.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validasi = Validasi::find($id);
        $validasi->delete();
        return redirect()->route('validasi.index')->with('success', 'Data Deleted');
    }
}
