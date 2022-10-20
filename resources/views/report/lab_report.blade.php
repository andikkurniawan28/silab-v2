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
                        <h5>Raw Sugar & Gula</h5>
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
                            <td>{{ $data[0]['material'][$i]['moisture'] }}</td>
                            <td>{{ 100 - $data[0]['material'][$i]['moisture'] }}</td>
                            <td>{{ number_format(($data[0]['material'][$i]['purity'] / 100) * (100 - $data[0]['material'][$i]['moisture']), 2) }}</td>
                            <td>{{ $data[0]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[0]['material'][$i]['sulphur'] }}</td>
                            <td>{{ $data[0]['material'][$i]['diameter'] }}</td>
                        </tr>
                        @endfor
                        @for($i=0; $i < count($data[7]['material']); $i++)
                        <tr>
                            <td>{{ $data[7]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[7]['material'][$i]['icumsa'] }}</td>
                            <td>{{ $data[7]['material'][$i]['moisture'] }}</td>
                            <td>{{ 100 - $data[7]['material'][$i]['moisture'] }}</td>
                            <td>{{ number_format(($data[7]['material'][$i]['purity'] / 100) * (100 - $data[7]['material'][$i]['moisture']), 2) }}</td>
                            <td>{{ $data[7]['material'][$i]['purity'] }}</td>
                            <td>{{ $data[7]['material'][$i]['sulphur'] }}</td>
                            <td>{{ $data[7]['material'][$i]['diameter'] }}</td>
                        </tr>
                        @endfor
                        @for($i=0; $i < count($data[10]['material']); $i++)
                        <tr>
                            <td>{{ $data[10]['material'][$i]['material_name'] }}</td>
                            <td>{{ $data[10]['material'][$i]['icumsa'] }}</td>
                            <td>{{ $data[10]['material'][$i]['moisture'] }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                    
                    <br>
                    <table width='100%' border='1' cellpadding='5' class="">
                        <h5>Chemical</h5>
                        <tr bgcolor="pink">
                            <th>Chemical</th>
                            <th>Qty</th>
                        </tr>
                        <tr>
                            <td>Kapur</td>
                            <td>{{ $chemical['kapur'] }}</td>
                        </tr>
                        <tr>
                            <td>Belerang</td>
                            <td>{{ $chemical['belerang'] }}</td>
                        </tr>
                        <tr>
                            <td>Flocculant</td>
                            <td>{{ $chemical['floc'] }}</td>
                        </tr>
                        <tr>
                            <td>NaOH</td>
                            <td>{{ $chemical['naoh'] }}</td>
                        </tr>
                        <tr>
                            <td>B894</td>
                            <td>{{ $chemical['b894'] }}</td>
                        </tr>
                        <tr>
                            <td>B895</td>
                            <td>{{ $chemical['b895'] }}</td>
                        </tr>
                        <tr>
                            <td>B210</td>
                            <td>{{ $chemical['b210'] }}</td>
                        </tr>
                        <tr>
                            <td>H<sub>3</sub>PO<sub>4</sub></td>
                            <td>{{ $chemical['asam_phospat'] }}</td>
                        </tr>
                        <tr>
                            <td>Blotong</td>
                            <td>{{ $chemical['blotong'] }}</td>
                        </tr>
                    </table>

                </div>

            </div>
			
			<br>
            
            <div class='row d-flex justify-content-center text-dark'>

                <div class="col-10 table-responsive">
                    <table width='100%' border='1' cellpadding='5' class="text-xs">
                        <h5>Keliling</h5>
                        <tr bgcolor="pink">
                            <th colspan="23">Tekanan</th>
                        </tr>
                        <tr>
                            @for($i=1; $i<=2; $i++)
                            <th>Pre-Evap{{ $i }}</th>
                            @endfor
                            @for($i=1; $i<=7; $i++)
                            <th>Evap{{ $i }}</th>
                            @endfor
                            @for($i=1; $i<=14; $i++)
                            <th>Pan{{ $i }}</th>
                            @endfor
                        </tr>
                        <tr>
                            @for($i=1; $i<=2; $i++)
                                @switch($i)
                                    @case(1)
                                    <td>{{ $keliling['tek_pe1'] }}</td>
                                    @break
                                    @case(2)
                                    <td>{{ $keliling['tek_pe2'] }}</td>
                                    @break
                                @endswitch
                            @endfor
                            @for($i=1; $i<=7; $i++)
                                @switch($i)
                                    @case(1)
                                    <td>{{ $keliling['tek_evap1'] }}</td>
                                    @break
                                    @case(2)
                                    <td>{{ $keliling['tek_evap2'] }}</td>
                                    @break
                                    @case(3)
                                    <td>{{ $keliling['tek_evap3'] }}</td>
                                    @break
                                    @case(4)
                                    <td>{{ $keliling['tek_evap4'] }}</td>
                                    @break
                                    @case(5)
                                    <td>{{ $keliling['tek_evap5'] }}</td>
                                    @break
                                    @case(6)
                                    <td>{{ $keliling['tek_evap6'] }}</td>
                                    @break
                                    @case(7)
                                    <td>{{ $keliling['tek_evap7'] }}</td>
                                    @break
                                @endswitch
                            @endfor
                            @for($i=1; $i<=14; $i++)
                                @switch($i)
                                    @case(1)
                                    <td>{{ $keliling['tek_pan1'] }}</td>
                                    @break
                                    @case(2)
                                    <td>{{ $keliling['tek_pan2'] }}</td>
                                    @break
                                    @case(3)
                                    <td>{{ $keliling['tek_pan3'] }}</td>
                                    @break
                                    @case(4)
                                    <td>{{ $keliling['tek_pan4'] }}</td>
                                    @break
                                    @case(5)
                                    <td>{{ $keliling['tek_pan5'] }}</td>
                                    @break
                                    @case(6)
                                    <td>{{ $keliling['tek_pan6'] }}</td>
                                    @break
                                    @case(7)
                                    <td>{{ $keliling['tek_pan7'] }}</td>
                                    @break
                                    @case(8)
                                    <td>{{ $keliling['tek_pan8'] }}</td>
                                    @break
                                    @case(9)
                                    <td>{{ $keliling['tek_pan9'] }}</td>
                                    @break
                                    @case(10)
                                    <td>{{ $keliling['tek_pan10'] }}</td>
                                    @break
                                    @case(11)
                                    <td>{{ $keliling['tek_pan11'] }}</td>
                                    @break
                                    @case(12)
                                    <td>{{ $keliling['tek_pan12'] }}</td>
                                    @break
                                    @case(13)
                                    <td>{{ $keliling['tek_pan13'] }}</td>
                                    @break
                                    @case(14)
                                    <td>{{ $keliling['tek_pan14'] }}</td>
                                    @break
                                @endswitch
                            @endfor
                        </tr>
                        <tr>
                            <th colspan="18">Suhu</th>
                        </tr>
                        <tr>
                            @for($i=1; $i<=2; $i++)
                            <th>Pre-Evap{{ $i }}</th>
                            @endfor
                            @for($i=1; $i<=7; $i++)
                            <th>Evap{{ $i }}</th>
                            @endfor
                            @for($i=1; $i<=3; $i++)
                            <th>Heater{{ $i }}</th>
                            @endfor
                            <th>Vakum</th>
                            <th>Injeksi</th>
                            <th>Terjun</th>
                            <th>Baru</th>
                            <th>Bekas</th>
                            <th>3Ato</th>
                        </tr>
                        <tr>
                            @for($i=1; $i<=2; $i++)
                                @switch($i)
                                    @case(1)
                                    <td>{{ $keliling['suhu_pe1'] }}</td>
                                    @break
                                    @case(2)
                                    <td>{{ $keliling['suhu_pe2'] }}</td>
                                    @break
                                @endswitch
                            @endfor
                            @for($i=1; $i<=7; $i++)
                                @switch($i)
                                    @case(1)
                                    <td>{{ $keliling['suhu_evap1'] }}</td>
                                    @break
                                    @case(2)
                                    <td>{{ $keliling['suhu_evap2'] }}</td>
                                    @break
                                    @case(3)
                                    <td>{{ $keliling['suhu_evap3'] }}</td>
                                    @break
                                    @case(4)
                                    <td>{{ $keliling['suhu_evap4'] }}</td>
                                    @break
                                    @case(5)
                                    <td>{{ $keliling['suhu_evap5'] }}</td>
                                    @break
                                    @case(6)
                                    <td>{{ $keliling['suhu_evap6'] }}</td>
                                    @break
                                    @case(7)
                                    <td>{{ $keliling['suhu_evap7'] }}</td>
                                    @break
                                @endswitch
                            @endfor
                            @for($i=1; $i<=3; $i++)
                                @switch($i)
                                    @case(1)
                                    <td>{{ $keliling['suhu_heater1'] }}</td>
                                    @break
                                    @case(2)
                                    <td>{{ $keliling['suhu_heater2'] }}</td>
                                    @break
                                    @case(3)
                                    <td>{{ $keliling['suhu_heater3'] }}</td>
                                    @break
                                @endswitch
                            @endfor
                            <td>{{ $keliling['tek_vakum'] }}</td>
                            <td>{{ $keliling['suhu_air_injeksi'] }}</td>
                            <td>{{ $keliling['suhu_air_terjun'] }}</td>
                            <td>{{ $keliling['uap_baru'] }}</td>
                            <td>{{ $keliling['uap_bekas'] }}</td>
                            <td>{{ $keliling['uap_3ato'] }}</td>
                        </tr>

                    </table>
                </div>

            </div>
            
            @if($request->shift != 0)
            <br>
			<div class='row d-flex justify-content-center text-dark'>
                <div class="col-10 table-responsive">
                    <table width='100%' border='1' cellpadding='5' class="text-center">
                        <tr bgcolor="pink">
                            <th>Mandor Lab</th>
                            <th>Katim QC</th>
                            <th>Chemiker</th>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                            <td>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                            <td>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif
			
			<br><br>

		  </section>
		</div>

		<!--<script type="text/javascript"> 
		  window.addEventListener("load", window.print());
		</script>-->
	</body>
</html>