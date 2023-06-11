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
        <form action="/pengajuan" method="POST" oninput="calculateTotalPrice()">
            @csrf
            <div class="card-body">

                {{-- CONTAINER --}}
                <div class="container" style="font-size: 14px;">

                    {{-- Mata Anggaran --}}

                    <div class="row">
                        <div class="col-3 text-end">
                            <label for="mataanggaran_id" class="mr-3 mt-2">Mata Anggaran</label>
                        </div>

                        <div class="col-9">
                            <select class="form-control" name="mataanggaran_id" id="mataanggaran_id">
                                <option value="" disabled selected>--- Mata Anggaran ---</option>
                                @forelse ($mataanggaran as $mata)
                                    @foreach ($mata['unit'] as $item)
                                        @if ($item == Auth::user()->pegawai->unit->first()->name)
                                            <option id="{{ $mata['id'] }}"
                                                value="{{ $mata['id'] }}">{{ Auth::user()->pegawai->pejabat->first()->jabatan }}
                                                - {{ $mata['mataAnggaran'] }}. {{ $mata['namaAnggaran'] }}</option>
                                        @endif
                                    @endforeach
                                @empty
                                    <option value="" disabled selected>Tidak ada mata anggaran</option>
                                @endforelse

                            </select>
                            @error('mataanggaran_id')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
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

                            <input type="text" name="namaprogram" class="form-control" value="{{ old('namaprogram') }}">

                            @error('namaprogram')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
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

                            <textarea style="font-size:14px" rows="4" cols="50" class="form-control"
                                name="tujuan">{{ old('tujuan') }}</textarea>

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
                            <textarea style="font-size:14px" rows="4" cols="50" class="form-control"
                                name="deskripsi">{{ old('deskripsi') }}</textarea>
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
                                <input type="checkbox" name="{{ $waktu }}" id="{{ $waktu }}"
                                    value="{{ $waktu }}">
                                <label class="form-check-label mr-2 mb-2" for="{{ $waktu }}">{{ $waktu }}</label>
                            @endforeach
                        </div>

                    </div>
                    {{-- /Waktu Pelaksanaan --}}

                    <br>

                    {{-- SATUAN --}}

                    <div class="row">
                        <div class="col-3 text-end">
                            <label class="mr-3 mt-2">Satuan </label>
                        </div>

                        <div class="col-6">

                            <div class="form-group">
                                <select class="form-control" name="satuan">
                                    <option value="" disabled selected>--- Satuan ---</option>
                                    @foreach ($satuan as $item)
                                        <option value="{{ $item->satuan_id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('satuan')
                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-3">
                            <a href="/satuan/create" class="btn btn-light btn-sm mb-3 mt-1 text-left"
                                style="font-size: 13.5px;">
                                <i class="fa-regular fa-plus mr-2"></i>Tambah Satuan
                            </a>
                        </div>

                    </div>
                    {{-- /SATUAN --}}


                    {{-- VOLUME --}}
                    <div class="row">
                        <div class="col-3 text-end">
                            <label class="mr-3 mt-2">Volume</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="volume" name="volume" class="form-control" value="{{ old('volume') }}" min="0"
                                oninput="calculateTotalPrice()">
                            @error('volume')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- /VOLUME --}}


                    <br>
                    {{-- ROW6 --}}
                    <div class="row">
                        <div class="col-3 text-end mt-2">
                            <label class="mr-3">Harga Satuan</label>
                        </div>
                        <div class="col-9">
                            <input style="text-align: right;" type="text" id="hargaSatuan" name="hargaSatuan" class="form-control"
                                value="{{ old('hargaSatuan') }}" min="0" oninput="calculateTotalPrice()">
                            @error('hargaSatuan')
                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <br>

                    {{-- ROW7 --}}
                    <div class="row">
                        <div class="col-3 text-end mt-2">
                            <label class="mr-3">Harga Total</label>
                        </div>
                        <div class="col-9">
                            <input style="text-align: right;" maxlength="10" type="text" id="hargaTotal" name="hargaTotal" class="form-control" readonly>
                        </div>
                    </div>

                </div>
                {{-- /CONTAINER --}}

                <br>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/pengajuan" class="btn btn-danger">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</div>


<script>
    /* Dengan Rupiah */
    var hargaSatuan = document.getElementById('hargaSatuan');
hargaSatuan.addEventListener('input', function(e) {
    var enteredValue = this.value.trim();
    
    if (enteredValue === '') {
        this.value = 'Rp. 0.00';
    } else if (enteredValue === 'Rp. 0.00') {
        // Do nothing if the user enters "Rp. 0.00" manually
    } else {
        var formattedValue = formatRupiah(enteredValue, 'Rp. ');
        this.value = formattedValue;
    }
});


    var volume = document.getElementById('volume');
    volume.addEventListener('input', calculateTotalPrice);

    var hargaTotal = document.getElementById('hargaTotal');

    /* Fungsi Format Rupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    /* Fungsi Hitung Total Harga */
    function calculateTotalPrice() {
        var volumeValue = parseInt(volume.value);
        var hargaSatuanValue = parseInt(hargaSatuan.value.replace(/[^,\d]/g, ''));
        var total = volumeValue * hargaSatuanValue;

        if (!isNaN(total)) {
            hargaTotal.value = 'Rp. ' + formatRupiah(total.toString()) + '.00';
        } else {
            hargaTotal.value = 'Rp. 0.00';
        }
    }
</script>



@endsection


