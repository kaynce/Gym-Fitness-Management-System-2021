
	$(document).ready(function(){
		// region dependent ajax
		$("#region").on("change",function(){
			var region_id = $(this).val();
			if (region_id) {
				$.ajax({
					url :"ajax.php?action=address_action",
					type:"POST",
					cache:false,
					data:{region_id:region_id},
					success:function(data){
						$("#province").html(data);
						// $('#city').html('<option value="">Select city</option>');
					}
				});
			}else{
				$('#province').html('<option value=""></option>');
            	$('#city').html('<option value=""></option>');
			}
		});

		// province dependent ajax
		$("#province").on("change", function(){
			var province_id = $(this).val();
			if (province_id) {
				$.ajax({
					url :"ajax.php?action=address_action",
					type:"POST",
					cache:false,
					data:{province_id:province_id},
					success:function(data){
						$("#city").html(data);
					}
				});
			}else{
            	$('#city').html('<option value=""></option>');
			} 
		});
	});
