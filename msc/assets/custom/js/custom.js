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

});
