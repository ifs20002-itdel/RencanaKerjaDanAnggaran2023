@extends('layout.master')
@section('title', 'Edit Jenis Anggaran')
@section('breadcrumb1')
    <li class="breadcrumb-item">Edit Jenis Penggunaan Anggaran</li>
@endsection

@section('judulTengah', 'Edit Jenis Penggunaan Anggaran')

@section('content')

<!--1. Biaya Operasional Pendidikan-->
<hr>
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">1. Biaya Operasional Pendidikan</h3>

        <div class="card-tools">    
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button> 
        </div>
    
    </div>

    <div class="card-body">
      
         <!--Table A-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title">A. Biaya Dosen (Gaji Dan Honor)</h3>
                <div class="card-tools">    
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button> 
                </div>
            
            </div>
        
            <div class="card-body">
                <!--Table A-->
                <table class="table ml-5 col-lg-11 col-6">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mata Anggaran</th>
                        <th scope="col">Nama Anggaran</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <span class="text-white">{{ $byk = 0 }}</span>
                        @foreach ($JenisPenggunaan as $item)
                        @if ($item->bagianTable == "1A")
                        <tr>
                            <td style="width:5%">{{ $byk+=1 }}</td>
                            <td style="width:15%">{{$item->mataAnggaran}}</td>
                            <td style="width:50%">{{$item->namaAnggaran}}</td>
                            
                            <td style="width:30%">
                                <div class="btn-group">
                                    <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                                    <a href="/jpDosen/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                                    <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                    </form>
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
                        @else
                        
                        @endif 
                    </tbody>
                </table>
                  <!--/.Table A-->
                  <br>

                <!--Tambah Data-->
                <div class="card-footer">
                    <a href="/jpDosen/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
                </div>
                <!--/.Tambah Data-->
        
            </div>
        
        </div>
        <!--/Table A-->
        
        <br>

        <!--Table B-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title">B. Gaji Tenaga Kependidikan Dosen (Gaji Dan Honor)</h3>
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
                        <th scope="col">No</th>
                        <th scope="col">Mata Anggaran</th>
                        <th scope="col">Nama Anggaran</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <span class="text-white">{{ $byk = 0 }}</span>
                        @foreach ($JenisPenggunaan as $item)
                        @if ($item->bagianTable == "1B")
                        <tr>
                            <td style="width:5%">{{ $byk+=1 }}</td>
                            <td style="width:15%">{{$item->mataAnggaran}}</td>
                            <td style="width:50%">{{$item->namaAnggaran}}</td>
                            
                            <td style="width:30%">
                                <div class="btn-group">
                                    <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                                    <a href="/jpTenagaKependidikan/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                                    <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                    </form>
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
                        @else
                        
                        @endif 
        
                    </tbody>
                </table>
                  <br>

                <!--Tambah Data-->
                <div class="card-footer">
                    <a href="/jpTenagaKependidikan/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
                </div>
                <!--/.Tambah Data-->
        
            </div>
        
        </div>
        <!--/Table B-->
        <br>
        <!--Table C-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title">C. Biaya Operasional Pembelajaran</h3>
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
                        <th scope="col">No</th>
                        <th scope="col">Mata Anggaran</th>
                        <th scope="col">Nama Anggaran</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <span class="text-white">{{ $byk = 0 }}</span>
                        @foreach ($JenisPenggunaan as $item)
                        @if ($item->bagianTable == "1C")
                        <tr>
                            <td style="width:5%">{{ $byk+=1 }}</td>
                            <td style="width:15%">{{$item->mataAnggaran}}</td>
                            <td style="width:50%">{{$item->namaAnggaran}}</td>
                            
                            <td style="width:30%">
                                <div class="btn-group">
                                    <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                                    <a href="/jpPembelajaran/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                                    <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                    </form>
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
                        @else
                        
                        @endif 
        
                    </tbody>
                </table>
                  <br>

                <!--Tambah Data-->
                <div class="card-footer">
                    <a href="/jpPembelajaran/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
                </div>
                <!--/.Tambah Data-->
        
            </div>
        
        </div>
        <!--/Table C-->
        <br>
        <!--Table D-->
        <div class="card col-lg-11 col-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title">D. Biaya Operasional Tidak Langsung (Listrik, Gas, Air, Pemeliharaan Gedung, Pemeliharaan Saraan, Uang Lembur, Telekomunikasi, Konsumsi, Transport, Pajak, Asuransi, dll)</h3>
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
                        <th scope="col">No</th>
                        <th scope="col">Mata Anggaran</th>
                        <th scope="col">Nama Anggaran</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <span class="text-white">{{ $byk = 0 }}</span>
                        @foreach ($JenisPenggunaan as $item)
                        @if ($item->bagianTable == "1D")
                        <tr>
                            <td style="width:5%">{{ $byk+=1 }}</td>
                            <td style="width:15%">{{$item->mataAnggaran}}</td>
                            <td style="width:50%">{{$item->namaAnggaran}}</td>
                            
                            <td style="width:30%">
                                <div class="btn-group">
                                    <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                                    <a href="/jpBOTL/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                                    <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                    </form>
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
                        @else
                        
                        @endif 
        
                    </tbody>
                </table>
                  <br>

                <!--Tambah Data-->
                <div class="card-footer">
                    <a href="/jpBOTL/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
                </div>
                <!--/.Tambah Data-->
        
            </div>
        
        </div>
        <!--/Table D-->
    </div>
  </div>
  <!--/.A. Biaya Dosen-->

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<br>
<br>

 <!--2. Biaya Operasional Kemahasiswaan-->
 <div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">2. Biaya Operasional kemahasiswaan (Penalaran, Minat, Bakat, dan Kesejahteraan)</h3>

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
                <th scope="col">No</th>
                <th scope="col">Mata Anggaran</th>
                <th scope="col">Nama Anggaran</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0 }}</span>
                @foreach ($JenisPenggunaan as $item)
                @if ($item->bagianTable == "2")
                <tr>
                    <td style="width:5%">{{ $byk+=1 }}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>
                    
                    <td style="width:30%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                            <a href="/jpKemahasiswaan/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                            <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
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
                @else
                
                @endif 

            </tbody>
        </table>

          <br>
        <!--Tambah Data-->
        <div class="card-footer">
            <a href="/jpKemahasiswaan/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
        </div>
        <!--/.Tambah Data-->

    </div>

