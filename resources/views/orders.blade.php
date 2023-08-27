@extends('layout.admin-layout')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold btn btn-success"><a href="{{ route('orders.create') }}">Create Order</a></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Car ID</th>
                                <th>Driver Name</th>
                                <th>Rented At</th>
                                <th>Returned At</th>
                                <th>Admin Approval</th>
                                <th>Head Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    @if ($order->returned_at != null)
                                        <td>
                                            <p class="text-center">Done</p>
                                        </td>
                                    @elseif ($order->head_approval && $order->admin_approval)
                                        <td>
                                            <form method="POST" action="{{ route('orders.returned', $order->id) }}">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Return</button>
                                            </form>
                                        </td>
                                    @else
                                        <td>

                                            <form action="{{ route('orders.approve', $order->id) }}" method="POST">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Approve</button>
                                            </form>
                                        </td>
                                    @endif
                                    <td>{{ $order->car_id }}</td>
                                    <td>{{ $order->driver_name }}</td>
                                    <td>{{ $order->rented_at }}</td>
                                    <td>{{ $order->returned_at }}</td>
                                    <td>{{ !$order->admin_approval ? 'Not approved' : 'Approved' }}</td>
                                    <td>{{ !$order->head_approval ? 'Not approved' : 'Approved' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
@endsection
