@extends('layout.master')
@section('title', 'Jenis Penggunaan')
@section('breadcrumb1')
    <li class="breadcrumb-item">Jenis Penggunaan</li>
@endsection

@section('content')
<h6>Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-7 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Tambah Jenis Penggunaan</h3>
        </div>
                
        <form action="/jp" method="POST">
            @csrf
            <div class="card-body">
                
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="namaJenisPenggunaan" class="form-control" placeholder="Biaya Operasional Pendidikan" value="{{old('namaJenisPenggunaan')}}">
                    <br>
                    @error('namaJenisPenggunaan')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>


            </div>

            <div class="card-footer">
                <a href="/jp" class="btn btn-danger float-right mr-2 ml-4">Batalkan</a>
                <button type="submit" class="btn btn-dark float-right mr-4">Tambahkan</button>
            </div>
            
        </form>
        
    </div>
</div>

@endsection