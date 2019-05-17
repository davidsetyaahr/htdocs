<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode group</th>
						<th>Nama Group</th>
						<th>Koordinator</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<?php foreach($data as $data){?>
				<tbody>
					<tr>
						<th><?php echo $data["kode_group"]?></th>
						<th><?php echo $data["nama_group"]?></th>
						<th><?php echo $data["nama_tentor"]?></th>
						<th>
						<?php
							$dropdown["id"] = "menu".$data["kode_group"];
							$dropdown["href"] = array(
								"Edit" => base_url()."data-master/group/edit_group/".$data["kode_group"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?>
						</th>
					</tr>
				</tbody>
						<?php }?>
			</table>
		</div>
	</div>
</div>
