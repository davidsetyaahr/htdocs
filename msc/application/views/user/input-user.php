<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTable_wrapper">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Pengguna</th>
						<th>Hak Akses</th>
						<th>username</th>
					</tr>
				</thead>
				<?php foreach($user as $data){?>
				<tbody>
					<tr>
						<th><?php echo $data["id_user"]?></th>
						<th><?php echo $data["nama_pengguna"]?></th>
						<th><?php echo $data["hak_akses"]?></th>
						<th><?php echo $data["username"]?></th>
					</tr>
				</tbody>
						<?php }?>
			</table>
		</div>
	</div>
</div>
