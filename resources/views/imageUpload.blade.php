@php use App\Http\Controllers\ImageController; 
@endphp
@extends('layouts.app')


@section('content')
<div class="container">
<h1>Upload Sertifikat</h1>
@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Ada masalah dengan inputan anda.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	
@endif

{!! Form::open(array('route' => 'imageUploadPost','enctype' => 'multipart/form-data')) !!}
	<div class="row">
		<div class="col-md-4">
			<br/>
			{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Masukkan Judul')) !!}
		</div>
		<div class="col-md-12">
			<br/>
			{!! Form::file('image', array('class' => 'image')) !!}
		</div>
		<div class="col-md-12">
			<br/>
			<button type="submit" class="btn btn-success">Upload Image</button>
		</div>
	</div>
{!! Form::close() !!}
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
</div>

<div>
	<div>
		<div class="card" style="width: 36rem;">
			<img class="card-img-top" src="/images/thumbnail/{{ Session::get('imageName') }}" alt="Card image cap">
			<div class="card-body">
				<p class="card-text">File yang di upload: </p>
			</div>
		</div>
	</div>
	</div>
	<div class="row">
	<div class="col-sm card" style="width: 18rem;">
		<img class="card-img-top" src="/images/kegiatan/{{ Session::get('imageName') }}" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">{{ ImageController::geteventname(Session::get('imageName')) }}</p>
		</div>
	</div>
	<div class="col-sm card" style="width: 18rem;">
		<img class="card-img-top" src="/images/ttd1/{{ Session::get('imageName') }}" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">{{ ImageController::getttd1(Session::get('imageName')) }}</p>
		</div>
	</div>
	<div class="col-sm card" style="width: 18rem;">
		<img class="card-img-top" src="/images/ttd2/{{ Session::get('imageName') }}" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">{{ ImageController::getttd2(Session::get('imageName')) }}</p>
		</div>
	</div>
	<div class="col-sm card" style="width: 18rem;">
		<img class="card-img-top" src="/images/ttd3/{{ Session::get('imageName') }}" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">{{ ImageController::getttd3(Session::get('imageName')) }}</p>
		</div>
	</div>
</div>
{{--  --}}

{{-- 
<div class="row">
	<div class="col-md-4">
		<strong>Thumbnail Image:</strong>
		<br/>
		<img src="/images/thumbnail/{{ Session::get('imageName') }}" />

	</div>
</div>

<div class="row polaroid">
	<div class="col-md-4">
		<strong>Nama Kegiatan:</strong>
		<br/>
		<img src="/images/kegiatan/{{ Session::get('imageName') }}" class="img1"/>
		<div class="container2">
		<p>{{ ImageController::geteventname(Session::get('imageName')) }}</p>
		</div>
		
	</div>

	<div class="col-md-4">
		<strong>Tanda Tangan 1:</strong>
		<br/>
		<img src="/images/ttd1/{{ Session::get('imageName') }}" class="img1" />
		<div class="container2">
		{{ ImageController::getttd1(Session::get('imageName')) }}
		</div>
	</div>

	<div class="col-md-4">
		<strong>Tanda Tangan 2:</strong>
		<br/>
		<img src="/images/ttd2/{{ Session::get('imageName') }}" />
		{{ ImageController::getttd2(Session::get('imageName')) }}
	</div>

	<div class="col-md-4">
		<strong>Tanda Tangan 3:</strong>
		<br/>
		<img src="/images/ttd3/{{ Session::get('imageName') }}" />
		{{ ImageController::getttd3(Session::get('imageName')) }}
	</div> --}}

</div>
@endif
@endsection