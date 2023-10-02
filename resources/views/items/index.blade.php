@extends('items.head')

@extends('items.mainsidebar')

@extends('items.navbar')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Items</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Unconfigured Items</li> --}}
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                {{-- <div class="float-end">
                  <a class="btn btn-success" href="{{ route('items.create') }}">Add New Data</a>
                  <a class="btn btn-success" href="{{ route('items.trash') }}">Recycle Bin</a>
                </div>  --}}
              <!-- /.card-header -->

                <div class="card-body">
                  <div>
                    <a class="btn btn-dark" href="{{ route('items.create') }}">Add New Data</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                      Import New Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import New Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="file" name="file" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>

                    <a class="btn btn-dark" href="{{ route('items.trash') }}">Recycle Bin</a>
                    <a class="btn btn-dark float-right" leftover href="{{ route('item-names.index') }}">Edit Table</a>
                    <a class="btn btn-dark float-right" leftover href="{{ route('item-names.index') }}">Edit Table</a>
                  
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                    @endif

                    <table id="myTable" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th></th>
                          <th>No</th>
                          <th>Item ID</th>
                          <th>Item</th>
                          <th>Manufacturer</th>
                          <th>Serial Number</th>
                          <th>Configuration Status</th>
                          <th>Location</th>
                          <th>Description</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach ($items as $item)
                          <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->itemName->name }}</td>
                            <td>{{ $item->manufacturerName->name }}</td>
                            <td>{{ $item->serial_number }}</td>
                            <td>{{ $item->configurationStatusName->name }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                              <form action="{{ route('destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
        
                                {{-- <a class="btn btn-info" href="{{ route('items.show',$item->id) }}">Show</a> --}}
                  
                                <a class="btn btn-outline-dark btn-sm" href="{{ route('items.edit',$item->id) }}"><i class="fas fa-pen"></i></a>
              
                                <button type="submit" class="btn btn-outline-dark btn-sm"><i class="fas fa-trash"></i></button>

                                <a class="btn btn-outline-dark btn-sm" href="{{ route('items.log',$item->id) }}"><i class="fas fa-history"></i></a>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->

            </div>
            <!-- /.col-md-6 -->

          </div>
          <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
      <footer class="main-footer">
          <!-- To the right -->
          <div class="float-right d-none d-sm-inline">
          Anything you want
          </div>
          <!-- Default to the left -->
          <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>

  </div>
  <!-- ./wrapper -->

@endsection

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script> --}}

<!-- AdminLTE DataTable -->
<script>
  $(document).ready( function() {
    $('#myTable').DataTable({
      pageLength: 25,
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, 'All Data']
      ],
      responsive: true,
      dom: '<"html5buttons"B>lTfgitp',
      buttons: [
        {extend: 'copy'},
        {extend: 'csv', title:'Data Asset Management System'},
        {extend: 'excel', title:'Data Asset Management System'},
        {extend: 'pdf', title:'Data Asset Management System'},

        {extend: 'print',
        customize: function (win){
          $(win.document.body).addClass('white-bg');
          $(win.document.body).css('font-size', '10px');

          $(win.document.body).find('table')
          .addClass('compact')
          .css('font-soze', 'inherit');
        }
        }
      ],
      columnDefs: [
        {
          targets: 0,
          checkboxes: {
            selectRow: true
          }
        }
      ],
      select: {
        style: 'multi'
      },
      order: [[1, 'asc']]
    });
  });
</script>
 
