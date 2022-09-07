    

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <!--   <div class="spinner"></div>-->
        <div class="container-ring align-items-center justify-content-center">
            <div class="ring"></div>
            <div class="ring"></div>
             <div class="ring"></div>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid  px-5 d-none d-lg-block" style="background-color: #252525; border-bottom: 1px solid #fff">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt text-primary me-2"></i>01 Guinhawa, Mc Arthur Highway, Malolos, <br>Bulacan (Across Malolos Bus Stop, beside Ang Dating Daan)</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt text-primary me-2"></i>09158878222</small>
                    <small class="text-light"><i class="fa fa-envelope-open text-primary me-2"></i>hmgfitnesscenter@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <?php 
                       $query = "SELECT * FROM settings WHERE setting_id = '135'";
                       $result = mysqli_query($con, $query);
                       $row = mysqli_fetch_array($result);
                   ?>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" target='_blank' href="https://<?php echo $row['p_one'] ?>"><i class="fab fa-facebook-f fw-normal text-primary"></i></a>
                    <?php 
                       $query = "SELECT * FROM settings WHERE setting_id = '136'";
                       $result = mysqli_query($con, $query);
                       $row = mysqli_fetch_array($result);
                   ?>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" target='_blank' href="https://<?php echo $row['p_one'] ?>"><i class="fab fa-instagram fw-normal text-primary"></i></a>
                    <?php 
                       $query = "SELECT * FROM settings WHERE setting_id = '137'";
                       $result = mysqli_query($con, $query);
                       $row = mysqli_fetch_array($result);
                    ?>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" target='_blank' href="https://<?php echo $row['p_one'] ?>"><i class="fab fa-youtube fw-normal text-primary"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


   


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(7, 7, 7, 0.8);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" id="search_item" class="form-control bg-transparent border-primary p-3 nice" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

<script type="text/javascript">

  $(document).ready(function(){
    
    $('#search_item').keyup(function(){

      console.log('asd');
      var name = $(this).val();
      var pattern = name.toLowerCase(); 
      var targetId = ""; 
      var divs = document.getElementsByClassName("item"); 

      $(document).find('.item').hide();

      $('.item').each(function(i){
          var para = divs[i].getElementsByTagName("p"); 
          var index = para[0].innerText.toLowerCase().indexOf(pattern); 
          if (index != -1) { 
              $(this).show();
          }
      });

    });   

    $(document).on('click', '.nice', function(){
           let str = "Please locate where 'locate' occurs!";
      str.search("locate");

      console.log(str.search("locate"));
    })

  });

</script>