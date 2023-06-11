@extends('layout.master')
@section('title', 'Add Tahun')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/tahun">Tahun</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">Create</li>
@endsection
@section('judul', 'Create Tahun Anggaran')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-lg-9 col-6">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title" style="font-size: 14px;">Form Menambahkan Data Tahun Anggaran</h3>
            </div>
    
    <form action="/tahun" method="POST">
        @csrf
            <div class="card-body">
                <div class="container " style="font-size: 14px;">

                    {{-- TAHUN ANGGARAN --}}
                
                    <div class="row">
                        <div class="col-3 text-end">
                            <label class="mr-3 mt-2">Tahun Anggaran</label>
                        </div>
                        
                        <div class="col-9">
                            <input type="text" name="tahun" id="tahun" class="form-control" value="{{ old('tahun') }}" placeholder="YYYY">
                            
                            @error('tahun')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <script>
                        // Restrict input to only accept four-digit numeric values
                        document.getElementById('tahun').addEventListener('input', function(event) {
                            var input = event.target.value;
                            event.target.value = input.replace(/[^0-9]/g, '').slice(0, 4);
                        });
                    </script>
                    
                {{-- /TAHUN  ANGGARAN --}}
                <br>
                 {{-- Deskripsi --}}
                 <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Deskripsi </label>
                    </div>
                    
                    <div class="col-9">
                        <textarea style="font-size:14px" rows="4" cols="50" class="form-control" name="deskripsi">{{old('deskripsi')}}</textarea>
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
</div>
    

@endsection