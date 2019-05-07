<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Jenjang</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($data as $d){?>
					<tr>
						<th><?php echo $d["id_jenjang"]?></th>
						<th><?php echo $d["nama_jenjang"]?></th>
						<th>
						<?php
							$dropdown["id"] = "menu".$d["id_jenjang"];
							$dropdown["href"] = array(
								"Edit" => base_url()."data-master/jenjang/edit_jenjang/".$d["id_jenjang"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?>
						</th>
					</tr>
						<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
