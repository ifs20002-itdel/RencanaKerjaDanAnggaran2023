@extends('layout.master')
@section('title', 'Edit Workgroup')

@section('breadcrumb1')
    <li class="breadcrumb-item"><a href="/workgroup">Workgroup</a></li>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item">{{$workgroupData['nama']}} / Edit</li>
@endsection

@section('judul', 'Edit Workgroup')

@section('content')
<h6>Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h6>
<br>
<div class="ml-5 col-lg-9 col-6">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Edit Struktur Organisasi Kerja</h3>
        </div>

    <form action="/workgroup/{{$workgroupData['id']}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">     
            <div class="form-group">
                <label>Nama Organisasi</label>
                <input type="text" name="nama" class="form-control col-lg-11 col-6" placeholder="Cth. WR I" value="{{ old('nama', $workgroupData['nama']) }}">

                @error('nama')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
            </div>


            <div class="form-group">
                <label>Controller</label> <br>
                <select id="jabatan" class="form-control col-lg-11 col-6" type="text" name='controller' placeholder="Cth. Wakil Rektor Bidang Akademik dan Kemahasiswaan">
                    <option value="">--- Pilih Controller ---</option>

                    {{-- Unit --}}
                    <?php
                    //GetDataUnit
                    $token = session('token');
                    $responseDataPejabat = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/list-pejabat')->body();
                    $kepala = json_decode($responseDataPejabat, true);
                    ?>
                    @foreach ($kepala['data']['pejabat'] as $controller)
                        <option name="controller" value="{{$controller['jabatan_id']}}" {{ old('controller', $workgroupData['controller']) == $controller['jabatan_id'] ? 'selected' : '' }}>{{$controller['jabatan']}}</option>
                    @endforeach
                </select>

                @error('controller')
                <p class="text-danger font-weight-bold">{{$message}}</p>
                @enderror
            </div>

            {{-- Unit --}}
            <?php
            //GetDataUnit
            $token = session('token');
            $responseDataUnit = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/unit?userid='.session('user')['user_id'])->body();
            $unit = json_decode($responseDataUnit, true);
            ?>

            <div class="form-group ml-1">
                <div class="row">
                    <div class="col-12 col-sm-11 my-2">
                        <label>Tambahkan Units:</label>
                        @error('unit')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                        @enderror
                        @foreach ($unit['data']['unit'] as $item)
    @if ($item['name'] != 'tes' && $item['name'] != 'tess')
        <div class="form-check ml-2">
            <input class="form-check-input" type="checkbox" name="unit[]" id="unit{{ $item['unit_id'] }}" value="{{ $item['name'] }}" {{ in_array($item['name'], $workgroupData['unit']) ? 'checked' : '' }}>
            <label class="form-check-label"  for="unit{{ $item['unit_id'] }}">{{ $item['name'] }}</label>
        </div>
    @endif
@endforeach



                    </div>
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" onclick="return confirm('Lanjutkan Edit Data?')" class="btn btn-dark float-right mr-2 ml-4">Tambahkan</button>
                <a href="/workgroup" class="btn btn-danger float-right mr-4">Batalkan</a>
            </div>
            
        </div>
    </form>
        
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });

        $('#jabatan').select2({});
    });
</script>

@endsection
