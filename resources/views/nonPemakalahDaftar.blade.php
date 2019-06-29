@extends('template.admin')

@section('title')
	Non-Pemakalah
@endsection


@section('judulmenu')
	Daftar Peserta Senapati (Non-Pemakalah)
@endsection


{{-- @php

  function viewMessage($msg){
    $pesan = "";

    if($msg==1)
    {
      $pesan = "Proses tambah data berhasil dilakukan!";
    }elseif($msg==2){
      $pesan = "Error! Proses tambah data gagal dilakukan!";
    }elseif($msg==3){
      $pesan = "Proses edit data berhasil dilakukan!";
    }elseif($msg==4){
      $pesan = "Error! Proses edit data gagal dilakukan!";
    }elseif($msg==5){
      $pesan = "Proses hapus data berhasil dilakukan!";
    }elseif($msg==6){
      $pesan = "Error! Proses hapus data gagal dilakukan!";
    }

    $view = "
      <div class=\"alert alert-info alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4><i class=\"icon fa fa-info\"></i> Informasi!</h4>
                <strong>".$pesan."</strong>
              </div>

    ";

    return $view;
  }
  
@endphp --}}

@section('maincontent')
  <div class="row">
  	<div class="col-md-12">
            <div class="box box-info">
                    <div class="box-header with-border">
                      {{-- <h3 class="box-title">Daftar Peserta</h3> --}}
                    <a href="{{ url('npmk/reg') }}" class="btn btn-info pull-left">Daftar</a>
                    {{-- <div class="form-group">
                      <input type="text" class="form-control pull-right" id="navbar-search-input" style="margin-bottom: 8px; width: 500px;" placeholder="Cari">
                    </div> --}}
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                      <div class="box-body">
                        <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%">ID Artikel</th>
                        <th style="width: 35%">Email</th>
                        <th style="width: 35%">Nama Lengkap</th>
                        <th>Status Bukti Pembayaran</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp
  
                    @foreach ($no_pmk as $np)
                       <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $np->peserta_email }}</td>
                        <td>{{ $np->peserta_nama }}</td>
                        <td>
                          @php
                          if ($np->peserta_bukti=="tidak_upload"){
                            echo "TIdak valid";
                          }else{
                            echo "Pending";
                          }
                          @endphp
                        </td>
                      </tr>
  
                      @php
                        $i++;
                      @endphp
                    @endforeach
                    
                      <!-- /.box-body -->
                     </tbody>
                    {{-- <tfoot>
                    <tr>
                      <th>Kode Jurusan</th>
                      <th>Nama Jurusan</th>
                    </tr>
                    </tfoot> --}}
                  </table>
                      </div>
                    </div>
                    </form>
                  </div>
      </div>
  </div>

@endsection