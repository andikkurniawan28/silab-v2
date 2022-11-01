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

        @php
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Taksasi.xls");
        @endphp

        <table width="100%" class="table table-sm table-bordered">
            @for($i = 0; $i < count($vars); $i++)
            <tr>
                <td>{{ $vars[$i] }}</td>
                <td>{{ $request->{$vars[$i]} }}</td>
            </tr>
            @endfor
        </table>

	</body>
</html>