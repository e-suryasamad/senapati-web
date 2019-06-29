@extends('template.admin')

@section('title')
	Pemakalah
@endsection

@section('judulmenu')
  Konfirmasi Pembayaran
@endsection

@section('maincontent')
{{-- <section class="content"> --}}
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <div class="col-md-12" style="margin-top: 40px;">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Konfirmasi Pembayaran</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('pmk/prosesKonfirmasi') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID Artikel</label>
                    <div class="col-sm-10">
                      {{-- @foreach ($pmk as $pmk) --}}
                      {{-- {{$artikel_id = $pmk->artikel_id}}; --}}
                      <input type="text" name="artikel_id" class="form-control" id="" value={{$pmk->artikel_id}} readonly>
                      {{-- @endforeach --}}
                    </div>
                  </div>
                  @foreach($art as $art)
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Judul Artikel</label>
                      <div class="col-sm-10">
                        <input type="text" name="artikel_judul" class="form-control" id="" value="{{$art->artikel_judul}}" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Penulis Artikel</label>
                      <div class="col-sm-10">
                        <input type="text" name="artikel_penulis" class="form-control" required>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="pemakalah_email" class="form-control" id="" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No. Telp/HP</label>
                      <div class="col-sm-10">
                        <input type="text" name="pemakalah_telp" class="form-control" id="" placeholder="No. Telp/HP" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Pemilik Rekening</label>
                      <div class="col-sm-10">
                        <input type="text" name="pemakalah_nama_rek" class="form-control" id="" placeholder="Nama Pemilik Rekening" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Bank Pengirim</label>
                      <div class="col-sm-10">
                          <select class="form-control" name="pemakalah_bank" required>
                            <option value="">Pilih Bank</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Unggah Bukti</label>
                      <div class="col-sm-10">
                          <input type="file" name="pemakalah_bukti" id="exampleInputFile" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Pesan</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="pemakalah_pesan" rows="3" placeholder="Opsional"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Status Artikel</label>
                      <div class="col-sm-10">
                        <input type="text" name="artikel_status" class="form-control" id="" value="{{$art->artikel_status}}" readonly>
                      </div>
                  </div>
                  @endforeach
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box -->
          </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->

    {{-- </section> --}}
    @endsection