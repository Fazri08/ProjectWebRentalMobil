@extends('templates.header')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
          Data Merk
          <small>Rental Mobil</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ url('merk') }}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Merk</li>
        </ol>
      </section>
    
      <!-- Main content -->
      <section class="content">

        @include('templates/feedback')

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <a href="{{ url('merk/add') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Merk</a>
          </div>
          <div class="box-body">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Merk</th>
                  <th>Action</th>
                </tr>
              </thead>
            <tbody>
              @foreach ($result as $row)
              <tr>
                  <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
                  <td>{{ $row->nama_merk }}</td>
                  <td>
                    <a href="{{ url("merk/$row->id_merk/edit") }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    {{-- <a href="merk/{{ $row->id_merk }}/delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
                    <form action="{{ url("merk/$row->id_merk/delete") }}" method="POST" style="display:inline;">
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
            Data Merk
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    
      </section>
@endsection