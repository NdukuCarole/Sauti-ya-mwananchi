<?php 
 require('send-email.php'); ?>
<?php
ob_start();
session_start();
$session= $_SESSION['email'];
if($session){
  include('Conn.php');

}
else{
    header("Location:login-user.php");
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Views |Sauti Ya Mwanachi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
	
	<style>
	.imgGallery img {
      padding: 8px;
      max-width: 100px;
    }    
	
	</style>
	
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style2.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	
	
	
	
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
 <?php

  if(isset($_POST['submit']))
  {
    $conn=mysqli_connect("localhost","root","","project");
    $Problemdetail=mysqli_real_escape_string($conn,$_POST['Problemdetail']);



  $query= "INSERT INTO engagement(Problemdetail)
  VALUES ('$Problemdetail')";

  echo $query;
  $execute=mysqli_query($conn,$query);
  if($execute)
  {
            $subject = " Suggestion";
            $message = "Thank you for your suggestion";
            $sender = "From: carolegideon@gmail.com";
            $email='';
          if(mailUser($session, $subject, $message, $sender)){
          }
    header("location:feedback.php")	;
  }
  else{
  echo "Error: " . mysqli_error($conn);

  }
  }
  ?>
    <!-- header-start -->
    <header>
      <div class="header-area ">
          <div class="header-top_area">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-xl-6 col-md-12 col-lg-8">
                          <div class="short_contact_list">
                              <ul>
                                  <li><a href="#"> <i class="fa fa-phone"></i> 0728736229</a></li>
                                  <li><a href="#"> <i class="fa fa-envelope"></i>ndukucarole@gmail.com</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-xl-6 col-md-6 col-lg-4">
                          <div class="social_media_links d-none d-lg-block">
                              <a href="#">
                                  <i class="fa fa-facebook"></i>
                              </a>
                              <a href="#">
                                  <i class="fa fa-instagram"></i>
                              </a>
                              <a href="#">
                                  <i class="fa fa-linkedin"></i>
                              </a>
                              <a href="#">
                                  <i class="fa fa-twitter"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div id="sticky-header" class="main-header-area">
              <div class="container-fluid">
                  <div class="row align-items-center">
                      <div class="col-xl-3 col-lg-3">
                          <div class="logo">
                              <a href="index.php">
                                  <img src="img/Sm.png" alt="">
                              </a>
                          </div>
                      </div>
                      <div class="col-xl-9 col-lg-9">
                          <div class="main-menu">
                              <nav>

                                  <ul id="navigation">
                                      <li><a href="index.php">Home</a></li>



                 
                                      </li>
                                      <li><a href="#">Issues <i class="fa fa-angle-down"></i></a>
                                           <ul class="submenu">
                                              <li><a href="Issues.php">Report Issue</a></li>
                                              <li><a href="single-Issues.html">Issues Reported</a></li>
                                            </ul>
                                      </li>

                                      <li><a href="view.php">E-engagement<i class="fa fa-angle-down"></i></a>
                                          
                                      </li>
                                      <li><a href="contact.php">Contact</a></li>
                                      <li><a href="logout.php">Log-Out</a></li>

                                  </ul>
                              </nav>
<!-- sign in ribbon -->
                          </div>
                      </div>


                      </div>
                  </div>
              </div>
          </div>
      </div>
    </header>
    <!-- header-end -->
   

 <!--================Report Issue Area start =================-->


 <div id="contact">
    <div class="container" style="margin-top:70px;">
      <section id="contact-page">
        <div class="container">
          <div class="center">
		  
		  
    

 <div class="row">
              <form method= "post" enctype="multipart/form-data" role="form" style="background-color: #E9F5E4;">

                <div class="form-group input-group" style="margin-left:200px;">

                
             

            
  
		
                <div class="form-group col-md-8" style="width:800px">
                <label for="ad">Give a suggestion</label>
                <textarea class="form-control" name="Problemdetail" id="Problemdetail" placeholder="e.g this area has a rising increase in insecurity for the past 2 weeks...." rows="10" data-rule="required" data-msg="Please explain in detail"></textarea>
                </div><p>

   
                <div class="form-group col-md-8">
       <button type="submit" name="submit" class="btn btn-success">submit</button></div>
       </div>


</form>
</div>

<!-- Display response messages -->
    <?php if(!empty($response)) {?>
        <div class="alert <?php echo $response["status"]; ?>">
           <?php echo $response["message"]; ?>
        </div>
    <?php }?>
</div>
    </div>
    </section></div></div>

    <!--================Report issue Area end =================-->



    <!-- footer_start  -->
     <footer class="footer">
         <div class="footer_top">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-4 col-md-6 col-lg-4 ">
                         <div class="footer_widget">
                             <div class="footer_logo">
                                 <a href="#">
                                     <img src="img/footer_logo.png" alt="">
                                 </a>
                             </div>
                             <p class="address_text">Get intouch with <br> us through our various  <br>social media platforms
                             </p>
                             <div class="socail_links">
                                 <ul>
                                     <li>
                                         <a href="#">
                                             <i class="ti-facebook"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#">
                                             <i class="ti-twitter-alt"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#">
                                             <i class="fa fa-linkedin"></i>
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#">
                                             <i class="fa fa-instagram"></i>
                                         </a>
                                     </li>
                                 </ul>
                             </div>

                         </div>
                     </div>
                   <div class="col-xl-4 col-md-6 col-lg-4 ">
                         <div class="footer_widget">
                             <h3 class="footer_title">
                                 Services
                             </h3>
                             <ul class="links">

                                 <li><a href="#">online communication</a></li>
                                 <li><a href="#">resolving of issues</a></li>
                                 <li><a href="#">Jobs</a></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-xl-3 col-md-6 col-lg-3">
                         <div class="footer_widget">
                             <h3 class="footer_title">
                                 Contacts
                             </h3>
                             <div class="contacts">
                                 <p>0728736229<br>
                                     ndukucarole@gmail.com <br>
                                     Jomo Kenyatta University,Juja
                                 </p>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
         <div class="copy-right_text">
             <div class="container">
                 <div class="row">
                     <div class="bordered_1px "></div>
                     <div class="col-xl-12">
                         <p class="copy_right text-center">
                             <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
     Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |

                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </footer>
     <!-- footer_end  -->

     <!-- link that opens popup -->
	 
	 
	 
	 
	 
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });    
  </script>
	 
	 
	 
	
