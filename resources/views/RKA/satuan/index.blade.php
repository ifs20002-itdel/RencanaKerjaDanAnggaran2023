@extends('layout.master')
@section('title', 'Satuan')
@section('breadcrumb1')
    <li class="breadcrumb-item">Satuan</li>
    <div class="col-sm-10">
        <ol class="breadcrumb float-sm-right">
          <li><a href="/satuan/create"><button type="submit" class="btn btn-light btn-sm mb-3" style="font-size: 13.5px;"><i class="fa-regular fa-plus mr-2"></i>Tambah Satuan</button></a></li>
        </ol>
      </div>
@endsection

@section('judul', 'Satuan')

@section('content')

<div class="card" style="font-size: 13px;" >
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      $totalData = count($satuan);
      $startItem = $totalData > 0 ? 1 : 0;
      ?>
      @if ($totalData > 0)
        <p class="text-muted">Showing <b>{{$startItem}}-{{$totalData}}</b> of <b>{{$totalData}}</b> items.</p>
      @else
        <p class="text-muted">No items found.</p>
      @endif
      <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th style="vertical-align: middle;">Nama Satuan
                    <br>
                    <input type="text" id="searchingNama" name="searchingNama" class="form-control" onkeyup="searchTable('searchingNama', 1)">
                </th>
                <th>Deskripsi
                    <br>
                    <input type="text" id="searchingDeskripsi" name="searchingDeskripsi" class="form-control" onkeyup="searchTable('searchingDeskripsi', 2)">
                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php
                $bykMata = 0;
                ?>
                @foreach ($satuan as $item)
              <!-- Table body content goes here -->
              <tr>
                  <td>{{$bykMata+=1}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->deskripsi}}</td>
                  <td>
                    <div class="input-group d-flex justify-content-center" style="font-size: 12px;">
                      <div class="input-group-prepend" style="font-size: 12px;">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="dropdown" style="font-size: 12px;"><i class="fa-solid fa-wrench" style="font-size: 10px;"></i> Tools</button>
                        <div class="dropdown-menu" style="font-size: 14px;">
                          <a class="dropdown-item" href="/satuan/{{$item->satuan_id}}/edit"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                        </div>
                      </div>
                    </div>
                  </td>
                  
              </tr>
              @endforeach
              @if ($bykMata == 0)
              <tr>
                  <td colspan="4" class="text-center p-3 table-active">
                      Data Satuan Belum Ditambahkan
                  </td>
              </tr>
              
          @endif 
            </tbody>
          </table>
        </div>
    </div>
    <!-- /.card-body -->
  </div>

  <script>
    function searchTable(inputId, columnIndex) {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById(inputId);
        filter = input.value.toUpperCase();
        table = document.querySelector(".table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[columnIndex];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        var rowCount = table.rows.length;
        var rowCountVisible = 0;
        for (i = 1; i < rowCount; i++) {
            if (tr[i].style.display !== "none") {
                rowCountVisible++;
            }
        }

        var noResultRow = document.querySelector(".no-result-row");
        if (rowCountVisible === 0) {
            if (!noResultRow) {
                noResultRow = document.createElement("tr");
                noResultRow.classList.add("no-result-row");
                noResultRow.innerHTML = "<td colspan='4' class='text-center p-3 table-active'>No results found.</td>";
                table.tBodies[0].appendChild(noResultRow);
            }
        } else {
            if (noResultRow) {
                noResultRow.remove();
            }
        }
    }
  </script>
@endsection
