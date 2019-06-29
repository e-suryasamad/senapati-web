@extends('template.admin')

@section('title')
	Beranda
@endsection

@section('judulmenu')
	Beranda
@endsection

@section('maincontent')
{{-- <section class="content"> --}}
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <a href="{{ url('/pmk') }}">
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Pemakalah</h3>

              <p>Konfirmasi Pembayaran Pemakalah</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        </a>
        <!-- ./col -->
      <a href="{{ url('/npmk') }}">
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Non-Pemakalah</h3>

              <p>Registrasi Peserta Non-Pemakalah</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        </a>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->

    {{-- </section> --}}
    @endsection