<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://stephino.github.io/dist/recorder.js"></script>
        <script>
            jQuery(document).ready(function () {
                var $ = jQuery;
                var myRecorder = {
                    objects: {
                        context: null,
                        stream: null,
                        recorder: null
                    },
                    init: function () {
                        if (null === myRecorder.objects.context) {
                            myRecorder.objects.context = new (
                                    window.AudioContext || window.webkitAudioContext
                                    );
                        }
                    },
                    start: function () {
                        var options = {audio: true, video: false};
                        navigator.mediaDevices.getUserMedia(options).then(function (stream) {
                            myRecorder.objects.stream = stream;
                            myRecorder.objects.recorder = new Recorder(
                                    myRecorder.objects.context.createMediaStreamSource(stream),
                                    {numChannels: 1}
                            );
                            myRecorder.objects.recorder.record();
                        }).catch(function (err) {});
                    },
                    stop: function (listObject) {
                        if (null !== myRecorder.objects.stream) {
                            myRecorder.objects.stream.getAudioTracks()[0].stop();
                        }
                        if (null !== myRecorder.objects.recorder) {
                            myRecorder.objects.recorder.stop();

                            // Validate object
                            if (null !== listObject
                                    && 'object' === typeof listObject
                                    && listObject.length > 0) {
                                // Export the WAV file
                                myRecorder.objects.recorder.exportWAV(function (blob) {
                                    var url = (window.URL || window.webkitURL)
                                            .createObjectURL(blob);

                                    // Prepare the playback
                                    var audioObject = $('<audio controls></audio>')
                                            .attr('src', url);

                                    // Prepare the download link
                                    var downloadObject = $('<a>&#9660;</a>')
                                            .attr('href', url)
                                            .attr('download', new Date().toUTCString() + '.wav');

                                    // Wrap everything in a row
                                    var holderObject = $('<div class="row"></div>')
                                            .append(audioObject)
                                            .append(downloadObject);

                                    // Append to the list
                                    listObject.append(holderObject);
                                });
                            }
                        }
                    }
                };
 
                // Prepare the recordings list
                var listObject = $('[data-role="recordings"]');

                // Prepare the record button
                $('[data-role="controls"] > button').click(function () {
                    // Initialize the recorder
                    myRecorder.init();

                    // Get the button state 
                    var buttonState = !!$(this).attr('data-recording');

                    // Toggle 
                    if (!buttonState) {
                        $(this).attr('data-recording', 'true');
                        myRecorder.start();
                    } else {
                        $(this).attr('data-recording', '');
                        myRecorder.stop(listObject);
                    }
                });
            });
        </script>



	
	
	 
	 
	 
	 
	 
	 

     <!-- JS here -->
     <script src="js/vendor/modernizr-3.5.0.min.js"></script>
     <script src="js/vendor/jquery-1.12.4.min.js"></script>
     <script src="js/popper.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/isotope.pkgd.min.js"></script>
     <script src="js/ajax-form.js"></script>
     <script src="js/waypoints.min.js"></script>
     <script src="js/jquery.counterup.min.js"></script>
     <script src="js/imagesloaded.pkgd.min.js"></script>
     <script src="js/scrollIt.js"></script>
     <script src="js/jquery.scrollUp.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/nice-select.min.js"></script>
     <script src="js/jquery.slicknav.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/plugins.js"></script>
     <script src="js/gijgo.min.js"></script>
     <!--contact js-->
     <script src="js/contact.js"></script>
     <script src="js/jquery.ajaxchimp.min.js"></script>
     <script src="js/jquery.form.js"></script>
     <script src="js/jquery.validate.min.js"></script>
     <script src="js/mail-script.js"></script>

     <script src="js/main.js"></script>
     </body>

     </html>
