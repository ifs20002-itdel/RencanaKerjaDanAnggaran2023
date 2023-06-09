@extends('layout.master')
@section('title', 'Edit Mata Anggaran')
@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/jp">Mata Anggaran</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item"><a href="/jp">{{$mataanggaran->mataAnggaran}}. {{$mataanggaran->namaAnggaran}} </a>&nbsp;&nbsp;/ &nbsp; Edit</li>
@endsection

@section('content')
<h6 style="font-size: 13px;">Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>

<div class="ml-5 col-lg-9 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 14px;">Form Edit Mata Anggaran</h3>
        </div>
        <form action="/mataanggaran/{{$mataanggaran->id}}" method="POST">
            @csrf
            @method('PUT')
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
                            <option id="{{ $item->id }}" value="{{ $item->id }}" {{ $item->id == $mataanggaran->jenispenggunaan_id ? 'selected' : '' }}>{{$byk+=1}}. {{ $item->namaJenisPenggunaan }}</option>
                       @endforeach
                        
                    </select>
                    @error('jenispenggunaan_id')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror

                    {{-- /Jenis Penggunaan Anggaran --}}
                </div>

                <div class="form-group">
                    <label for="subjenispenggunaan_id" style="font-size: 14px;">Sub Jenis Penggunaan Anggaran</label>
                    <select class="form-control" name="subjenispenggunaan_id" id="subjenispenggunaan_id" style="font-size: 14px;">

                        @foreach($subjenispenggunaan as $item)
                             <option id="{{ $item->id }}" value="{{ $item->id }}" {{ $item->id == $mataanggaran->subjenispenggunaan_id ? 'selected' : '' }}>{{$bykSub = chr(ord($bykSub) + 1) }}. {{ $item->namaSubJenisPenggunaan }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group" style="font-size: 14px;">
                    <label style="font-size: 14px;">Mata Anggaran</label>
                    <input type="text" name="mataAnggaran" class="form-control" style="font-size: 14px;" placeholder="Cth. A.II.2.1" value="{{ $mataanggaran->mataAnggaran }}">

                    @error('mataAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-size: 14px;">Nama Anggaran</label>
                    <input type="text" style="font-size: 14px;" name="namaAnggaran" class="form-control" placeholder="Cth. Gaji Dosen" value="{{ $mataanggaran->namaAnggaran }}">

                    @error('namaAnggaran')
                    <p class="text-danger font-weight-bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group ml-1">
                    <div class="row">
                      <div class="col-12 col-sm-11 my-2">
                        <label style="font-size: 14px;">Organisasi Unit:</label>
                        @error('workgroup_id')
                          <p class="text-danger font-weight-bold">{{ $message }}</p>
                        @enderror
                       
                        @foreach ($workgroup as $group)
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="workgroup_id[]" id="workgroup_id{{$group->id}}" value="{{$group->id}}" {{ in_array($group->id, json_decode($mataanggaran->workgroup_id)) ? 'checked' : '' }}>
                            <label class="form-check-label" style="font-size: 14px;" for="workgroup_id{{$group->id}}" >{{ $group->nama }}</label>
                        </div>
                        @endforeach


                      </div>
                    </div>
                </div>

                {{-- Unit --}}

            <div class="form-group ml-1">
                <div class="row">
                    <div class="col-12 col-sm-11 my-2">
                        <label style="font-size: 14px;">Tambahkan Units:</label>
                        @error('unit')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                        @enderror
                        @foreach ($unitDB as $item)
                            
                            <div class="form-check ml-2" style="font-size: 13px;">
                                <input class="form-check-input" type="checkbox" name="unit[]" id="unit{{ $item->unit_id }}" value="{{ $item->name }}" {{ in_array($item->name, $mataAnggaranData['unit']) ? 'checked' : '' }}>
                                <label class="form-check-label"  for="unit{{ $item->unit_id }}">{{ $item->name }}</label>
                            </div>
                            
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- <div class="form-group ml-1">
                <div class="row">
                    <div class="col-12 col-sm-11 my-2">
                        <label style="font-size: 14px;">Tambahkan Units:</label>
                        @error('unit')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                        @enderror
                        @foreach ($unit['data']['unit'] as $item)
                            @if ($item['name'] != 'tes' && $item['name'] != 'tess')
                                <div class="form-check ml-2" style="font-size: 13px;">
                                    <input class="form-check-input" type="checkbox" name="unit[]" id="unit{{ $item['unit_id'] }}" value="{{ $item['name'] }}" {{ in_array($item['name'], $mataAnggaranData['unit']) ? 'checked' : '' }}>
                                    <label class="form-check-label"  for="unit{{ $item['unit_id'] }}">{{ $item['name'] }}</label>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div> --}}

            </div>

            <div class="card-footer">
                <a href="/jp" class="btn btn-danger float-right mr-2 ml-4" style="font-size: 13px;">Batalkan</a>
                <button type="submit" class="btn btn-dark float-right mr-4" style="font-size: 13px;">Simpan</button>
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

@endsection
