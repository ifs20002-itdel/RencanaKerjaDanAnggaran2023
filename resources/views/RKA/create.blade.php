@extends('layout.master')
@section('title', 'Add Program')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="#">Program</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">Create</li>
@endsection
@section('judul', 'Create Program')

@section('content')

<div class="d-flex justify-content-center">
<div class="card col-lg-11 col-6">
<br>
    <form action="/pengajuan" method="POST" oninput="multiplyNumbers()">
    @csrf
        <div class="card-body">

            {{-- CONTAINER --}}
            <div class="container " style="font-size: 14px;">

                {{-- Mata Anggaran --}}
                
                <div class="row">
                    <div class="col-3 text-end ">
                        <label for="mataanggaran_id" class="mr-3 mt-2">Mata Anggaran</label>
                    </div>
                    
                    <div class="col-9">
                        <select class="form-control" name="mataanggaran_id" id="mataanggaran_id">
                            <option value="" disabled selected>--- Mata Anggaran ---</option>
                            @forelse ($mataanggaran as $mata)
                                @foreach ($mata['unit'] as $item)
                                    @if ($item == Auth::user()->pegawai->unit->first()->name)
                                        <option id="{{$mata['id']}}" value="{{$mata['id']}}">{{Auth::user()->pegawai->pejabat->first()->jabatan}} - {{ $mata['mataAnggaran'] }}. {{ $mata['namaAnggaran'] }}</option>
                                    @endif
                                @endforeach
                            @empty
                            <option value="" disabled selected>Tidak ada mata anggaran</option>
                            @endforelse

                        </select>
                        @error('mataanggaran_id')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                {{-- /MataAnggaran --}}

                <br>

                {{-- Nama Program/Kegiatan --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3 mt-2">Nama Program/Kegiatan</label>
                    </div>
                    
                    <div class="col-9">
                        
                        <input type="text" name="namaprogram" class="form-control" value="{{old('namaprogram')}}">

                        @error('namaprogram')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                {{-- /ama Program/Kegiatan --}}

                <br>
        
                {{-- Tujuan --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Tujuan </label>
                    </div>
                    
                    <div class="col-9">

                        <textarea style="font-size:14px" rows="4" cols="50" class="form-control" name="tujuan" value="{{old('tujuan')}}"></textarea>
                        
                    </div>
                    
                </div>
                {{-- /Tujuan --}}

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

                <br>

                {{-- Waktu Pelaksanaan --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3 mt-2">Waktu Pelaksanaan</label>
                    </div>
                    
                    <div class="col-9">
                        @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $waktu)
                            <input  type="checkbox" name="{{ $waktu }}" id="{{ $waktu }}" value="{{ $waktu }}">
                            <label class="form-check-label mr-2 mb-2" for="{{ $waktu }}">{{ $waktu }}</label>
                        @endforeach
                    </div>
                    
                </div>
                {{-- /Waktu Pelaksanaan --}}

                <br>

                {{-- ROW5 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3 mt-2">Volume </label>
                    </div>
                    
                    <div class="col-9">
                        <input type="number" name="volume" class="form-control" value="{{ old('volume') }}" min="0">
                        @error('volume')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                {{-- /ROW5 --}}
                <br>
                {{-- ROW5 --}}

                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3 mt-2">Satuan </label>
                    </div>
                    
                    <div class="col-6">

                        <div class="form-group">
                            <select class="form-control" name="satuan">
                              <option value="" disabled selected>--- Satuan ---</option>
                              {{-- @foreach ($satuan as $item)
                                    <option value="{{$item->id}}">{{$byk +=1}}. {{$item->namaJenisPenggunaan}}</option>
                              @endforeach --}}
                            </select> 
                            @error('jenispenggunaan_id')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <a href="/satuan/create" class="btn btn-light btn-sm mb-3 mt-1 text-left" style="font-size: 13.5px;">
                                <i class="fa-regular fa-plus mr-2"></i>Tambah Satuan    
                        </a>
                    </div>
                    
                </div>
                {{-- /ROW5 --}}
                <br>
                {{-- ROW6 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Harga Satuan </label>
                    </div>
                    
                    <div class="col-9">
                        
                        <input type="text" name="hargaSatuan" class="form-control" value="{{old('hargaSatuan')}}">

                        @error('hargaSatuan')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                {{-- /ROW6 --}}
                <br>
                {{-- ROW7 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Total </label>
                    </div>
                    
                    <div class="col-9">
                        
                        <input type="text" name="hargaTotal" class="form-control" value="{{old('hargaTotal')}}">

                        @error('hargaTotal')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <br>
                {{-- /ROW7 --}}

                <button type="submit" class="btn btn-success float-right ml-4" style="font-size:14px">Create</button>

            </div>
            {{-- /CONTAINER --}}

        </div>
        

    </form>
</div>
</div>
  

@endsection