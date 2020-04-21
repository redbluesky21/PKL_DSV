@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  
  <form method="post" action="{{action('TandaTanganController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group">
    <input type="text" name="nama_lengkap" class="form-control" value="{{$tandatangan->nama_lengkap}}" placeholder="Masukkan Nama Lengkap" />
   </div>
   <div class="form-group">
    <input type="text" name="NIP" class="form-control" value="{{$tandatangan->NIP}}" placeholder="Masukkan NIP" />
   </div>
   <div class="form-group">
    <input type="text" name="jabatan" class="form-control" value="{{$tandatangan->jabatan}}" placeholder="Masukkan Jabatan" />
   </div>
   <div class="form-group">
    <input type="text" name="tempat_menjabat" class="form-control" value="{{$tandatangan->tempat_menjabat}}" placeholder="Tempat Menjabat" />
   </div>
   <div class="form-group">
    <input type="text" name="keterangan" class="form-control" value="{{$tandatangan->keterangan}}" placeholder="Keterangan" />
   </div>

   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>
</div>
@endsection