</div>
  
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<br>
<br>

<!--3. Biaya Penelitian-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">3. Biaya Penelitian</h3>

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
                <th scope="col">No</th>
                <th scope="col">Mata Anggaran</th>
                <th scope="col">Nama Anggaran</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0 }}</span>
                @foreach ($JenisPenggunaan as $item)
                @if ($item->bagianTable == "3")
                <tr>
                    <td style="width:5%">{{ $byk+=1 }}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>
                    
                    <td style="width:30%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                            <a href="/jpPenelitian/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                            <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
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
                @else
                
                @endif 

            </tbody>
        </table>

          <br>
        <!--Tambah Data-->
        <div class="card-footer">
            <a href="/jpPenelitian/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
        </div>
        <!--/.Tambah Data-->

    </div>

</div>
  
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<br>
<br>

<!--4. Biaya PkM-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">4. Biaya PkM</h3>

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
                <th scope="col">No</th>
                <th scope="col">Mata Anggaran</th>
                <th scope="col">Nama Anggaran</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0 }}</span>
                @foreach ($JenisPenggunaan as $item)
                @if ($item->bagianTable == "4")
                <tr>
                    <td style="width:5%">{{ $byk+=1 }}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>
                    
                    <td style="width:30%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                            <a href="/jpPkM/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                            <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
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
                @else
                
                @endif 

            </tbody>
        </table>

          <br>
        <!--Tambah Data-->
        <div class="card-footer">
            <a href="/jpPkM/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
        </div>
        <!--/.Tambah Data-->

    </div>

</div>
  
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<br>
<br>

<!--5. Biaya SDM-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">5. Biaya SDM</h3>

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
                <th scope="col">No</th>
                <th scope="col">Mata Anggaran</th>
                <th scope="col">Nama Anggaran</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0 }}</span>
                @foreach ($JenisPenggunaan as $item)
                @if ($item->bagianTable == "5")
                <tr>
                    <td style="width:5%">{{ $byk+=1 }}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>
                    
                    <td style="width:30%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                            <a href="/jpSDM/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                            <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
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
                @else
                
                @endif 

            </tbody>
        </table>

          <br>
        <!--Tambah Data-->
        <div class="card-footer">
            <a href="/jpSDM/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
        </div>
        <!--/.Tambah Data-->

    </div>

</div>
  
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<br>
<br>

<!--6. Biaya Investasi Sarana-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">6. Biaya Investasi Sarana</h3>

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
                <th scope="col">No</th>
                <th scope="col">Mata Anggaran</th>
                <th scope="col">Nama Anggaran</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0 }}</span>
                @foreach ($JenisPenggunaan as $item)
                @if ($item->bagianTable == "6")
                <tr>
                    <td style="width:5%">{{ $byk+=1 }}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>
                    
                    <td style="width:30%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                            <a href="/jpSarana/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                            <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
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
                @else
                
                @endif 

            </tbody>
        </table>

          <br>
        <!--Tambah Data-->
        <div class="card-footer">
            <a href="/jpSarana/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
        </div>
        <!--/.Tambah Data-->

    </div>

</div>
  
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<br>
<br>

<!--7. Biaya Investasi Prasarana-->
<div class="card ml-5 col-lg-11 col-6">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">7. Biaya Investasi Prasarana</h3>

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
                <th scope="col">No</th>
                <th scope="col">Mata Anggaran</th>
                <th scope="col">Nama Anggaran</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <span class="text-white">{{ $byk = 0 }}</span>
                @foreach ($JenisPenggunaan as $item)
                @if ($item->bagianTable == "7")
                <tr>
                    <td style="width:5%">{{ $byk+=1 }}</td>
                    <td style="width:15%">{{$item->mataAnggaran}}</td>
                    <td style="width:50%">{{$item->namaAnggaran}}</td>
                    
                    <td style="width:30%">
                        <div class="btn-group">
                            <a href="/addJenisPenggunaan/{{$item->id}}" class="btn btn-sm btn-primary "><i class="fa-regular fa-eye mr-1"></i>Detail</a>
                            <a href="/jpPrasarana/{{$item->id}}/edit" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square mr-1"></i>Edit</a>
                            <form action="/addJenisPenggunaan/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ml-4"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                            </form>
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
                @else
                
                @endif 

            </tbody>
        </table>

          <br>
        <!--Tambah Data-->
        <div class="card-footer">
            <a href="/jpPrasarana/create"><button type="submit" class="btn btn-success"><i class="fa-regular fa-plus mr-2"></i>Tambah Data</button></a>
        </div>
        <!--/.Tambah Data-->

    </div>

</div>
  
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



  @endsection