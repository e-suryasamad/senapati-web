@extends('template.admin')

@section('title')
	Admin
@endsection

@section('judulmenu')
  Daftar Peserta Non-Pemakalah
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
        <div class="col-md-12">
            <div class="box box-info">
                    
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                      <div class="box-body">
                        <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th style="width: 30%">Email</th>
                      <th style="width: 40%">Nama Lengkap</th>
                      <th style="width: 10%">Status</th>
                      <th style="width: 10%">Opsi</th>
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
                        <td>
                          <a href="{{ url('admin/detailNonPemakalah',$np->peserta_id) }}" class="btn-sm btn-warning ">Lihat detail</a> 
                        </td>

                        @php
                          $i++;
                        @endphp
                      </tr>
  
                     
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

    {{-- </section> --}}
    @endsection