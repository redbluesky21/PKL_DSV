<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManager;
use Image;
use Zxing\QrReader;
use App\Http\Controllers\TandaTanganController;

class ImageController extends TandaTanganController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
    	return view('imageUpload');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
	    $this->validate($request, [
	    	'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //deklarasi image dari yang di upload
        $image = $request->file('image');
        //nama gambar
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        // lebih kecil buat tampilan
        $destinationPath = public_path('/images/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(400, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);

        //QR Code kegiatan
        $destinationPath = public_path('/images/kegiatan');
        $img = Image::make($image->getRealPath());
        $img->crop(450, 450, 50, 50);
        $img->resize(200, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);
        
        //QR Code TTD 1
        $destinationPath = public_path('/images/ttd1');
        $img = Image::make($image->getRealPath());
        $img->crop(450, 450, 440, 1180);
        $img->resize(200, null, function ($constraint) {
		    $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
        
        //QR Code TTD 2
        $destinationPath = public_path('/images/ttd2');
        $img = Image::make($image->getRealPath());
        $img->crop(450, 450, 980, 1180);
        $img->resize(200, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);

        //QR Code TTD 3
        $destinationPath = public_path('/images/ttd3');
        $img = Image::make($image->getRealPath());
        $img->crop(450, 450, 1620, 1180);
        $img->resize(200, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);
        

        $destinationPath = public_path('/images/uploads');
        $image->move($destinationPath, $input['imagename']);


        //$this->postImage->add($input);


        return back()
        	->with('success','Gambar Berhasil di Upload!')
        	->with('imageName',$input['imagename']);
    }

    public static function geteventname($request)
    {
        $imagePath = public_path("\images\\kegiatan\\$request");
        $qrcode = new QrReader("$imagePath");
        $text = $qrcode->text(); //return decoded text from QR Code
        echo $text;
        // $valid = "Valid";
        // $invalid ="INVALID";
        // if (User::where('email', '=', Input::get('email'))->exists()) {
        //     // user found
        //  }
        
    }

    public static function getttd1($request)
    {
        $imagePath = public_path("\images\\ttd1\\$request");
        $qrcode = new QrReader("$imagePath");
        $text = $qrcode->text(); //return decoded text from QR Code
        echo $text;
    }
    
    public static function getttd2($request)
    {
        $imagePath = public_path("\images\\ttd2\\$request");
        $qrcode = new QrReader("$imagePath");
        $text = $qrcode->text(); //return decoded text from QR Code
        echo $text;
    }    
    
    public static function getttd3($request)
    {
        $imagePath = public_path("\images\\ttd3\\$request");
        $qrcode = new QrReader("$imagePath");
        $text = $qrcode->text(); //return decoded text from QR Code
        echo $text;
    }

}