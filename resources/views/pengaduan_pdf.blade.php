<!DOCTYPE html>
<html>

<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<style type="text/css">
		table tr td,
		table tr th {
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Masyarakat</h4>
		</h5>
	</center>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Foto</th>
				<th>laporan</th>
				<th>Status</th>
				<th>Response</th>
			</tr>
		</thead>
		<tbody>
			@php $i=0 @endphp
			@foreach ($pengaduan as $datas)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $datas->nama }}</td>
				<td>
					{{$datas->photo }}
				</td>
				<td>{{ $datas->laporan }}</td>
				<td>{{ $datas->status }}</td>
				<td>{{ $datas->response }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>

