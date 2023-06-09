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
<div class="card col-lg-9 col-6">
<br>
    <form action="/pengajuan" method="POST" oninput="multiplyNumbers()">
    @csrf
        <div class="card-body">

            {{-- CONTAINEr --}}
            <div class="container " style="font-size: 14px;">

                {{-- ROW1 --}}

                <div class="row">
                    <div class="col-3 text-end ">
                        <label class="mr-3">Pengusul</label>
                    </div>
                    
                    <div class="col-9">
                    
                    <input type="text" name="user_id" class="form-control" value="{{Auth::user()->pegawai->nama}} - {{ Auth::user()->pegawai->unit->first()->name }}">

                        @error('user_id')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                        
                    </div>
                </div>

                <br>
                
                <div class="row">
                    <div class="col-3 text-end ">
                        <label class="mr-3">Mata Anggaran</label>
                    </div>
                    
                    <div class="col-9">
                        <select class="form-control" name="mataanggaran_id">

                        <option value="" disabled selected>--- Pilih Jenis Penggunaan Anggaran ---</option>
                        

                        @forelse ($mataanggaran as $mata)
                            @foreach ($mata['unit'] as $item)
                                @if ($item == Auth::user()->pegawai->unit->first()->name)
                                    <option value="">{{ $mata['mataAnggaran'] }}. {{ $mata['namaAnggaran'] }}</option>
                                @endif
                            @endforeach
                        @empty
                           
                        @endforelse

                        
                        </select>
                        @error('mataanggaran_id')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                {{-- /ROW1 --}}
                <br>
                {{-- ROW2 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Nama </label>
                        <label class="mr-3">Program/Kegiatan</label>
                    </div>
                    
                    <div class="col-9">
                        
                        <input type="text" name="namaProgram" class="form-control" value="{{old('namaProgram')}}">

                        @error('penggunaan_id')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                {{-- /ROW2 --}}

        
                {{-- ROW3 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Tujuan </label>
                    </div>
                    
                    <div class="col-9">

                        <textarea style="font-size:14px" rows="4" cols="50" class="form-control" name="tujuan" value="{{old('tujuan')}}"></textarea>
                        
                    </div>
                </div>
                {{-- /ROW3 --}}
                <br>
                {{-- ROW3 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Deskripsi </label>
                    </div>
                    
                    <div class="col-9">
                        
                        <textarea style="font-size:14px" rows="4" cols="50" class="form-control" name="deskripsi" value="{{old('deskripsi')}}"></textarea>

                    </div>
                </div>
                {{-- /ROW3 --}}

                <br>
                {{-- ROW4 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Waktu Pelaksanaan</label>
                    </div>
                    
                    <div class="col-9">
                        @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $waktu)
                            <input  type="checkbox" name="{{ $waktu }}" id="{{ $waktu }}" value="{{ $waktu }}">
                            <label class="form-check-label mr-3 mb-1" for="{{ $waktu }}">{{ $waktu }}</label>
                        @endforeach
                    </div>
                    
                </div>
                {{-- /ROW4 --}}

                <br>
                {{-- ROW5 --}}
                <div class="row">
                    <div class="col-3 text-end">
                        <label class="mr-3">Volume </label>
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
                        <label class="mr-3">Satuan </label>
                    </div>
                    
                    <div class="col-9">

                        <div class="form-group">
                            <select class="form-control" name="satuan" style="font-size:14px">
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