<div class="content-wrapper">
	<section class="content">
		<?php foreach($mahasiswa as $mahasiswa) { ?>

		<form action="<?php echo base_url().'mahasiswa/update'; ?>" method="post">

		<div class="form-group">
			<label>Nama Mahasiswa</label>
			<input type="hidden" name="id" class="form-control" value="<?php echo $mahasiswa->id ?>">
			<input type="text" name="nama" class="form-control" value="<?php echo $mahasiswa->nama ?>">
		</div>
		<div class="form-group">
			<label>NIM</label>
			<input type="number" name="nim" class="form-control" value="<?php echo $mahasiswa->nim ?>">
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $mahasiswa->tanggal_lahir ?>">
		</div>
		<div class="form-group">
			<label>Jurusan</label>
			<select name="jurusan" class="form-control" value="<?php echo $mahasiswa->jurusan ?>">
			<option <?php if ($mahasiswa->jurusan == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>    
            <option <?php if ($mahasiswa->jurusan == 'Teknik Informasi') echo 'selected'; ?>>Teknik Informasi</option>    
            <option <?php if ($mahasiswa->jurusan == 'Teknik Komputer') echo 'selected'; ?>>Teknik Komputer</option>
            <option <?php if ($mahasiswa->jurusan == 'Manajemen Bisnis') echo 'selected'; ?>>Manajemen Bisnis</option>
            <option <?php if ($mahasiswa->jurusan == 'Manajemen Perhotelan') echo 'selected'; ?>>Manajemen Perhotelan</option>
            </select>
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $mahasiswa->alamat ?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" value="<?php echo $mahasiswa->email ?>">
		</div>
		<div class="form-group">
			<label>No. Telepon</label>
			<input type="number" name="no_telp" class="form-control" value="<?php echo $mahasiswa->no_telp ?>">
		</div>

		<button type="reset" class="btn btn-danger">Reset</button>
		<button type="submit" class="btn btn-primary">Submit</button>
		
		</form>
	<?php } ?>
	</section>
</div>