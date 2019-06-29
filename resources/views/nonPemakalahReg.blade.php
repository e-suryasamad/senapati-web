@extends('template.admin')

@section('title')
	Non-Pemakalah
@endsection

@section('judulmenu')
  Registrasi Non-Pemakalah
@endsection

@section('maincontent')
{{-- <section class="content"> --}}
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <div class="col-md-12" style="margin-top: 40px;">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Registrasi Non-Pemakalah</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('npmk/prosesReg') }}" method="post">
                {!! csrf_field() !!}
                <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="peserta_nama" placeholder="Nama Lengkap">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="" name="peserta_email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No. Telp/HP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="peserta_telp" placeholder="No. Telp/HP">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Pemilik Rekening</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="peserta_nama_rek" placeholder="Nama Pemilik Rekening">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Bank Pengirim</label>
                      <div class="col-sm-10">
                          <select class="form-control" name="peserta_bank">
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
                          <input type="file" name="peserta_bukti" id="exampleInputFile">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Pesan</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="peserta_pesan"placeholder="Opsional"></textarea>
                      </div>
                  </div>
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