@extends('layout.master')
@section('title', 'Add Mata Anggaran')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/jp">Mata Anggaran</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item"><a href="/jp">Jenis Penggunaan</a>&nbsp;&nbsp;/ &nbsp; Add Mata Anggaran</li>
@endsection

@section('content')
<h6 style="font-size: 13px;">Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>

<div class="ml-5 col-lg-9 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 14px;">Form Menambahkan Mata Anggaran</h3>
        </div>
        <form action="/mataanggaran" method="POST">
            @csrf
            <div class="card-body">

            {{-- Jenis Penggunaan Anggaran --}}
                <div class="form-group">
                    <label for="jenispenggunaan_id" style="font-size: 14px;">Jenis Penggunaan Anggaran</label>

                    <select class="form-control" name="jenispenggunaan_id" id="jenispenggunaan_id" style="font-size: 14px;">
                        <?php 
                            $byk = 0;  
                            $bykSub = '@';
                        ?>
                       <option value="" disabled selected>--- Pilih Jenis Penggunaan Anggaran ---</option>

                       @foreach($jenispenggunaan as $item)
                            <option id="{{ $item->id }}" value="{{ $item->id }}">{{$byk+=1}}. {{ $item->namaJenisPenggunaan }}</option>
                       @endforeach
                        
                    </select>
                    @error('jenispenggunaan_id')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror

                    {{-- /Jenis Penggunaan Anggaran --}}
                </div>

                <div class="form-group">
                    <label for="subjenispenggunaan_id" style="font-size: 14px;">Sub Jenis Penggunaan Anggaran</label>
                    <select class="form-control" name="subjenispenggunaan_id" id="subjenispenggunaan_id">
                    
                    </select>
                </div>

                <div class="form-group" style="font-size: 14px;">
                    <label style="font-size: 14px;">Mata Anggaran</label>
                    <input type="text" name="mataAnggaran" class="form-control" style="font-size: 14px;" placeholder="Cth. A.II.2.1" value="{{old('mataAnggaran')}}">

                    @error('mataAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-size: 14px;">Nama Anggaran</label>
                    <input type="text" style="font-size: 14px;" name="namaAnggaran" class="form-control" placeholder="Cth. Gaji Dosen" value="{{old('namaAnggaran')}}">

                    @error('namaAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group" style="font-size: 14px;">
                    <label style="font-size: 14px;">Controller</label> <br>
                    <select id="jabatan" class="form-control col-lg-11 col-6" type="text" name='controller' placeholder="Cth. Wakil Rektor Bidang Akademik dan Kemahasiswaan" value="{{old('controller')}}">
                        <option value="">--- Pilih Controller ---</option>

                        @foreach ($pejabat as $controller)
                            <option name="controller" value="{{$controller->jabatan_id}}">{{$controller->jabatan}}</option>
                        @endforeach
                    </select>

                    @error('controller')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group ml-1">
                    <div class="row">
                      <div class="col-12 col-sm-11 my-2">
                        <label style="font-size: 14px;">Tambahkan Units:</label>
                        @error('unit')
                          <p class="text-danger font-weight-bold">{{ $message }}</p>
                        @enderror
                        
                        @foreach ($unit as $dataUnit)
                        <div class="form-check ml-2" style="font-size: 13px;">
                          <input class="form-check-input" type="checkbox" name="unit[]" id="unit{{$dataUnit->unit_id}}" value="{{$dataUnit->name}}">
                          <label class="form-check-label" for="unit{{ $dataUnit->unit_id}}">{{ $dataUnit->name}}</label>
                        </div>
                        @endforeach
    
                      </div>
                    </div>
                  </div>

            </div>

            <div class="card-footer">
                <a href="/jp" class="btn btn-danger float-right mr-2 ml-4" style="font-size: 13px;" style="font-size: 14px;">Batalkan</a>
                <button type="submit" class="btn btn-dark float-right mr-4" style="font-size: 13px;" style="font-size: 14px;">Tambahkan</button>
            </div>
            
        </form>
        
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
      $('#jenispenggunaan_id').on('change', function () {
          var jenispenggunaanId = this.value;
          var bykSub = '@';
          $('#subjenispenggunaan_id').html('');
          
          // Reset dropdown 2 jika dropdown 1 berubah
          $('#subjenispenggunaan_id').prop('disabled', true).html('<option value="" selected>--- Pilih Sub Jenis Penggunaan Anggaran ---</option>');
  
          $.ajax({
              url: '{{ route('getSubJenisPenggunaan') }}?jenispenggunaan_id=' + jenispenggunaanId,
              type: 'get',
              success: function (res) {
                  if (res.length > 0) {
                      $('#subjenispenggunaan_id').prop('disabled', false).html('<option value="">--- Pilih Sub Jenis Penggunaan Anggaran ---</option>');
                      $.each(res, function (key, value) {
                          $('#subjenispenggunaan_id').append('<option value="' + value.id + '">' + (bykSub = String.fromCharCode(bykSub.charCodeAt(0) + 1)) + '. ' + value.namaSubJenisPenggunaan + '</option>');
                      });
                  } else {
                      $('#subjenispenggunaan_id').prop('disabled', true).html('<option value="" selected>Data Sub Jenis Penggunaan Pada Jenis Penggunaan Ini Tidak Ada</option>');
                  }
              }
          });
      });
  });
  
  
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
  <script>
      $(document).ready(function(){
          $(document).ready(function() {
      $('.selectpicker').selectpicker();
    });
  
          $('#jabatan').select2({
  
          });
      });
  </script>

@endsection