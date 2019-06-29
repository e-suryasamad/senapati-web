@extends('template.admin')

@section('title')
  Admin
@endsection

@section('judulmenu')
  Detail Peserta Non-Pemakalah
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
      @if($act=="viewDetailNonPemakalah")
        <div class="col-md-12" style="margin-top: 40px;">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Form Konfirmasi Pembayaran</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('admin/prosesKonfirmNoPmk') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                          {{-- @foreach ($pmk as $pmk) --}}
                          {{-- {{$artikel_id = $pmk->artikel_id}}; --}}
                          <input type="text" name="peserta_id" class="form-control" id="" value={{ $no_pmk->peserta_id }} readonly>
                          {{-- @endforeach --}}
                        </div>
                      </div>
                      {{-- @foreach($no_pmk as $p) --}}
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Peserta</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="{{ $no_pmk->peserta_nama }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="{{ $no_pmk->peserta_email }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Telepon</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $no_pmk->peserta_telp }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Bank</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="" value="{{ $no_pmk->peserta_bank }}" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Pemilik Rekening</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="{{ $no_pmk->peserta_nama_rek }}" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Bukti</label>
                          <div class="col-sm-10">
                              <input type="hidden" id="exampleInputFile" required>
                              <img src="{{ asset($no_pmk->peserta_bukti) }}" alt="Bukti.jpg" style="max-width:300px"/>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Pesan</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" readonly>{{ $no_pmk->peserta_pesan }}</textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-2 control-label">Status Artikel</label>
                          <div class="col-sm-10">
                            <select name="peserta_bukti" class="form-control">
                              <option selected value="{{ $no_pmk->peserta_bukti }}">
                              @php
                                if ($no_pmk->peserta_bukti=="tidak_upload"){
                                  echo "Tidak valid";
                                }else{
                                  echo "Pending";
                                }
                              @endphp
                              </option>
                              @if ($no_pmk->peserta_bukti!="pending"){
                                <option value="non_valid">Tidak Valid</option>
                                <option value="valid">Valid</option>
                                <option value="pending">Menunggu Validasi</option>
                              }
                              @endif
                            </select>
                          </div>
                      </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <a href="{{ url('admin/daftarPemakalah') }}"><button type="button" class="btn btn-primary">Back</button></a>
                      <button type="submit" class="btn btn-primary">Konfirmasi</button>
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