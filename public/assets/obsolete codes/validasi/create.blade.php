@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" align="center">
        <br />
        <h3 aling="center">Upload data</h3>
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
            <input type="submit" class="btn btn-primary" />
        </div>
        </form>
        </div>
    </div>
</div>
@endsection