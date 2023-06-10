@extends('layout.master')
@section('title', 'Add Satuan')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/satuan">Satuan</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">Create</li>
@endsection
@section('judul', 'Create Satuan')

@section('content')

<div class="d-flex justify-content-center">
    <div class="card col-lg-9 col-6">
    <br>
    <form action="/satuan" method="POST">
        @csrf
            <div class="card-body">
                <div class="container " style="font-size: 14px;">

                    {{-- NAMA SATUAN --}}
                
                    <div class="row">
                        <div class="col-3 text-end">
                            <label class="mr-3 mt-2">Nama Satuan</label>
                        </div>
                        
                        <div class="col-9">
                            <input type="text" name="nama" class="form-control" value="{{old('nama')}}" placeholder="Cth. Paket, Bulan, Semester, Rim, dll.">
    
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
                        <textarea style="font-size:14px" rows="4" cols="50" class="form-control" name="deskripsi" value="{{old('deskripsi')}}"></textarea>
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
    

@endsection