@extends('layout.layout')
@section('title','Data Perusahaan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h3 text">Data Perusahaan</span>
                    </div>
                    <div class="card-body">
                        Nama Perusahaan : {{$perusahaan->nama_perusahaan}}
                        <br>
                        Alamat          : {{$perusahaan->alamat}}
                    </div>
                    <div class="card-footer">
                        <a href="{{url('/dashboard')}}/perusahaan/edit"><btn class="btn btn-primary">EDIT</btn></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection