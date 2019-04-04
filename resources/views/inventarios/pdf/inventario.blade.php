<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div align="center" style='font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;'><h3>Listado de Inventario</h3></div>
<table id="customers" align="center">
	<thead align="center">
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Nombre del equipo</th>
			<th scope="col">Serial</th>
			<th scope="col">Marca</th>
			<th scope="col">Modelo</th>
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
		</tr>
	@endforeach
	</tbody>
</table>
</body>
</html>