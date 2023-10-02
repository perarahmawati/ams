@extends('configureds.head')

@extends('configureds.mainsidebar')

@extends('configureds.navbar')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Recycle Items</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- /.Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                @if(session('status'))
                  <div class="alert alert-success text-center">
                      {{session('status')}}
                  </div>
                @endif

              <!-- /.card-header -->
              <div class="card-body">
                <table id="myTable" class="table table-bordered table-hover ">
                  <thead>
                  <tr>
                        <th>No</th>
                        <th>Item ID</th>
                        <th>Item</th>
                        <th>Manufacturer</th>
                        <th>Serial Number</th>
                        <th>Configuration Status</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Deleted Date</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach ($item as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->itemName->name }}</td>
                        <td>{{ $item->manufacturerName->name }}</td>
                        <td>{{ $item->serial_number }}</td>
                        <td>{{ $item->configurationStatusName->name }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->deleted_at }}</td>
                        <td>
                            <form action="{{ route('items.restore',$item->id) }}" method="POST">            
                                @csrf
                                @method('POST')
                
                            <button type="submit" class="btn btn-danger">Restore</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script> --}}

<!-- AdminLTE DataTable -->
<script>
  $(document).ready( function() {
    $('#myTable').DataTable();
  });
</script>

</body>
</html>
 
