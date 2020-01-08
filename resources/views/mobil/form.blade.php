@extends('templates.header')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ empty($result) ? 'Tambah' : 'Edit' }} Data Mobil
      <small>Rental Mobil</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('mobil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Data Mobil</li>
      <li class="active">{{ empty($result) ? 'Tambah' : 'Edit' }} Data Mobil</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    @include('templates.feedback')

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <a href="{{ url('mobil') }}" class="btn bg-purple"><i class="fa fa-chevron-left"></i> Kembali</a>
      </div>
      <div class="box-body">
        <form action="{{ empty($result) ? url('mobil/add') : url("mobil/$result->id_mobil/edit") }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            @if (!empty($result))
                {{ method_field('patch') }}
            @endif
            <div class="form-group">
                <label class="control-label col-sm-2">ID</label>
                <div class="col-sm-10">
                    <input type="text" name="id_mobil" class="btn-block form_control" placeholder="Masukan ID" value="{{ @$result->id_mobil }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Nama Mobil</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_mobil" class="btn-block form_control" placeholder="Masukan Nama Mobil" value="{{ @$result->nama_mobil }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Tahun</label>
                <div class="col-sm-10">
                    <input type="text" name="tahun" class="btn-block form_control" placeholder="Masukan Tahun" value="{{ @$result->tahun }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Kapasitas</label>
                <div class="col-sm-10">
                    <input type="text" name="kapasitas" class="btn-block form_control" placeholder="Masukan Kapasitas" value="{{ @$result->kapasitas }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Transmition</label>
                <div class="col-sm-10">
                    <input type="text" name="transmition" class="btn-block form_control" placeholder="Masukan Transmiton" value="{{ @$result->transmition }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Harga</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" class="btn-block form_control" placeholder="Masukan Harga" value="{{ @$result->harga }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Merk</label>
                <div class="col-sm-10">
                    <select id="id_merk" name="id_merk"lass="form-controller">
                        @foreach (\App\Merk::all() as $merk)
                            <option value="{{ $merk->id_merk }}" {{ @$result->id_merk == $merk->id_merk ? 'selected' : ''}}>{{ $merk->nama_merk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" value="{{ @$result->foto }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>

        </form>

      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
@endsection
