	<div class="container">
	<h1>Membuat Form Validation dengan CodeIgniter</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('form/aksi'); ?>
		<label>Nama</label><br/>
		<input type="text" class="form-control" name="nama"><br/>
		<label>Email</label><br/>
		<input type="text" class="form-control" name="email"><br/>
		<label>Konfirmasi Email</label><br/>
		<input type="text" class="form-control" name="konfir_email"><br/>
		<input type="submit" value="Simpan" class="btn btn-success">
	</form>
	</div>
