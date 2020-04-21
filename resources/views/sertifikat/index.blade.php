@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <br />
                <h3 align="center"> Sertifikat </h3>
                <br />
                @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
                @endif
                <div align="right">
                    <a href="{{route('sertifikat.create')}}" class="btn btn-primary"> Add </a>
                    <br />
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Nama sertifikat</th>
                        <th>Tanda Tangan 1</th>
                        <th>Tanda Tangan 2</th>
                        <th>Tanda Tangan 3</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($sertifikats as $row)
                    <tr>
                        <td>{{$row['nama_sertifikat']}}</td>
                        <td>{{$row['tandatangan1']}}</td>
                        <td>{{$row['tandatangan2']}}</td>
                        <td>{{$row['tandatangan3']}}</td>
                        
                        <td><a href="{{action('SertifikatController@edit', $row['id'])}}" class="btn btn-warning"> Edit</td>
                        <td><form method="post" class="delete_form" action="{{action('SertifikatController@destroy', $row['id'])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">Delete</button>
                           </form></td>
                    </tr>
                    @endforeach
                </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
     $('.delete_form').on('submit', function(){
      if(confirm("Yakin anda ingin sertifikat tangan data?"))
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

@endsection