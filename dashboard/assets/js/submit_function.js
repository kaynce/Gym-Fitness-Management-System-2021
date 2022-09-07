	
   //For submit check file size
    document.getElementById("submit").addEventListener("click", function showFileSize() {
	    // (Can't use `typeof FileReader === "function"` because apparently it
	    // comes back as "object" on some browsers. So just see if it's there
	    // at all.)
	    if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
	        //alert("The file API isn't supported on this browser yet.");
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
		        	$('#registration_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	 //alert("File " + payment_file.size + " bytes in size");

		        	Swal.fire({
		        		icon:'warning',
		        		title:'Maximum payment file allowed: 10MB'
		        	})
		        }else{
		        	$('#registration_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	
		        	//alert('less than 10mb');
		        	//Call the submit fuction
		        	submit();
		        }
		    }

		}else{
			//if screenshot id, payment file exist
			let input_id_file = document.getElementById('screenshot_id_file');
		  	let input_payment_file = document.getElementById('screenshot_payment_file');
		    if (!input_id_file.files && !input_payment_file.files) { // This is VERY unlikely, browser support is near-universal
		         alert("This browser doesn't seem to support the `files` property of file inputs.");
		    }else{
		        let id_file = input_id_file.files[0];
		        let payment_file = input_payment_file.files[0];

		        if(id_file.size > 10000000 || payment_file.size > 10000000){
		        	$('#registration_form').submit(function(e) {
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
		        	$('#registration_form').submit(function(e) {
		        		e.preventDefault();
		        	})

		        	//alert('less than 10mb');
		        	//Call the submit fuction
		        	submit();
		        }

		    }
		}
	    
    });
    //End


	function submit(){
		if($("#w4-terms").is(':checked')){
    	var form_data = new FormData($("#registration_form")[0]);

        $.ajax({  
            url:'../dashboard/client_ajax.php?action=client_reg_info_action',
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
						title: 'Registration Completed!',
						text: 'We will send you an email for approval of your registration within 24 hours.',
						allowOutsideClick: false
					}).then((result) => {
							// if (result.value) {
						//window.location.href = 'index';
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
	    }else{
	    	Swal.fire({
				          icon: 'info',
				          title: 'If you agree to the terms of service, just check the terms of service',

				})
	    }	
	}