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
        @if($act=="viewMasterArtikel")
        <div class="col-md-12">
            <div class="box box-info">
                    <div class="box-header with-border">
                      {{-- <h3 class="box-title">Daftar Peserta</h3> --}}
                    <a href="{{ url('admin/tambahArtikel') }}" class="btn btn-info pull-left">Tambah Artikel</a>
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
                        <th style="width: 10%">ID Artikel</th>
                        <th style="width: 40%">Judul</th>
                        <th style="width: 30%">Penulis</th>
                        <th style="width: 20%">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                      {{-- @php
                        $i = 1;
                      @endphp --}}
  
                    @foreach ($art as $a)
                       <tr>
                        <td>{{ $a->artikel_id }}</td>
                        <td>{{ $a->artikel_judul }}</td>
                        <td>{{ $a->artikel_penulis }}</td>
                        <td>
                          <a href="{{ url('admin/detailArtikel',$a->artikel_id) }}" class="btn-sm btn-info ">Detail</a> &nbsp;
                          <a href="{{ url('admin/editArtikel',$a->artikel_id) }}" class="btn-sm btn-warning ">Edit</a> &nbsp;
                          <a href="{{ url('admin/deleteArtikel',$a->artikel_id) }}" class="btn-sm btn-danger ">Hapus</a>   
                        </td>
                      </tr>
  
                      {{-- @php
                        $i++;
                      @endphp --}}
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
          @endif

          @if($act=="viewDetailArtikel")
              <div class="col-md-12" style="margin-top: 40px;">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Artikel - <b>{{ $art->artikel_id }}</b></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ID Artikel</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="" value="{{$art->artikel_id }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Judul Artikel</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="" value="{{ $art->artikel_judul }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Penulis</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{ $art->artikel_penulis }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Abstrak</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="3" disabled>{{ $art->artikel_abstrak }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status Artikel</label>
                        <div class="col-sm-10">
                          <select name="artikel_status" class="form-control" disabled>
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
                    <a href="{{ url('admin/masterArtikel') }}" class="btn btn-default">Back</a>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
              <!-- /.box -->
            </div>
            @endif

            @if($act=="viewTambahArtikel")
                <div class="col-md-12" style="margin-top: 40px;">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah Artikel</b></h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('admin/prosesTambahArtikel') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">
                      <div class="form-group">
                          <label class="col-sm-2 control-label">ID Artikel</label>
                          <div class="col-sm-10">
                            <input type="text" name="artikel_id" class="form-control" id="" placeholder="ID Artikel">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Judul Artikel</label>
                          <div class="col-sm-10">
                            <input type="text" name="artikel_judul" class="form-control" id="" placeholder="Judul Artikel">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Penulis Artikel</label>
                          <div class="col-sm-10">
                            <input type="text" name="artikel_penulis" class="form-control" placeholder="Penulis Artikel">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Abstrak</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="artikel_abstrak" rows="3" placeholder="Abstrak"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Abstrak</label>
                          <div class="col-sm-10">
                              <select name="artikel_status" class="form-control">
                                <option selected value="unknown">Menunggu Konfirmasi (Pemakalah)</option>
                              </select>
                          </div>
                      </div>
                      {{-- @endforeach --}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
                <!-- /.box -->
              </div>
              @endif

              @if($act=="viewEditArtikel")
                  <div class="col-md-12" style="margin-top: 40px;">
                  <!-- Horizontal Form -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Edit Artikel</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('admin/prosesEditArtikel') }}" method="post">
                      {!! csrf_field() !!}
                      <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ID Artikel</label>
                            <div class="col-sm-10">
                              <input type="text" name="artikel_id" class="form-control" id="" value="{{ $art->artikel_id }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Judul Artikel</label>
                            <div class="col-sm-10">
                              <input type="text" name="artikel_judul" class="form-control" id="" value="{{ $art->artikel_judul }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Penulis Artikel</label>
                            <div class="col-sm-10">
                              <input type="text" name="artikel_penulis" class="form-control" value="{{ $art->artikel_penulis }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Abstrak</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="artikel_abstrak" rows="3">{{ $art->artikel_abstrak }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
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
                        <button type="submit" class="btn btn-primary pull-right">Edit</button>
                        <a href="{{ url('admin/masterArtikel') }}" class="btn btn-default pull-left">Kembali</a>
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