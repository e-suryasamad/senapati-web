@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Hello {{ Auth::user()->name }}</br>
                    Email Anda : {{ Auth::user()->email }}</br>
                    Anda login dengan menggunakan : {{ Auth::user()->username }}</br>
                    Password : {{ Auth::user()->password }}</br>
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
