@extends('layouts.app')

@section('content')

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
                <div align="right">
                    <a href="{{route('tandatangan.create')}}" class="btn btn-primary"> Add </a>
                    <br />
                </div>
                <table class="table table-bordered" style="background-color:white">
                    <tr>
                        <th>Nama lengkap</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Tempat Menjabat</th>
                        <th>Keterangan</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($tandatangans as $row)
                    <tr>
                        <td>{{$row['nama_lengkap']}}</td>
                        <td>{{$row['NIP']}}</td>
                        <td>{{$row['jabatan']}}</td>
                        <td>{{$row['tempat_menjabat']}}</td>
                        <td>{{$row['keterangan']}}</td>
                        <td><a href="{{action('TandaTanganController@edit', $row['id'])}}" class="btn btn-warning"> Edit</td>
                        <td><form method="post" class="delete_form" action="{{action('TandaTanganController@destroy', $row['id'])}}">
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
      if(confirm("Yakin anda ingin menghapus tanda tangan data?"))
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