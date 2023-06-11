@extends('layout.master')
@section('title', 'Edit Tahun')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/tahun">Tahun Anggaran</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">{{$tahun->tahun}} &nbsp;/ &nbsp;Edit</li>
@endsection
@section('judul', 'Edit Tahun')

@section('content')

<div class="d-flex justify-content-center">
    <div class="card col-lg-9 col-6">
    <br>
    <form action="/tahun/{{$tahun->tahun_id}}" method="POST">
        @csrf
        @method('PUT')
            <div class="card-body">
                <div class="container " style="font-size: 14px;">

                    {{-- TAHUN ANGGARAN --}}
                
                    <div class="row">
                        <div class="col-3 text-end">
                            <label class="mr-3 mt-2">Tahun Anggaran</label>
                        </div>
                        
                        <div class="col-9">
                            <input type="text" name="tahun" class="form-control" value="{{$tahun->tahun}}" placeholder="YYYY">
    
                            @error('tahun')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                {{-- /TAHUN ANGGARAN --}}
                <br>
                 {{-- Deskripsi --}}
                 <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Deskripsi </label>
                    </div>
                    
                    <div class="col-9">
                        <textarea style="font-size:14px" rows="4" cols="50" class="form-control" name="deskripsi">{{$tahun->deskripsi}}</textarea>
                    </div>
                    
                </div>
                {{-- /Deskripsi --}}

                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="/tahun" class="btn btn-danger float-right mr-2 ml-4" style="font-size: 13px; border-radius:20px;">Batalkan</a>
                <button type="submit" class="btn btn-dark float-right mr-4" style="font-size: 13px; border-radius:20px;">Tambahkan</button>
            </div>
    </form>
    </div>
</div>
    

@endsection