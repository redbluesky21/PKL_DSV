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
  
  <form method="post" action="{{action('SertifikatController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

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
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>
</div>
@endsection