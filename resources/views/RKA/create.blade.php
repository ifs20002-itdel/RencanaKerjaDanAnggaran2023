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
                        <label class="mr-3">Mata Anggaran</label>
                    </div>
                    
                    <div class="col-9">
                        <select class="form-control" name="mataanggaran_id">
{{-- 

                            @if (session('pegawai')['data']['pegawai'] ?? false)
                            @foreach (session('pegawai')['data']['pegawai'] as $dataPegawai)
                                @if ($dataPegawai['user_id'] == session('user')['user_id'])
                                    @if (session('unit')['data']['unit'] ?? false)
                                        @foreach (session('unit')['data']['unit'] as $unitNya)
                                            @if ($dataPegawai['pegawai_id'] == $unitNya['pegawai_id'])
                                                <!-- Your code here -->
                        
                                                @foreach ($mataanggaran as $mata)
                                                    @foreach ($mata['workgroup_id'] as $unitValue)
                        
                                                        @forelse ($workgroupData as $id => $data)
                                                            @if ($data['id'] == $unitValue)
                        
                                                                @foreach ($data['unit'] as $unitTerbaru)
                        
                                                                    @if ($unitTerbaru == $unitNya['name'])
                                                                        {{$mata->mataAnggaran}}
                                                                    @endif
                        
                                                                @endforeach
                        
                                                            @endif
                                                        @empty
                                                        @endforelse
                        
                                                    @endforeach
                                                @endforeach
                        
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        @endif --}}
                        
                        

                       
                           
                        
                        <option value="" disabled selected>--- Pilih Jenis Penggunaan Anggaran ---</option>
                        
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
                        
                        <input type="text" name="waktu" class="form-control" value="{{old('waktu')}}">

                        @error('waktu')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
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
                        
                        <input type="text" name="volume" class="form-control" value="{{old('volume')}}">

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
                        
                        <input type="text" name="satuan" class="form-control" value="{{old('satuan')}}">

                        @error('satuan')
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                        @enderror
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


            </div>
            {{-- /CONTAINER --}}

        </div>

    </form>
</div>
</div>
  

@endsection