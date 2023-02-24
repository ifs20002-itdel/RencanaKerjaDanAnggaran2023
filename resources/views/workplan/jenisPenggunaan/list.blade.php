@extends('layout.master')
@section('title', 'Anggaran')
@section('breadcrumb1')
    <li class="breadcrumb-item">Anggaran</li>
@endsection

@section('judulTengah', 'Daftar Anggaran')

@section('content')
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">Berikut Panduan Template RKA  <a href="https://docs.google.com/spreadsheets/d/140zs3W8NE7GwuaQlNXegL6atDtKjO4y7/edit#gid=712992635" target="_blank"><span class="badge badge-success ml-1">Template RKA</span></a></h3>

        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    
    </div>

    <div class="card-body">
    
        <table class="table ml-5 col-lg-11 col-6">
            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        1. Biaya Operasional Pendidikan - A. Biaya Dosen (Gaji Dan Honor)
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "1A")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:60%">{{$item->namaAnggaran}}</td>    
                    <td style="width:5%">
                        <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                    </td>  
                </tr>
                @endif
                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>

            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        1. Biaya Operasional Pendidikan - B. Gaji Tenaga Kependidikan Dosen (Gaji Dan Honor)
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "1B")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>


            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        1. Biaya Operasional Pendidikan - C. Biaya Operasional Pembelajaran
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "1C")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>

            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        1. Biaya Operasional Pendidikan - D. Biaya Operasional Tidak Langsung
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "1D")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>


            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        2. Biaya Operasional Kemahasiswaan
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "2")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>


            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        3. Biaya Penelitian
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "3")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>

            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        4. Biaya PkM
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "4")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>

            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        5. Biaya Investasi SDM
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "5")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>


            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        6. Biaya Investasi Sarana
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "6")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>

            <thead class="thead-light">
                <tr>
                    <th colspan="7" class="text-center bg-blue-200">
                        7. Biaya Investasi Prasarana
                    </th>
                </tr>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Anggaran</th>
                    <th scope="col">Nama Anggaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0}}</span>
                @foreach ($Penggunaan as $item)
                @if ($item->bagianTable == "7")
                <tr>
                    <td style="width:10%">{{$byk += 1}}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>    
                    <td style="width:15%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                        </div>
                    </td>  
                </tr>
                @endif

                @endforeach
                @if ($byk == 0)
                <tr>
                    <td colspan="7" class="text-center p-3 table-active">
                        Data Jenis Penggunaan Anggaran Belum Ditambahkan
                    </td>
                </tr>
                @endif 

            </tbody>




        </table>

    </div>
</div>
@endsection