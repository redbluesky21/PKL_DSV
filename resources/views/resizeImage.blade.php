@extends('layouts.app')


@section('content')
<div class="container">
<h1>Upload Sertifikat</h1>
@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
</div>
<div class="row">
	<div class="col-md-4">
		<strong>Thumbnail Image:</strong>
		<br/>
		<img src="/images/thumbnail/{{ Session::get('imageName') }}" />
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<strong>Nama Kegiatan:</strong>
		<br/>
		<img src="/images/kegiatan/{{ Session::get('imageName') }}" />
	</div>

	<div class="col-md-4">
		<strong>Tanda Tangan 1:</strong>
		<br/>
		<img src="/images/ttd1/{{ Session::get('imageName') }}" />
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<strong>Tanda Tangan 2:</strong>
		<br/>
		<img src="/images/ttd2/{{ Session::get('imageName') }}" />
	</div>

	<div class="col-md-4">
		<strong>Tanda Tangan 3:</strong>
		<br/>
		<img src="/images/ttd3/{{ Session::get('imageName') }}" />
	</div>

</div>
@endif


{!! Form::open(array('route' => 'resizeImagePost','enctype' => 'multipart/form-data')) !!}
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
@endsection