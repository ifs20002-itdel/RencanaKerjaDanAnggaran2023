@extends('layout.master')

@section('title')
    {{$Pengajuan->penggunaan->mataAnggaran}}
@endsection

@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/pengajuan">Pengajuan</a></li>
@endsection
@section('breadcrumb2')
    <li class="breadcrumb-item">{{$Pengajuan->penggunaan->mataAnggaran}} / Edit</li>
@endsection

@section('judul')
Halaman Edit Data
@endsection

@section('content')
<hr>
<br>
<div class="col-lg-7 col-6 mx-auto">
    <div class="card card-dark">
        <div class="card card-header text-center">
            <h3 class="card-title" style="font-size: 14px;">Edit Rencana Kerja dan Anggaran</h3>
        </div>
                
        <form action="/pengajuan/{{$Pengajuan->id}}" method="POST" oninput="multiplyNumbers()">
            @csrf
            @method('put')
            <div class="card-body">

                <input type="hidden" name="jenis" class="form-control" value="1A">
                <input type="hidden" name="status" class="form-control" value="In Progress">
                <input type="hidden" name="pemohon" class="form-control" value="{{Auth::user()->nama}}">

                <div class="form-group">
                    <label>Jenis Penggunaan Anggaran</label>
                    <select class="form-control" name="penggunaan_id">
                      <option value="" disabled selected>--- Pilih Jenis Penggunaan Anggaran ---</option>
                      @foreach ($Penggunaan as $item)
                        @if($item->bagianTable == "1A")

                            @if ($item->id === $Pengajuan->penggunaan_id)
                            <option value="{{$item->id}}" selected>{{$item->mataAnggaran}} - {{$item->namaAnggaran}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->mataAnggaran}} - {{$item->namaAnggaran}}</option>
                            @endif

                        @endif
                      @endforeach
                    </select>
                    @error('penggunaan_id')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Rincian Program/Aktivitas</label>
                    <textarea style="font-size:14px" class="form-control" name="rincianProgram">{{$Pengajuan->rincianProgram}}</textarea>

                    @error('rincianProgram')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" class="form-control" placeholder="Cth. Paper, Orang, Paket, Kegiatan, Dll." value="{{$Pengajuan->satuan}}">

                    @error('satuan')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

            
                <div class="form-group">
                    <div class="row">
                    
                        <div class="col-3">
                            <label>Volume</label>
                            <input type="number" id="volume" name="volume" value="{{$Pengajuan->volume}}" class="form-control" placeholder="Cth. 10, 15, Dll">

                            @error('volume')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label>Harga Satuan (1000 Rupiah)</label>
                            <input type="number" id="hargaSatuan" name="hargaSatuan" value="{{$Pengajuan->hargaSatuan}}" class="form-control" placeholder="Cth. 10000">

                            @error('hargaSatuan')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror

                        </div>

                        <div class="col-5">
                            <label>Total</label>
                            <input type="text" id="total" value="{{$Pengajuan->total}}" name="total" class="form-control" readonly>

                        </div>
                    

                        <script>

                            function multiplyNumbers() {
                              var volume = document.getElementById("volume").value;
                              var hargaSatuan = document.getElementById("hargaSatuan").value;
                              var total = volume * hargaSatuan;
                              document.getElementById("total").value = total.toLocaleString(
                                "id-ID",
                                {
                                  style: "currency",
                                  currency: "IDR",
                                }
                              );
                            }
                          </script>
            
                    </div>
                </div>
                <br>
                <div class="form-group text-center">
                    <div>
                        <label>Rencana Waktu Pelaksanaan</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Start</label>
                            <input type="month" name="start" value="{{$Pengajuan->start}}" class="form-control">

                            @error('start')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>Finish</label>
                            <input type="month" name="finish" value="{{$Pengajuan->finish}}" class="form-control">

                            @error('finish')
                            <p class="text-danger font-weight-bold">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                
            </div>

            <div class="card-footer">
                <a href="/pengajuan" class="btn btn-danger float-right mr-2 ml-4" style="font-size: 13px;">Batalkan</a>
                <button type="submit" class="btn btn-success float-right mr-4" style="font-size: 14px;">Ajukan</button>
            </div>
            
        </form>
        
    </div>
</div>


@endsection