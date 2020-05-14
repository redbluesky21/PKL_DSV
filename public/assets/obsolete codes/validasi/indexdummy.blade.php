@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ url('jcrop') }}/jquery.Jcrop.min.css">
<script src="{{ url('jcrop') }}/upload.js"></script>
<script src="{{ url('jcrop') }}/jquery.Jcrop.min.js"></script>

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <br />
                <h3 align="center"> Tanda Tangan </h3>
                <br />
                @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
                @endif
                <div align="center">
                    <a href="{{route('validasi.create')}}" class="btn btn-primary"> Upload </a>
                    <br />
                </div>
                <table class="table table-bordered">
                    <tr>
                        {{-- <th>File</th> --}}
                        {{-- <th>Validate</th> --}}
                        <div align="center">
                            {{-- <a href="{{route('validasi.validasi')}}" class="btn btn-primary"> Validate </a>
                            <br /> --}}
                            <button class="btn btn-primary" id="crop">Crop</button>
                        </div>
                    </tr>
                    @foreach($validasis as $row)
                    <tr>

                        {{-- <td>{{$row['file']}}</td> --}}
                        <td><a href="{{action('ValidasiController@edit', $row['id'])}}" class="btn btn-warning"> Edit</td>
                        <td><form method="post" class="delete_form" action="{{action('ValidasisController@destroy', $row['id'])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">Delete</button>
                           </form></td>
                    </tr>
                    @endforeach
                </table>
        </div>n
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