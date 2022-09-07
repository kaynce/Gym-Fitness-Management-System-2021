
    	//For submit_renew check file size
document.getElementById("submit_renew").addEventListener("click", function showFileSize() {

	    // (Can't use `typeof FileReader === "function"` because apparently it
	    // comes back as "object" on some browsers. So just see if it's there
	    // at all.)
	    if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
	        Swal.fire({
		        		icon:'warning',
		        		title:'The file API is not supported on this browser yet'
		        	})
	        return;
	    }

	    if($("#screenshot_id_file").length == 0) {
		  //if screenshot id file doesn't exist
		  	let input_payment_file = document.getElementById('screenshot_payment_file');
		    if (!input_payment_file.files) { // This is VERY unlikely, browser support is near-universal
		         //alert("This browser doesn't seem to support the `files` property of file inputs.");
		          Swal.fire({
		        		icon:'warning',
		        		title:'This browser does not seem to support the files property of file inputs'
		        	})
		    }else {
		        let payment_file = input_payment_file.files[0];

		        if(payment_file.size > 10000000){

		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	 //alert("File " + payment_file.size + " bytes in size");

		        	Swal.fire({
		        		icon:'warning',
		        		title:'Maximum payment file allowed: 10MB'
		        	})
		        }else{
		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})
		        	
		        	//alert('less than 10mb');
		        	//Call the submitRenew function
		        	submitRenew();
		        }
		    }

		}else{
			//if screenshot id, payment file exist
			let input_id_file = document.getElementById('screenshot_id_file');
		  	let input_payment_file = document.getElementById('screenshot_payment_file');
		    if (!input_id_file.files && !input_payment_file.files) { // This is VERY unlikely, browser support is near-universal
		          Swal.fire({
		        		icon:'warning',
		        		title:'This browser does not seem to support the files property of file inputs'
		        	})
		    }else{
		        let id_file = input_id_file.files[0];
		        let payment_file = input_payment_file.files[0];

		        if(id_file.size > 10000000 || payment_file.size > 10000000){
		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	if(id_file.size > 10000000 && payment_file.size < 10000000){
		        		Swal.fire({
			        		icon:'warning',
			        		title:'Maximum id file allowed: 10MB'
			        	})
		        	}else if(id_file.size < 10000000 && payment_file.size > 10000000){
		        		Swal.fire({
			        		icon:'warning',
			        		title:'Maximum payment file allowed: 10MB'
			        	})
		        	}else{
		        		Swal.fire({
			        		icon:'warning',
			        		title:'Maximum id & payment file allowed: 10MB'
			        	})
		        	}
		        	
		        	
		        }else{

		        	$('#add_renew_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	//alert('less than 10mb');
		        	//Call the submitRenew function
		        	submitRenew();
		        }

		    }
		}
	    
	});
	//End

	function submitRenew(){

		// // START CHECK IF THE FILE IS NOT A IMAGE WITHOUT CHECKING THE EXTENSION
		// const file = this.files[0];
		// const  fileType = file['type'];
		// const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
		// if (!validImageTypes.includes(fileType)) {
		//     // invalid file type code goes here.
		// }

		// var file = this.files[0];
		// var fileType = file["type"];
		// var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
		// if ($.inArray(fileType, validImageTypes) < 0) {
		//      // invalid file type code goes here.
		// }
		// // End CHECK IF THE FILE IS NOT A IMAGE WITHOUT CHECKING THE EXTENSION


		let screenshot_payment_file = document.getElementById('screenshot_payment_file');

		if(screenshot_payment_file.files.length == 0 ){
	    	
	   		Swal.fire({
			           icon: 'info',
			           title: 'Screenshot of payment is required',
			})

       }else{

       		var form_data = new FormData($("#add_renew_form")[0]);

	        $.ajax({  
	            url:'../dashboard/client_ajax.php?action=client_renew_action',
	            type:'post',
	            data:form_data,
	            contentType: false,
	    		processData: false,
	    		success:function(data, resp){

	    			console.log(data);
	    			console.log(resp);

					if(data == 1){

						Swal.fire({
						    icon: 'success',
							title:'Submitted Successfully!',
							text: 'It will be approved by the administrator in a matter of minutes'
						}).then((result) => {
								// if (result.value) {
							window.location.href = 'index';
								// }
												        		
						})
					}else if(data == 2){

						Swal.fire({
				          icon: 'warning',
				          title: 'Allowed: extensions: jpg, jpeg & png'

				        })

					}else if(data == 3){

						Swal.fire({
				          icon: 'warning',
				          title: 'Something went wrong'

				        })

					}else if(data == 4){

						Swal.fire({
				          icon: 'warning',
				          title: 'Sorry, your file is too large!'
				        })

					}else{

						Swal.fire({
				          icon: 'error',
				          title: 'Failed to submit!',

				        })

					}

				}

	       }); 
        //End ajax

	   }

	}
    //End