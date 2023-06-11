@extends('layout.master')
@section('title', 'Edit Satuan')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/satuan">Satuan</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">{{$satuan->nama}} &nbsp;/ &nbsp;Edit</li>
@endsection
@section('judul', 'Edit Satuan')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-lg-9 col-6">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title" style="font-size: 14px;">Form Edit Data Satuan</h3>
            </div>
    <form action="/satuan/{{$satuan->satuan_id}}" method="POST">
        @csrf
        @method('PUT')
            <div class="card-body">
                <div class="container " style="font-size: 14px;">

                    {{-- NAMA SATUAN --}}
                
                    <div class="row">
                        <div class="col-3 text-end">
                            <label class="mr-3 mt-2">Nama Satuan</label>
                        </div>
                        
                        <div class="col-9">
                            <input type="text" name="nama" class="form-control" value="{{$satuan->nama}}" placeholder="Cth. Paket, Bulan, Semester, Rim, dll.">
    
                            @error('nama')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                {{-- /NAMA SATUAN --}}
                <br>
                 {{-- Deskripsi --}}
                 <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Deskripsi </label>
                    </div>
                    
                    <div class="col-9">
                        <textarea style="font-size:14px" rows="4" cols="50" class="form-control" name="deskripsi">{{$satuan->deskripsi}}</textarea>
                    </div>
                    
                </div>
                {{-- /Deskripsi --}}

                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="/satuan" class="btn btn-danger float-right mr-2 ml-4" style="font-size: 13px; border-radius:20px;">Batalkan</a>
                <button type="submit" class="btn btn-dark float-right mr-4" style="font-size: 13px; border-radius:20px;">Tambahkan</button>
            </div>
    </form>
        </div>
    </div>
</div>
    

@endsection