@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Masukkan data tanda tangan baru</h3>
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

  <form method="post" action="{{url('tandatangan')}}">
   {{csrf_field()}}

   <div class="form-group">
    <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama" />
   </div>
   <div class="form-group">
    <input type="text" name="NIP" class="form-control" placeholder="NIP" />
   </div>
   <div class="form-group">
    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" />
   </div>
   <div class="form-group">
    <input type="text" name="tempat_menjabat" class="form-control" placeholder="Tempat Menjabat" />
   </div>
   <div class="form-group">
    <input type="text" name="keterangan" class="form-control" placeholder="keterangan" />
   </div>

   <div class="form-group">
    <input type="submit" value="Upload" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
</div>
@endsection