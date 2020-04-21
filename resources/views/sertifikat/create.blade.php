@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Masukkan data sertifikat baru</h3>
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

  <form method="post" action="{{url('sertifikat')}}">
   {{csrf_field()}}

   <div class="form-group">
    <input type="text" name="nama_sertifikat" class="form-control" placeholder="Masukkan nama sertifikat" />
   </div>
   <div class="form-group">
    <input type="text" name="tandatangan1" class="form-control" placeholder="Tanda Tangan 1" />
   </div>
   <div class="form-group">
    <input type="text" name="tandatangan2" class="form-control" placeholder="Tanda Tangan 2" />
   </div>
   <div class="form-group">
    <input type="text" name="tandatangan3" class="form-control" placeholder="Tanda Tangan 3" />
   </div>

   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
</div>
@endsection