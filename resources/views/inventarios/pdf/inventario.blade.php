<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Tahoma,Verdana,Segoe,sans-serif; 
  font-size: 9px;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 7px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}
</style>
</head>
<body>
<img src="{{ public_path('images/fimaca_logo.jpg') }}" alt="" />
<div align="center" style="font-family: Tahoma,Verdana,Segoe,sans-serif; font-weight: bold; font-size: 11px">LISTADO DE EQUIPOS ELECTRONICOS</div>
<table id="customers" align="center">
	<thead align="center">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">NOMBRE DEL EQUIPO</th>
			<th scope="col" width="150px">SERIAL</th>
			<th scope="col" width="75px">MARCA</th>
			<th scope="col" width="115px">MODELO</th>
			<th scope="col" width="85px">TIPO</th>
			<th scope="col" width="100px">UBICACIÓN O DPTO.</th>
			<th scope="col" width="100px">FECHA DE REGISTRO</th>
		</tr>
	</thead>
	<tbody>
	@foreach($inventario as $inventarios)
		<tr align="center" style="font-size:10px">
			<td align="center">{{ $inventarios->id }}</td>
			<td align="center">{{ $inventarios->nombre_equipo }}</td>
			<td>{{ $inventarios->serial }}</td>
			<td>{{ $inventarios->nombre_marca }}</td>
			<td>{{ $inventarios->modelo }}</td>
			<td>{{ $inventarios->nombre_tipo }}</td>
			<td>{{ $inventarios->nombre_ubicacion }}</td>
			<td>{{ $inventarios->fecha_registro }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
</body>
</html>