@extends('layout.master')

@section('title')
    {{$JenisPenggunaan->mataAnggaran}}
@endsection

@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/addJenisPenggunaan">Add Jenis Penggunaan</a></li>
@endsection
@section('breadcrumb2')
    <li class="breadcrumb-item">{{$JenisPenggunaan->mataAnggaran}} / Edit</li>
@endsection

@section('judul')
Halaman Edit Data: &nbsp; {{$JenisPenggunaan->mataAnggaran}} - {{$JenisPenggunaan->namaAnggaran}}
@endsection

@section('content')
<h6 style="font-size: 13px;">Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-7 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 14px;">Form Update Jenis Penggunaan dan Mata Anggaran</h3>
        </div>
                
        <form action="/addJenisPenggunaan/{{$JenisPenggunaan->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <input type="hidden" name="bagianTable" class="form-control" value="6">
                <div class="form-group">
                    <label style="font-size: 14px;">Mata Anggaran</label>
                    <input type="text" name="mataAnggaran" class="form-control" value="{{$JenisPenggunaan->mataAnggaran}}">

                    @error('mataAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-size: 14px;">Nama Anggaran</label>
                    <input type="text" name="namaAnggaran" class="form-control" value="{{$JenisPenggunaan->namaAnggaran}}">

                    @error('namaAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <a href="/addJenisPenggunaan" class="btn btn-danger float-right mr-2 ml-4" style="font-size: 13px;">Batalkan</a>
                <button type="submit" class="btn btn-success float-right mr-4" style="font-size: 14px;">Update</button>
            </div>
            
        </form>
        
    </div>
</div>

@endsection