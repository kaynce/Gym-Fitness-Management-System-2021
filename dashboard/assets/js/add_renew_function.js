
	// ================Start check which way will choose
	function renew_no_id_no_gcash(){
		$('#add_renew_form').submit(function(e) {
        	e.preventDefault();
        })
        //Call the submit fuction
        submitRenew();
	}

	function renew_no_id_no_gcash(){
		$('#add_renew_form').submit(function(e) {
        	e.preventDefault();
        })
        //Call the submit fuction
        submitRenew();
	}

	function renew_id_and_payment_file(){
		//if screenshot id, payment file exist
		let input_id_file = document.getElementById('screenshot_id_file');
	  	let input_payment_file = document.getElementById('screenshot_payment_file');
	    if (!input_id_file.files && !input_payment_file.files) { // This is VERY unlikely, browser support is near-universal
	         alert("This browser doesn't seem to support the `files` property of file inputs.");
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
	        	//Call the submit fuction
	        	submitRenew();
	        }
        }
	}
	//End

	function renew_no_id_payment_file_exist(){
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
	        	//Call the submit fuction
	        	submitRenew();
	        }
	    }
	//End
	}
	//End

	function renew_id_cash(){
		
    	$('#add_renew_form').submit(function(e) {
    		e.preventDefault();
    	})

    	
    	//alert('less than 10mb');
    	//Call the submit fuction
    	submitRenew();
	   
	//End
	}
	//End
	// ================End check which way will choose

	
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

	    
		  //If the client chose the cash then go here
	    if($("#screenshot_id_file").length == 0 && $("#screenshot_payment_file").length == 0) {

	    	//No id, no gcash
	    	renew_no_id_no_gcash();
	    	//No checking of files

		}else if($("#screenshot_id_file").length > 0 && $("#screenshot_payment_file").length > 0){
			
			//if and payment file exist 
			//Check of files
			renew_id_and_payment_file();


		}else if($("#screenshot_id_file").length == 0 && $("#screenshot_payment_file").length > 0){
			
			//If id doesn't exist, payment file exist
			//Check of payment file
			renew_no_id_payment_file_exist();

		}else if($("#screenshot_id_file").length > 0 && $("#screenshot_payment_file").length == 0){
			
			//If id exist, cash only
			//Check of id file
			renew_id_cash();

		}else{

			 //If the client chose the cash then go here
			 if($("#screenshot_payment_file").length == 0) {
			 		$('#add_renew_form').submit(function(e) {
			        	e.preventDefault();
			        })
			        //Call the submit fuction
			        submitRenew();
			 }else{
				

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

		//If the client chose the CASH then go here
		//This condition check if the screenshot_id_file exist if not go here
	

		var payment_method = $('#payment_method').val();
		
		if(payment_method != ''){
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
								text: 'It will be approved by the administrator in a matter of minutes. You can check your receipt at Gym Enrolled tab',
								allowOutsideClick: false
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