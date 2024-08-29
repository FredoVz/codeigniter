<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<!-- ?php print_r($mahasiswa); ? -->

	<table border="1px solid black">
		<tr>
			<th>NAMA MAHASISWA</th>
			<th>NIM</th>
			<th>ALAMAT</th>
		</tr>

		<?php foreach ($mahasiswa as $mahasiswa) : ?>

		<tr>
			<td><?php echo $mahasiswa['nama']; ?></td>
			<td><?php echo $mahasiswa['nim']; ?></td>
			<td><?php echo $mahasiswa['alamat']; ?></td>
		</tr>

		<?php endforeach; ?>
	</table>
</body>
</html>