@extends('layout.master')
@section('title', 'B. Gaji Tenaga Kependidikan')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/addJenisPenggunaan">Add Jenis Penggunaan</a></li>
@endsection
@section('breadcrumb2')
    <li class="breadcrumb-item">B. Gaji Tenaga Kependidikan</li>
@endsection

@section('judul', 'B. Gaji Tenaga Kependidikan (Gaji Dan Honor)')

@section('content')
<h6 style="font-size: 13px;">Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-7 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 14px;">Form Menambahkan Jenis Penggunaan dan Mata Anggaran</h3>
        </div>
                
        <form action="/addJenisPenggunaan" method="POST">
            @csrf
            <div class="card-body">
                <input type="hidden" name="bagianTable" class="form-control" value="1B">
                <div class="form-group">
                    <label style="font-size: 14px;">Mata Anggaran</label>
                    <input type="text" name="mataAnggaran" class="form-control" placeholder="Cth. B. II.2.1" value="{{ old('mataAnggaran') }}">

                    @error('mataAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-size: 14px;">Nama Anggaran</label>
                    <input type="text" name="namaAnggaran" class="form-control" placeholder="Cth. Gaji Staff Pendukung Akademik Termasuk TA" value="{{ old('namaAnggaran') }}">

                    @error('namaAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <a href="/addJenisPenggunaan" class="btn btn-danger float-right mr-2 ml-4" style="font-size: 13px;">Batalkan</a>
                <button type="submit" class="btn btn-dark float-right mr-4" style="font-size: 13px;">Tambahkan</button>
            </div>
            
        </form>
        
    </div>
</div>

@endsection