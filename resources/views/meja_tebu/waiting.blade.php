
<!DOCTYPE html>
<html lang="en">
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="5;URL='{{ route('rafaction_checking', $rafaction_id) }}'">

    <title>{{ env('APP_NAME') }}</title>

	  <link rel="icon" type="image/png" href="/admin_template/img/QC.png"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/admin_template/css/sb-admin-2.min.css" rel="stylesheet">

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
					  <div class="col-lg-6">
						<br><br><br><br><br>
                        <p><a href="/">
                            <img src="/admin_template/img/QC.png" class="mx-auto d-block" width="304" height="236">
                        </a></p>
                        <br>
					  </div>
					  <div class="col-lg-6">
						<div class="p-5">
						  <div class="text-left">
							<h1 class="text-dark"><strong>Informasi</strong></h1>
                            <br>
                            <table class="table">
                                <tr>
                                    <th>Nomor Antrian</th>
                                    <td>{{ $data->barcode }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Polisi</th>
                                    <td>{{ $data->truck_number }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Register</th>
                                    <td>{{ $data->register }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Petani</th>
                                    <td>{{ $data->farmer }}</td>
                                </tr>
                            </table>
                            <hr>
                            <h5 align="center">Mohon menunggu, tebu Anda sedang dinilai. Terima kasih.</h5>
						  </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="/admin_template/vendor/jquery/jquery.min.js"></script>
    <script src="/admin_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/admin_template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/admin_template/js/sb-admin.min.js"></script>

  </body>

</html>