@extends('layout.masterFixed')
@section('title', 'Add Program')
@section('breadcrumb1')
    <li class="breadcrumb-item">Program</li>
@endsection

@section('judul', 'Program')

@section('content')

    <div class="card" style="font-size: 13px;" >
      <!-- /.card-header -->
      <div class="card-body">
        <h6>Total: </h6>
        <hr style="border: none; border-top: 3px solid black; margin: 10px 0;">

        <p class="text-muted">Total ... items.</p>
        <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Jabatan</th>
                  <th>Mata Anggaran</th>
                  <th>Kode Program</th>
                  <th>Nama Program/Kegiatan</th>
                  <th>Pengusul</th>
                  <th>Harga Total</th>
                  <th>Status Program</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- Table body content goes here -->
                <tr>
                    <td colspan="6" class="text-right font-weight-bold">Total: </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                  
                  
                  
              </tbody>
            </table>
          </div>
          
          

        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->


@endsection