@extends('template.admin')

@section('title')
	Pemakalah
@endsection

@section('judulmenu')
  Cari Berdasarkan ID Artikel
@endsection

@section('maincontent')
{{-- <section class="content"> --}}
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <form class="navbar-form navbar" align="center" action="{{ url()->current() }}" method="GET">
          {{ csrf_field() }}
            <div class="form-group">
              <input type="text" name="cari" class="form-control" id="navbar-search-input" style="margin-bottom: 8px; width: 500px;" placeholder="ID Artikel" value="{{ request('cari') }}">
                <span class="input-group-btn">
                  <button type="submit" id="search-btn" class="btn btn-flat" style="padding: 10px 40px;">Cari</button>
                </span>
            </div>
        </form>
            <div class="col-md-12" style="margin-top: 40px;">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Hasil Pencarian</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              {{-- @if(count($search)) --}}
            @foreach($artikels as $artikel)
            <form class="form-horizontal">
                {!! csrf_field() !!}
                  {{-- <div class="card-panel green white-text">Hasil pencarian : <b>{{ $search }}</b></div> --}}
                <div>
                  <div class="box-body">
                  {{-- @foreach($artikels as $artikel) --}}
                    @if(request('cari') == $artikel->artikel_id)
                    <div class="form-group">
                      <label class="col-sm-2 control-label">ID Artikel</label>
                        <div class="col-sm-10">
                          <input type="text" name="artikel_id" class="form-control" id="" value="{{ $artikel->artikel_id }}" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Judul Artikel</label>
                        <div class="col-sm-10">
                          <input type="text" name="judul_artikel" class="form-control" id="" value="{{ $artikel->artikel_judul }}" placeholder="Judul Artikel" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status Artikel</label>
                        <div class="col-sm-10">
                          <input type="text" name="status_artikel" class="form-control" id="" value="{{ $artikel->artikel_status }}" placeholder="Status Artikel" readonly>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <a href="{{ url('/pmk/konfirmasi',$artikel->artikel_id) }}" class="btn btn-info pull-right">Konfirmasi Pembayaran</a>
                </div>
                @else
                  {{$val=false}}
                @endif
              </form>
              @endforeach
              {{-- @else
                <div class="card-panel red darken-3 white-text">Oops.. Data <b>{{ $search }}</b> Tidak Ditemukan</div>
              @endif --}}
            </div>
            <!-- /.box -->
          </div>
      </div>
    @endsection