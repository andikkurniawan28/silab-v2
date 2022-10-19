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
        <div class="wrapper">

            <section class="invoice">
            
            <br></br>
  
              <div class="row d-flex justify-content-center text-dark">
                  <div class="col-10 table-responsive">
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
                                          @endif</STRONG></H4>
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

                <div class="col-5 table-responsive">
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Raw Sugar & Gula in Proses</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>IU</th>
                            <th>Air</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>HK</th>
                            <th>SO<sub>2</sub></th>
                            <th>BJB</th>
                        </tr>
                        @for($i=0; $i < count($data[0]['material']); $i++)
                        <tr>
                            <td>{{ $data[0]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[0]['material'][$i]['icumsa'] }}</td>
                            <td>{{ $data[0]['material'][$i]['water'] }}</td>
                            <td>{{ $data[0]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[0]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[0]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[0]['material'][$i]['sulphur'] }}</td>
                            <td>{{ $data[0]['material'][$i]['diameter'] }}</td>
                        </tr>
                        @endfor
                        @for($i=0; $i < count($data[7]['material']); $i++)
                        <tr>
                            <td>{{ $data[7]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[7]['material'][$i]['icumsa'] }}</td>
                            <td>{{ $data[7]['material'][$i]['water'] }}</td>
                            <td>{{ $data[7]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[7]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[7]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[7]['material'][$i]['sulphur'] }}</td>
                            <td>{{ $data[7]['material'][$i]['diameter'] }}</td>
                        </tr>
                        @endfor
                    </table>

                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Masakan</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>HK</th>
                            <th>IU</th>
                        </tr>
                        @for($i=0; $i < count($data[5]['material']); $i++)
                        <tr>
                            <td>{{ $data[5]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[5]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[5]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[5]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[5]['material'][$i]['icumsa'] }}</td>
                        </tr>
                        @endfor
                    </table>
                    
                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Stroop</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>HK</th>
                            <th>IU</th>
                        </tr>
                        @for($i=0; $i < count($data[6]['material']); $i++)
                        <tr>
                            <td>{{ $data[6]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[6]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[6]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[6]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[6]['material'][$i]['icumsa'] }}</td>
                        </tr>
                        @endfor
                    </table>

                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Tangki Tetes</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>Brix</th>
                            <th>TSAI</th>
                            <th>Optical Density</th>
                        </tr>
                        @for($i=0; $i < count($data[8]['material']); $i++)
                        <tr>
                            <td>{{ $data[8]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[8]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[8]['material'][$i]['tsai'] }}</td>
                            <td>{{ $data[8]['material'][$i]['optical_density'] }}</td>
                        </tr>
                        @endfor
                    </table>
  
                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Ketel</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>TDS</th>
                            <th>pH</th>
                            <th>Sadah</th>
                            <th>Phospat</th>
                        </tr>
                        @for($i=0; $i < count($data[9]['material']); $i++)
                        <tr>
                            <td>{{ $data[9]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[9]['material'][$i]['tds'] }}</td>
                            <td>{{ $data[9]['material'][$i]['ph_boiler'] }}</td>
                            <td>{{ $data[9]['material'][$i]['hardness'] }}</td>
                            <td>{{ $data[9]['material'][$i]['phospate'] }}</td>
                        </tr>
                        @endfor
                    </table>

                </div>
                
                <div class="col-5 table-responsive">

                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Gilingan</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Koreksi</th>
                            <th>HK</th>
                            <th>ZK</th>
                            <th>Air</th>
                            <th>Sabut</th>
                            <th>PI</th>
                            <th>R</th>
                        </tr>
                        @for($i=0; $i < count($data[1]['material']); $i++)
                        <tr>
                            <td>{{ $data[1]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[1]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[1]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[1]['material'][$i]['corrected_pol'] }}</td>
                            <td>{{ $data[1]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[1]['material'][$i]['dry'] }}</td>
                            <td>{{ $data[1]['material'][$i]['water'] }}</td>
                            <td>{{ $data[1]['material'][$i]['fiber'] }}</td>
                            <td>{{ $data[1]['material'][$i]['preparation_index'] }}</td>
                            <td>{{ $data[1]['material'][$i]['yield'] }}</td>
                        </tr>
                        @endfor
                    </table>

                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Pemurnian</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>HK</th>
                            <th>IU</th>
                            <th>CaO</th>
                            <th>pH</th>
                            <th>Turb</th>
                            <th>Koreksi</th>
                            <th>Air</th>
                            <th>Kapur</th>
                        </tr>
                        @for($i=0; $i < count($data[2]['material']); $i++)
                        <tr>
                            <td>{{ $data[2]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[2]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[2]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[2]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[2]['material'][$i]['icumsa'] }}</td>
                            <td>{{ $data[2]['material'][$i]['cao'] }}</td>
                            <td>{{ $data[2]['material'][$i]['ph'] }}</td>
                            <td>{{ $data[2]['material'][$i]['turbidity'] }}</td>
                            <td>{{ $data[2]['material'][$i]['corrected_pol'] }}</td>
                            <td>{{ $data[2]['material'][$i]['water'] }}</td>
                            <td>{{ $data[2]['material'][$i]['calcium'] }}</td>
                        </tr>
                        @endfor
                    </table>
                    
                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Penguapan</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>HK</th>
                            <th>IU</th>
                            <th>CaO</th>
                            <th>pH</th>
                            <th>Turb</th>
                        </tr>
                        @for($i=0; $i < count($data[3]['material']); $i++)
                        <tr>
                            <td>{{ $data[3]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[3]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[3]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[3]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[3]['material'][$i]['icumsa'] }}</td>
                            <td>{{ $data[3]['material'][$i]['cao'] }}</td>
                            <td>{{ $data[3]['material'][$i]['ph'] }}</td>
                            <td>{{ $data[3]['material'][$i]['turbidity'] }}</td>
                        </tr>
                        @endfor
                    </table>

                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>DRK</h5>
                        <tr bgcolor="pink">
                            <th>Material</th>
                            <th>Brix</th>
                            <th>Pol</th>
                            <th>Z</th>
                            <th>HK</th>
                            <th>IU</th>
                            <th>CaO</th>
                            <th>pH</th>
                            <th>Turb</th>
                            <th>Air</th>
                        </tr>
                        @for($i=0; $i < count($data[4]['material']); $i++)
                        <tr>
                            <td>{{ $data[4]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[4]['material'][$i]['percent_brix'] }}</td>
                            <td>{{ $data[4]['material'][$i]['percent_pol'] }}</td>
                            <td>{{ $data[4]['material'][$i]['pol'] }}</td>
                            <td>{{ $data[4]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[4]['material'][$i]['icumsa'] }}</td>
                            <td>{{ $data[4]['material'][$i]['cao'] }}</td>
                            <td>{{ $data[4]['material'][$i]['ph'] }}</td>
                            <td>{{ $data[4]['material'][$i]['turbidity'] }}</td>
                            <td>{{ $data[4]['material'][$i]['moisture'] }}</td>
                        </tr>
                        @endfor
                    </table>