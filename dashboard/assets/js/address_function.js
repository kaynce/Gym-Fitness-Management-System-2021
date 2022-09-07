
	$(document).ready(function(){
		// region dependent ajax
		$("#region").on("change",function(){
			var regionID = $(this).val();
			if (regionID) {
				$.ajax({
					url :"../dashboard/client_ajax.php?action=address_action",
					type:"POST",
					cache:false,
					data:{regionID:regionID},
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
			var provinceid = $(this).val();
			if (provinceid) {
				$.ajax({
					url :"../dashboard/client_ajax.php?action=address_action",
					type:"POST",
					cache:false,
					data:{provinceid:provinceid},
					success:function(data){
						$("#city").html(data);
					}
				});
			}else{
            	$('#city').html('<option value=""></option>');
			} 
		});
	});
