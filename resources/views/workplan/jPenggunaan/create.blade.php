@extends('layout.master')
@section('title', 'Add Jenis Penggunaan')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/jp">Mata Anggaran</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">Tambah Jenis Penggunaan</li>
@endsection

@section('content')
<h6 style="font-size: 13px;">Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-9 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 14px;">Tambah Jenis Penggunaan</h3>
        </div>
                
        <form action="/jp" method="POST">
            @csrf
            <div class="card-body">
                
                <div class="form-group">
                    <label style="font-size: 14px;">Nama</label>
                    <textarea style="font-size:14px" type="text" name="namaJenisPenggunaan" style="font-size: 14px;" class="form-control" placeholder="Cth. Biaya Operasional Pendidikan">{{old('namaJenisPenggunaan')}}</textarea>
                
                    @error('namaJenisPenggunaan')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-dark float-right ml-4" style="font-size: 14px;">Tambahkan</button>
                <a href="/jp" class="btn btn-danger float-right mr-4 ml-4" style="font-size: 14px;">Batalkan</a>
                
            </div>
            
        </form>
        
    </div>
</div>

@endsection