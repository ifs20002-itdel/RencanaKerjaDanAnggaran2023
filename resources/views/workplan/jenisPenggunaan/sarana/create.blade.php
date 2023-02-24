@extends('layout.master')
@section('title', '6. Biaya Investasi Sarana')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/addJenisPenggunaan">Add Jenis Penggunaan</a></li>
@endsection
@section('breadcrumb2')
    <li class="breadcrumb-item">6. Biaya Investasi Sarana</li>
@endsection

@section('judul', '6. Biaya Investasi Sarana')

@section('content')
<h6>Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-7 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Menambahkan Jenis Penggunaan dan Mata Anggaran</h3>
        </div>
                
        <form action="/addJenisPenggunaan" method="POST">
            @csrf
            <div class="card-body">
                
                <input type="hidden" name="bagianTable" class="form-control" value="6">
                <div class="form-group">
                    <label>Mata Anggaran</label>
                    <input type="text" name="mataAnggaran" class="form-control" placeholder="Cth. II.7.1" value="{{old('mataAnggaran')}}">

                    @error('mataAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama Anggaran</label>
                    <input type="text" name="namaAnggaran" class="form-control" placeholder="Cth. Pengadaan Koleksi Perpustakaan (Buku)" value="{{old('namaAnggaran')}}">

                    @error('namaAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <a href="/addJenisPenggunaan" class="btn btn-danger float-right mr-2 ml-4">Batalkan</a>
                <button type="submit" class="btn btn-dark float-right mr-4">Tambahkan</button>
            </div>
            
        </form>
        
    </div>
</div>

@endsection