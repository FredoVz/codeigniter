<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<table>
		<tr>
			<th>NO</th>
			<th>NAMA MAHASISWA</th>
			<th>NIM</th>
			<th>TANGGAL LAHIR</th>
			<th>JURUSAN</th>
			<th>ALAMAT</th>
			<th>EMAIL</th>
			<th>NO. TELEPON</th>
		</tr>

		<?php
		$no = 1;
		foreach ($mahasiswa as $mahasiswa) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $mahasiswa->nama ?></td>
			<td><?php echo $mahasiswa->nim ?></td>
			<td><?php echo $mahasiswa->tanggal_lahir ?></td>
			<td><?php echo $mahasiswa->jurusan ?></td>
			<td><?php echo $mahasiswa->alamat ?></td>
			<td><?php echo $mahasiswa->email ?></td>
			<td><?php echo $mahasiswa->no_telp ?></td>
		</tr>

	<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>