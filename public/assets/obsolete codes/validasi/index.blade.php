@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ url('jcrop') }}/jquery.Jcrop.min.css">
<script src="{{ url('jcrop') }}/upload.js"></script>
<script src="{{ url('jcrop') }}/jquery.Jcrop.min.js"></script>
<div class="container">
    <br>
    <br>
    <br>
    <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card" style="width: 18rem;">
                
                <h5 class="card-header" align="center">
                    <b>Validasi</b>
                </h5>

                <div class="card-body">
                <div align="center">
                    <br />
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                    <form method="post" action="{{url('validasi')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                
                            <div class="form-group">
                            <b>File Gambar</b><br/>
                            <input type="file" name="file">
                            </div>
                
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary"/>
                    {{-- <a href="{{route('validasi.create')}}" class="btn btn-primary"> Upload </a>
                    <br /> --}}
                    </div>
                    <table class="table table-bordered">
                    <tr>
                        {{-- <th>File</th> --}}
                        {{-- <th>Validate</th> --}}
                        {{-- <div align="center"> --}}
                            {{-- <a href="{{route('validasi.validasi')}}" class="btn btn-primary"> Validate </a>
                            <br /> --}}
                            <form method="post" action="{{action('ValidasiController@saveCroppedImage')}}">
                                {{csrf_field()}}
                            <a href="{{route('crop.image')}}" class="btn btn-primary"> Validate </a>
                            {{-- <button class="btn btn-primary" id="crop">Crop</button> --}}
                        {{-- </div> --}}
                    </tr>
                    </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
     $('.delete_form').on('submit', function(){
      if(confirm("Yakin anda ingin menghapus validasi data?"))
      {
       return true;
      }
      else
      {
       return false;
      }
     });
    });
</script>
{{-- <!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="row">
		<div class="container">
			<h2 class="text-center my-5">Upload File</h2>
			
			<div class="col-lg-8 mx-auto my-5">	

				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif

				<form action="{{route('validasi.create')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
                    </div>
                    
					<input type="submit" value="Upload" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</body>
</html> --}}
@endsection