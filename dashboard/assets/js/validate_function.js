    function getAge(){

    	console.log(age);

        var dob = document.getElementById('date_of_birth').value;
        // var dob = document.getElementsByClassName("date_of_birth")[0].value;

        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

        if(age >= 18 ){
        	document.getElementById('age').value=age;
        	document.getElementById('message').innerHTML = '';
        }else{
        	document.getElementById('age').value = '';
        	document.getElementById('message').style.color = 'red';
        	document.getElementById('message').innerHTML = 'Required age 18 and above!';
        }
    }

    function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function displayImgPayment(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_payment').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    var check = function() {

          if (document.getElementById('password').value === document.getElementById('cpassword').value) {
              document.getElementById('message').style.color = 'green';
              document.getElementById('message').innerHTML = 'Password Match';
          } else {
              document.getElementById('message').style.color = 'red';
              document.getElementById('message').innerHTML = 'Password dont Match';
          }

          if (document.getElementById('password').value == '') {
              document.getElementById('message').style.color = 'blue';
              document.getElementById('message').innerHTML = 'Input Password';
          }

          if (document.getElementById('cpassword').value == '') {
              document.getElementById('message').style.color = 'blue';
              document.getElementById('message').innerHTML = 'Input Confirm Password';
          }
    }


 
    // Restricts input for the given textbox to the given inputFilter function.
    function setInputFilter(textbox, inputFilter) {
      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
          if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          } else {
            this.value = "";
          }
        });
      });
    }

    setInputFilter(document.getElementById("age"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("height"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });


    setInputFilter(document.getElementById("weight"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("contact"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("house_no"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    setInputFilter(document.getElementById("postal_code"), function(value) {
      return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    function checkFileUploadExt(fieldObj) {
      var control = document.getElementById("uploadFiles");
      var filelength = control.files.length;

      for (var i = 0; i < control.files.length; i++) {
        var file = control.files[i];
        var FileName = file.name;
        var FileExt = FileName.substr(FileName.lastIndexOf('.') + 1);
        if ((FileExt.toUpperCase() != "PDF")) {
          var error = "File type : " + FileExt + "\n\n";
          error += "Invalid extension format .\n\n";
          document.getElementById('message').innerHTML = error;
          console.error(error);
        }
      }
    }

        var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
        function Validate(oForm) {
        var arrInputs = oForm.getElementsByTagName("input");

        for (var i = 0; i < arrInputs.length; i++) {
            var oInput = arrInputs[i];
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }
                    
                    if (!blnValid) {

                        //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));

                        // document.getElementById('message').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

                        //  alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                        // return false;
                          Swal.fire({
                                      icon: 'error',
                                      title: 'Invalid extension!',
                                      text: "Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ")
                        }).then((result) => {

                        })

                        return false;
                    }
                }
            }
        }
      
        return true;
    }


    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
    function validateRenew(oForm) {
    Console.log('NOT ALLOWEED');
    var arrInputs = oForm.getElementsByTagName("input");

    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {

                    //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));

                    // document.getElementById('message').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

                    //  alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    // return false;
                      Swal.fire({
                                  icon: 'error',
                                  title: 'Invalid extension!',
                                  text: "Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ")
                    }).then((result) => {

                    })

                    return false;
                }
            }
        }
    }
      
        return true;
    }
    //End
