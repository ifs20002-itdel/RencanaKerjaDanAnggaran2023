@extends('layout.master')
@section('title', 'Add Sub Jenis Penggunaan')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/jp">Mata Anggaran</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item"><a href="/jp">Jenis Penggunaan</a>&nbsp;&nbsp;/ &nbsp;Add Sub Jenis Penggunaan</li>
@endsection

@section('content')
<h6>Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-9 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Tambah Sub Jenis Penggunaan</h3>
        </div>
                
        <form action="/subjenispenggunaan" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Jenis Penggunaan Anggaran</label>
                    <select class="form-control" name="jenispenggunaan_id">
                        <?php 
                            $byk = 0;    
                        ?>
                      <option value="" disabled selected>--- Pilih Jenis Penggunaan Anggaran ---</option>
                      @foreach ($jenispenggunaan as $item)
                            <option value="{{$item->id}}">{{$byk +=1}}. {{$item->namaJenisPenggunaan}}</option>
                      @endforeach
                    </select>
                    @error('jenispenggunaan_id')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama Sub Jenis Penggunaan</label>
                    <textarea type="text" name="namaSubJenisPenggunaan" class="form-control" placeholder="Cth. Biaya Dosen (Gaji, Honor)">{{old('namaSubJenisPenggunaan')}}</textarea>
                
                    @error('namaSubJenisPenggunaan')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror

                </div>    

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-dark float-right ml-4">Tambahkan</button>
                <a href="/jp" class="btn btn-danger float-right mr-4 ml-4">Batalkan</a>
                
            </div>
            
        </form>
        
    </div>
</div>

@endsection