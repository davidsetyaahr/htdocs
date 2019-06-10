$(document).ready(function () {
	
	//datatable
	window.$('#lkbm').DataTable();
	  
	
	$(".datepicker").datepicker({
		format : "yyyy-mm-dd",
	}).datepicker("setDate", new Date());
	
	$(".getId").click(function(e){
		e.preventDefault()
		var thisModal = $(this).data("modal");
		var target = $(this).data("target")
		var thisVal = $(this).data("value")
		$(target+" option").remove()
		$(target).append("<option>"+thisVal+"</option>")
		$(thisModal).modal("hide")
	});

	var x = 1;
    $(".addField").click(function(e){
		e.preventDefault();
        if(x < 5){
			$(".place").append("<div class='row' id='place"+x+"'><div class='col-lg-6'><br><input type='file' name='lampiran"+x+"' class='form-control'></div><div class='col-lg-5'><br><input type='text' name='caption[]' class='form-control'></div><div class='col-lg-1'><br><a href='' class='btn btn-danger btn-sm remove' data-id='#place"+x+"'>Hapus</a></div></div>")
			x++;
			$(".remove").click(function(e){
				e.preventDefault()
				var id = $(this).data("id")
				$(id).remove()
				x--
			})
		}
	});

	    var m = 1;
        $(".addMapel").click(function(e){
			e.preventDefault();
			var key = $(this).data("key")
			$.ajax({
				url : "http://localhost/projek-kelompok/msc/nilai_siswa/show_mapel"
			})
/*             if(m < 12){
				for(var i=0; i<mapel.length; ++i){
                $(".mapelAdd").append(`
					<div class="row">      
						<div class="col-lg-4">
							<label for="">Mapel</label>
							<select name="id_mapel[]" id="" class="form-control">
								<option value="">---Pilih Mapel---</option>
								<option value="`+i.id_mapel+`">`+i.mata_pelajaran+`</option>
							</select>
						</div>
						<div class="col-lg-4">
							<label for="">Nilai</label>
							<input type="text" name="" id="" class="form-control" value="">
						</div>
						<div class="col-lg-4">
							<label for="">Catatan</label>
							<textarea name="" id="" class="form-control"></textarea>
						</div>    
					</div>  	
				`)
				}
            m++;
            }
 */        });	

	if($("#chadir").length==1){
		var hadir = parseInt($("#chadir").html());
		var tidakHadir = 0;
	}

	$(".tidak-hadir a").click(function(e){
		e.preventDefault()
		var key = $(this).data("key")
		var capt = $(this).data("capt")
		var bg = $(this).data("class")
		var btnBg = $("#tidak-hadir"+key).attr("data-bg")
		if($("#badge"+key+" h5 b").length==0){
			$("#badge"+key).html("<h5><b></b></h5>")
		}
		$("#badge"+key+" h5 b").attr("class","")
		$("#badge"+key+" h5 b").addClass("badge bg-"+bg+" text-white")
		$("#badge"+key+" h5 b").html(capt)
		$("#hadir"+key).removeClass("btn-success")
		$("#hadir"+key).addClass("btn-default")
		$("#check"+key).empty()
		$("#tidak-hadir"+key).removeClass(btnBg)
		$("#tidak-hadir"+key).addClass("btn-"+bg)
		$("#tidak-hadir"+key).attr("data-bg","btn-"+bg)
		$("#absen"+key).val(capt)
		hadir--
		tidakHadir++
		$("#chadir").html(hadir)
		$("#ctidak-hadir").html(tidakHadir)
	})
	
	$(".hadir").click(function(e){
		e.preventDefault()
		var key = $(this).data("key")
		var removeBg = $("#tidak-hadir"+key).attr("data-bg")
		$(this).removeClass("btn-default")
		$(this).addClass("btn-success")
		$("#tidak-hadir"+key).removeClass(removeBg)
		$("#tidak-hadir"+key).addClass("btn-default")
		$("#tidak-hadir"+key).attr("data-bg","btn-default")
		$("#badge"+key).empty()
		$("#check"+key).empty()
		$("#check"+key).html("<i class='fas fa-check-circle text-success'></i>")
		$("#absen"+key).val("Hadir")
		hadir++
		tidakHadir--
		$("#chadir").html(hadir)
		$("#ctidak-hadir").html(tidakHadir)
	})
	
	$('#id_kepala').change(function () {
		$('#basic-addon1').html($('#id_kepala').val());
	});
	
	$('#kode_induk').change(function () {
		$('#basic-addon2').html($('#kode_induk').val());
	});

	if ($('#id_kepala').val() != '') {
		$('#basic-addon1').html($('#id_kepala').val());
	}

	if ($('#kode_induk').val() != '') {
		$('#basic-addon2').html($('#kode_induk').val());
	}

	$('#id_kategorisp').change(function () {
		$('#basic-addon3').html('SP-' + $('#id_kategorisp option:selected').html() + '-');
	});

	if ($('#id_kategorisp').val() != '') {
		$('#basic-addon3').html('SP-' + $('#id_kategorisp option:selected').html() + '-');
	}

	$('.coba').click(function(e) {
		e.preventDefault();
		$.ajax({
			url:'load_functions',
			dataType:"JSON",
			success:function(params) {
				console.log(params);
				// let id = $('.hai');
				// if (id != null) {
					// $.each(params.mapel,function(key,val) {
					// 	console.log(val.id_mapel);
					// 	$('.hai').append(val.id_mapel+,``)
					// })
					for (let index = 0; index < params.mapel.length; index++) {
						// const element = array[index];
						$('.hai').append(params.mapel[index]['mata_pelajaran']+`<br>`)
						
					}
				// }
			}
		})
	})
});
