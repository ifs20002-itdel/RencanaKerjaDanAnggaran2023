@extends('layout.master')
@section('title', 'Edit Jenis Penggunaan')

@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/jp">Mata Anggaran</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">{{$Jenispenggunaan->namaJenisPenggunaan}} / Edit</li>
@endsection

@section('content')
<h6>Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-9 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit Jenis Penggunaan</h3>
        </div>
                
        <form action="/jp/{{$Jenispenggunaan->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                
                <div class="form-group">
                    <label>Nama</label>
                    <textarea type="text" name="namaJenisPenggunaan" class="form-control" placeholder="Cth. Biaya Operasional Pendidikan">{{$Jenispenggunaan->namaJenisPenggunaan}}</textarea>
                
                    @error('namaJenisPenggunaan')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" onclick="return confirm('Lanjutkan Edit Data?')" class="btn btn-dark float-right ml-4">Update</button>
                <a href="/jp" class="btn btn-danger float-right mr-2 mr-4">Batalkan</a>
                
            </div>
            
        </form>
        
    </div>
</div>

@endsection