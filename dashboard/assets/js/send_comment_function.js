
    function checkEmail() {

        var email = document.getElementById('txtEmail');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
        alert('Please provide a valid email address');
        email.focus;
        return false;
        
     }
    }

      $(document).on('click', '.submit', function(){  
        
        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();

        var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(name == '' || email == '' || comment == ''){
            Swal.fire({
               icon: 'warning',
               title: "All field are required",
               text: "",
               color: "#555"
            })
        }else if(!email.match(pattern)){
            Swal.fire({
               icon: 'warning',
               title: "Please provide a valid email address",
               text: "",
               color: "#555"
            })
        }else{
            Swal.fire({
                title: "Do you want to send a comment?",
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'            
            }).then((result) => {
                if (result.value) {

                  $.ajax({                        
                      url:'dashboard/client_ajax.php?action=send_comment',
                      type:'post',
                      data:{
                          name:name,
                          email:email,
                          comment:comment
                      },
                      cache: false, 
                      success:function(data, status){

                            // console.log(data);
                            // console.log(status);

                            if(data == 1){

                                document.getElementById("name").value = "";
                                document.getElementById("email").value = "";
                                document.getElementById("comment").value = "";

                                Swal.fire({
                                    icon: 'success',
                                    title: "Your comment has been successfully sent! Thank you!",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }else{
                                Swal.fire({
                                    icon: 'warning',
                                    title: "Failed to send!"
                                })
                            }
                    }

                 }); 
                  
                }
                //End if
            })
            //End Swal
        } 
        //End else
      }); 
    //End