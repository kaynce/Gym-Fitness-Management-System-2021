
 	 function student_screenshot(str){
             
        if(str == ""){

             document.getElementById("student_screemtshot_file").innerHTML = "";
            return;

        }else if(str=="NON-STUDENT"){

        	 document.getElementById("student_screemtshot_file").innerHTML = "";

            // if (window.XMLHttpRequest) {
            //  // code for IE7+, Firefox, Chrome, Opera, Safari
            //     xmlhttp = new XMLHttpRequest();
            // }
                
            // xmlhttp.onreadystatechange = function() {
            //     if (this.readyState == 4 && this.status == 200) {
            //          document.getElementById("student_screemtshot_file").innerHTML=this.responseText;
            //         }
            // };
                
            // xmlhttp.open("GET","client_ajax.php?action=non_student_packages",true);
            // xmlhttp.send();  

        }else{

        	 document.getElementById("student_screemtshot_file").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
            }
                
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("student_screemtshot_file").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","client_ajax.php?action=student_screenshot",true);
            xmlhttp.send();    
        }
            
    }
    //End

    //========Start Registration
     function walkInInfoReg(str){

        if(str == ""){

            document.getElementById("walk_in_info_reg").innerHTML = "";
            document.getElementById("walk_in_info2_reg").innerHTML = "";
            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else if(str == "YES"){

            document.getElementById("walk_in_info_reg").innerHTML = "";
            document.getElementById("walk_in_info2_reg").innerHTML = "";
            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";

            if (window.XMLHttpRequest) {
               //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                	document.getElementById("walk_in_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
            xmlhttp.send();  

        }else{

            document.getElementById("walk_in_info_reg").innerHTML = "";
            document.getElementById("walk_in_info2_reg").innerHTML = "";
            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("walk_in_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
            xmlhttp.send();  
        }
    }
    //End

     function walkInInfo2Reg(str){

        var client_type =$('#client_type_reg').val();

        if(str == ""){

            document.getElementById("walk_in_info_reg").innerHTML = "";
            document.getElementById("walk_in_info2_reg").innerHTML = "";
            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else{
                
            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("walk_in_info2_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

     function fitnessInfoReg(str){
             
        if(str==""){

            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else{

            document.getElementById("fitness_info_reg").innerHTML = "";
            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("fitness_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

     function fitnessInfo2Reg(str){

        var client_type =$('#client_type_reg').val();

        if(str==""){

            document.getElementById("fitness_info2_reg").innerHTML = "";
            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else{

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("fitness_info2_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

    
    function trainorInfoReg(str){


        if(str==""){

            document.getElementById("trainor_info_reg").innerHTML = "";
            return;

        }else{

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("trainor_info_reg").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/trainor_info.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

//===========End Registration

//===========Start Add/Renew
    function walkInInfo(str){

        if(str == ""){

            document.getElementById("walk_in_info").innerHTML = "";
            document.getElementById("walk_in_info2").innerHTML = "";
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else if(str == "YES"){

            document.getElementById("walk_in_info").innerHTML = "";
            document.getElementById("walk_in_info2").innerHTML = "";
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("walk_in_info").innerHTML=this.responseText;

                    //Remove the payment method text & payment_method_info
                    $("#payment_method").val($("option:first").val());
                    document.getElementById("payment_method_info").innerHTML = '';
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
            xmlhttp.send();  

        }else{

            document.getElementById("walk_in_info").innerHTML = "";
            document.getElementById("walk_in_info2").innerHTML = "";
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";

            if (window.XMLHttpRequest) {
               //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("walk_in_info").innerHTML=this.responseText;

                    //Remove the payment method text & payment_method_info
                    $("#payment_method").val($("option:first").val());
                    document.getElementById("payment_method_info").innerHTML = '';
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info.php?value="+str, true);
            xmlhttp.send();  
        }
    }
    //End

    function walkInInfo2(str){

        var client_type =$('#client_type').val();

        if(str == ""){

            document.getElementById("walk_in_info").innerHTML = "";
            document.getElementById("walk_in_info2").innerHTML = "";
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else{

            if (window.XMLHttpRequest) {
               //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("walk_in_info2").innerHTML=this.responseText;

                     //Remove the payment method text & payment_method_info
                    $("#payment_method").val($("option:first").val());
                    document.getElementById("payment_method_info").innerHTML = '';
                    

                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/walk_in_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

    function fitnessInfo(str){
             
        if(str==""){

            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else{
            	
            document.getElementById("fitness_info").innerHTML = "";
            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("fitness_info").innerHTML=this.responseText;

                    //Remove the payment method text & payment_method_info
                    $("#payment_method").val($("option:first").val());
                    document.getElementById("payment_method_info").innerHTML = '';

                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

    function fitnessInfo2(str){

        var client_type =$('#client_type').val();

        if(str==""){

            document.getElementById("fitness_info2").innerHTML = "";
            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else{
        	
            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("fitness_info2").innerHTML=this.responseText;

                     //Remove the payment method text & payment_method_info
                    $("#payment_method").val($("option:first").val());
                    document.getElementById("payment_method_info").innerHTML = '';
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/fitness_info2.php?value="+str+client_type, true);
            xmlhttp.send();    
        }
    }
    //End

     function trainorInfo(str){


        if(str==""){

            document.getElementById("trainor_info").innerHTML = "";
            return;

        }else{

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("trainor_info").innerHTML=this.responseText;

                    //Remove the payment method text & payment_method_info
                    $("#payment_method").val($("option:first").val());
                    document.getElementById("payment_method_info").innerHTML = '';
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/trainor_info.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

     function paymentMethod(str){

        if(str==""){

            document.getElementById("payment_method_info").innerHTML = "";
            return;

        }else{

            if (window.XMLHttpRequest) {
                //code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("payment_method_info").innerHTML=this.responseText;
                }
            };
                
            xmlhttp.open("GET","../dashboard/assets/ajax/payment_method.php?value="+str, true);
            xmlhttp.send();    
        }
    }
    //End

    //===========End Add/Renew