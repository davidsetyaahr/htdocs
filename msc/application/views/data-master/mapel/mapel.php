<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
                <thead>
					<tr>
						<th>#</th>
						<th>Nama Mapel</th>
						<th>Jenjang</th>
						<th>Opsi</th>
					</tr>
				</thead>
                <?php 
                    foreach($data as $t){
                ?>
				<tbody>
					<tr>
						<th><?php echo $t["id_mapel"]?></th>
						<th><?php echo $t["mata_pelajaran"]?></th>
						<th><?php echo $t["nama_jenjang"]?></th>
						<th><?php
							$dropdown["id"] = "menu".$t["id_mapel"];
							$dropdown["href"] = array(
								"Edit" => base_url()."data-master/mapel/edit-mapel/".$t["id_mapel"],
							);
							$this->load->view("common/dropdown", $dropdown);
						?></th>
					</tr>
				</tbody>
                <?php   } ?>
			</table>
		</div>
	</div>
</div>