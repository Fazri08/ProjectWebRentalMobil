@extends('templates.header')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Mobil
      <small>Rental Mobil</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Mobil</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    @include('templates.feedback')
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <a href="{{ url('mobil/add') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Mobil</a>
      </div>
      <div class="box-body">
        <table class="table table-stripped">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Nama Mobil</th>
              <th>Merk</th>
              <th>Tahun</th>
              <th>kapasitas</th>
              <th>Transmition</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
        <tbody>
          @foreach ($result as $row)
          <tr>
              <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
              <td>
                <img src="{{ asset("storage/".$row->foto) }}" width="50" height="50" alt="N/A">
              </td>
              <td>{{ $row->nama_mobil }}</td>
              <td>{{ $row->merk->nama_merk }}</td>
              <td>{{ $row->tahun }}</td>
              <td>{{ $row->kapasitas }}</td>
              <td>{{ $row->transmition }}</td>
              <td>{{ $row->harga }}</td>

              <td>
                <a href="{{ url("mobil/$row->id_mobil/edit") }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                {{-- <a href="merk/{{ $row->id_merk }}/delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
                <form action="{{ url("mobil/$row->id_mobil/delete") }}" method="POST" style="display:inline;">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>

      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        Data Mobil
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
@endsection
