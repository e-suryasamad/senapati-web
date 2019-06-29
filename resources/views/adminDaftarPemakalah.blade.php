@extends('template.admin')

@section('title')
	Admin
@endsection

@section('judulmenu')
  Master Artikel
@endsection

@section('maincontent')
{{-- <section class="content"> --}}
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12" style="padding-right: 0px">
        <a href="{{ url('/admin/masterArtikel') }}"><div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><h2>Master Artikel</h2></span>
              {{-- <span class="info-box-number">90<small>%</small></span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-12 col-xs-12" style="padding-right: 0px, padding-left: 0px">
        <a href="{{ url('/admin/daftarPemakalah') }}"><div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><h2>Daftar Pemakalah</h2></span>
              {{-- <span class="info-box-number">41,410</span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-12 col-xs-12" style="padding-left: 0px">
        <a href="{{ url('/admin/daftarNonPemakalah') }}"><div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><h2>Daftar Non-Pemakalah</h2></span>
              {{-- <span class="info-box-number">760</span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        @if($act=="viewDaftarPemakalah")
        <div class="col-md-12">
            <div class="box box-info">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                      <div class="box-body">
                        <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 10%">Tanggal</th>
                      <th style="width: 10%">ID Artikel</th>
                      <th style="width: 40%">Judul</th>
                      <th style="width: 30%">Status</th>
                      <th style="width: 10%">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($art as $a)
                      <tr>
                        <td>{{ $a->pemakalah_tanggal }}</td>
                        <td>{{ $a->artikel_id }}</td>
                        <td>{{ $a->artikel_judul }}</td>
                        <td>{{ $a->artikel_status }}</td>
                        <td>
                          <a href="{{ url('admin/detailPemakalah',$a->artikel_id) }}" class="btn-sm btn-info ">Detail</a>
                        </td>
                      </tr>
                    @endforeach
                      <!-- /.box-body -->
                     </tbody>
                  </table>
                      </div>
                    </div>
                    </form>
                  </div>
            </div>
            @endif

            @if($act=="viewDetailPemakalah")
                <div class="col-md-12" style="margin-top: 40px;">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Detail Pemakalah - <b>{{ $pmk->pemakalah_id }}</b></h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('admin/validasiPemakalah') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">ID Pemakalah</label>
                        <div class="col-sm-10">
                          {{-- @foreach ($pmk as $pmk) --}}
                          {{-- {{$artikel_id = $pmk->artikel_id}}; --}}
                          <input type="text" name="artikel_id" class="form-control" id="" value={{ $pmk->pemakalah_id }} readonly>
                          {{-- @endforeach --}}
                        </div>
                      </div>
                      {{-- @foreach($pmk as $p) --}}
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Pemakalah</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="{{ $pmk->pemakalah_nama }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">ID Artikel</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="{{ $art->artikel_id }}" readonly>
                            <input type="hidden" name="artikel_id" value="{{ $art->artikel_id }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Judul Artikel</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="{{ $art->artikel_judul }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Telepon</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $pmk->pemakalah_telp }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="" value="{{ $pmk->pemakalah_email }}" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Pemilik Rekening</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="{{ $pmk->pemakalah_nama_rek }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Bank Pengirim</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="" value="{{ $pmk->pemakalah_bank }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Bukti</label>
                          <div class="col-sm-10">
                              <input type="hidden" id="exampleInputFile" required>
                              <img src="{{ asset($pmk->pemakalah_bukti) }}" alt="Bukti.jpg" style="max-width:300px"/>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Pesan</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" readonly>{{ $pmk->pemakalah_pesan }}</textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Status Artikel</label>
                          <div class="col-sm-10">
                            <select name="artikel_status" class="form-control">
                              <option selected value="{{ $art->artikel_status }}">
                              @php
                               if ($art->artikel_status=="valid"){
                                 echo "Valid";
                               }elseif ($art->artikel_status=="non_valid") {
                                 echo "Tidak Valid";
                               }elseif ($art->artikel_status=="pending"){
                                 echo "Menunggu Validasi";
                               }else {
                                 echo "Menunggu Konfirmasi (Pemakalah)";
                               }
                              @endphp
                              </option>
                              @if ($art->artikel_status!="valid"){
                                <option value="non_valid">Tidak Valid</option>
                                <option value="valid">Valid</option>
                                <option value="pending">Menunggu Validasi</option>
                              }
                              @endif
                            </select>
                          </div>
                      </div>
                      {{-- @endforeach --}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <a href="{{ url('admin/daftarPemakalah') }}" class="btn btn-default pull-left">Back</a>&nbsp;
                      <button type="submit" class="btn btn-primary pull-right">Validasi</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
                <!-- /.box -->
              </div>
              @endif
      </div>
    {{-- </section> --}}
    @endsection