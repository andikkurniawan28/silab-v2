<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

        <title>{{ env('APP_NAME') }}</title>
	
        <link rel="icon" type="image/png" href="/admin_template/img/QC.png"/>
        <link href="/admin_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/admin_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	</head>

	<body>

        @if($request->handling == 'export')
            @php
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Silab_".$request->date.".xls");
            @endphp
        @endif

        <div class="wrapper">

            <section class="invoice">
            
            <br></br>
  
              <div class="row d-flex justify-content-center text-dark">
                  <div class="col-11 table-responsive">
                      <table border='1' cellpadding='0' width='100%'>
                          <thead>
                              <tr>
                                  <th rowspan='2'><img class='rounded mx-auto d-block' src='/admin_template/img/ka.jpg' width="100" height="100"></img></th>
                                  <th colspan='3' class='text-center'>
                                      <H6><STRONG>PT. KEBON AGUNG UNIT PABRIK GULA KEBON AGUNG</STRONG></H6>
                                      <p><SMALL>FORMULIR</SMALL></p>
                                      <H4><STRONG>LAPORAN 
                                          @if($request->shift == 0)
                                          {{ 'HARIAN' }}
                                          @else
                                          {{ 'MANDOR' }}
                                          @endif CORE SAMPLE</STRONG></H4>
                                  </th>
                                  <th rowspan='2'><img class='rounded mx-auto d-block' src='/admin_template/img/QC.png' width="100" height="100"></img></th>
                              </tr>
                              <tr>
                                  <th class='text-center'>No Dok : KBA/FRM/QC/005-00</th>
                                  <th class='text-center'>Tanggal : {{ date('d F Y', strtotime($request->date)) }}</th>
                                  <th class='text-center'>Shift : {{ $request->shift }}</th>
                              </tr>
                          </thead>
                      </table>
                  </div>
              </div>
  
              <br>

              <div class='row d-flex justify-content-center text-dark'>

                <div class="col-4 table-responsive">

                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Program Accumulation</h5>
                        <tr>
                            <th bgcolor="pink">Program</th>
                            <th bgcolor="pink">Rend<sub>(EK)</sub></th>
                            <th bgcolor="pink">Rend<sub>(EB)</sub></th>
                            <th bgcolor="pink">Rend<sub>(GD)</sub></th>
                            <th bgcolor="pink">Rend<sub>(All)</sub></th>
                        </tr>
                        @foreach($program_accumulation as $program_accumulation)
                        <tr>
                            <td>{{ $program_accumulation->name }}</td>
                            <td>{{ $program_accumulation->yield_ek }}</td>
                            <td>{{ $program_accumulation->yield_eb }}</td>
                            <td>{{ $program_accumulation->yield_gd }}</td>
                            <td>{{ $program_accumulation->yield_all }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Global Accumulation</h5>
                        <tr>
                            <th bgcolor="pink">Vehicle</th>
                            <th bgcolor="pink">Rit</th>
                            <th bgcolor="pink">Brix</th>
                            <th bgcolor="pink">Pol</th>
                            <th bgcolor="pink">R</th>
                        </tr>
                        <tr>
                            <td>Engkel Kecil</td>
                            <td>{{ $global_accumulation['rit_engkel_kecil'] }}</td>
                            <td>{{ $global_accumulation['percent_brix_engkel_kecil'] }}</td>
                            <td>{{ $global_accumulation['percent_pol_engkel_kecil'] }}</td>
                            <td>{{ $global_accumulation['yield_engkel_kecil'] }}</td>
                        </tr>
                        <tr>
                            <td>Engkel Besar</td>
                            <td>{{ $global_accumulation['rit_engkel_besar'] }}</td>
                            <td>{{ $global_accumulation['percent_brix_engkel_besar'] }}</td>
                            <td>{{ $global_accumulation['percent_pol_engkel_besar'] }}</td>
                            <td>{{ $global_accumulation['yield_engkel_besar'] }}</td>
                        </tr>
                        <tr>
                            <td>Gandeng</td>
                            <td>{{ $global_accumulation['rit_gandeng'] }}</td>
                            <td>{{ $global_accumulation['percent_brix_gandeng'] }}</td>
                            <td>{{ $global_accumulation['percent_pol_gandeng'] }}</td>
                            <td>{{ $global_accumulation['yield_gandeng'] }}</td>
                        </tr>
                        <tr>
                            <td>All</td>
                            <td>{{ $global_accumulation['rit_all'] }}</td>
                            <td>{{ $global_accumulation['percent_brix_all'] }}</td>
                            <td>{{ $global_accumulation['percent_pol_all'] }}</td>
                            <td>{{ $global_accumulation['yield_all'] }}</td>
                        </tr>
                    </table>
                    <br>

                </div>

                <div class="col-3 table-responsive">
                    
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Pos Accumulation</h5>
                        <tr>
                            <th bgcolor="pink">Pos</th>
                            <th bgcolor="pink">Rend<sub>(EK)</sub></th>
                            <th bgcolor="pink">Rend<sub>(EB)</sub></th>
                            <th bgcolor="pink">Rend<sub>(GD)</sub></th>
                            <th bgcolor="pink">Rend<sub>(All)</sub></th>
                        </tr>
                        @foreach($pos_accumulation as $pos_accumulation)
                        <tr>
                            <td>{{ $pos_accumulation->name }}</td>
                            <td>{{ $pos_accumulation->yield_ek }}</td>
                            <td>{{ $pos_accumulation->yield_eb }}</td>
                            <td>{{ $pos_accumulation->yield_gd }}</td>
                            <td>{{ $pos_accumulation->yield_all }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <br>

                </div>

                <div class="col-4 table-responsive">
                    
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>KUD Accumulation</h5>
                        <tr>
                            <th bgcolor="pink">KUD</th>
                            <th bgcolor="pink">Rend<sub>(EK)</sub></th>
                            <th bgcolor="pink">Rend<sub>(EB)</sub></th>
                            <th bgcolor="pink">Rend<sub>(GD)</sub></th>
                            <th bgcolor="pink">Rend<sub>(All)</sub></th>
                        </tr>
                        @foreach($kud_accumulation as $kud_accumulation)
                        <tr>
                            <td>{{ $kud_accumulation->name }}</td>
                            <td>{{ $kud_accumulation->yield_ek }}</td>
                            <td>{{ $kud_accumulation->yield_eb }}</td>
                            <td>{{ $kud_accumulation->yield_gd }}</td>
                            <td>{{ $kud_accumulation->yield_all }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <br>

                </div>

            </div>

            <div class='row d-flex justify-content-center text-dark'>
                <div class="col-11 table-responsive">
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>All Record</h5>
                        <tr bgcolor="pink">
                            <th>#</th>
                            <th>ID</th>
                            <th>Time</th>
                            <th>No Core</th>
                            <th>Barcode</th>
                            <th>Vehicle</th>
                            <th>Register</th>
                            <th>KUD</th>
                            <th>Pos</th>
                            <th>Program</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Rendemen</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->spot }}</td>
                            <td>{{ $data->barcode }}</td>
                            <td>{{ $data->vehicle }}</td>
                            <td>{{ $data->register }}</td>
                            <td>{{ $data->cooperative }}</td>
                            <td>{{ $data->outpost }}</td>
                            <td>{{ $data->program }}</td>
                            <td>{{ $data->percent_brix }}</td>
                            <td>{{ $data->percent_pol }}</td>
                            <td>{{ $data->yield }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <br>

                </div>
            </div>
			
			<br><br>

		  </section>
		</div>

		<!--<script type="text/javascript"> 
		  window.addEventListener("load", window.print());
		</script>-->
	</body>
</html>