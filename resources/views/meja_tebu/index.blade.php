
<!DOCTYPE html>
<html lang="en">
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>

	<link rel="icon" type="image/png" href="/admin_template/img/QC.png"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/admin_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

  <body id="page-top">
	
    <div id="wrapper">

      <!-- Sidebar -->

      <div id="content-wrapper">

        <div class="container-fluid">
		
			<!-- Outer Row -->
			<div class="row justify-content-center">

			  <div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
				  <div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
					  <div class="col-lg-6"><br><br>
						<p>
                            <a href="/">
                                <img src="/admin_template/img/QC.png" class="mx-auto d-block" width="304" height="236">
                            </a>
                        </p>
                        <br>
					  </div>
					  <div class="col-lg-6">
						<div class="p-5">
						  <div class="text-center">
							<h1 class="text-dark"><strong>Meja Tebu {{ $nomor_meja }}</strong></h1>
						  </div>
						  <form class="user" action="{{ route('rafactions.store') }}" method="post">
                            @csrf
							<div class="form-group">
                                <br><br>
                                <input type="text" 
                                    class="form-control form-control-lg" 
                                    id="exampleInputUsername" 
                                    placeholder="Tap Nomor Antrian Anda..." 
                                    name="barcode" 
                                    maxlength="9" 
                                    autofocus required>
                                <input type="hidden" value="{{ $nomor_meja }}" name = "spot">
                            </div>
                            @if($message = Session::get('error'))
                                @include('components.alert', ['message'=>$message, 'color'=>'danger'])
                            @elseif($message = Session::get('success'))
                                @include('components.alert', ['message'=>$message, 'color'=>'success'])
                            @endif
						  </form>
						</div>
					  </div>
					</div>
				  </div>
				</div>

			  </div>

			</div>
		

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="/admin_template/vendor/jquery/jquery.min.js"></script>
    <script src="/admin_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/admin_template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/admin_template/js/sb-admin.min.js"></script>

  </body>

</html>