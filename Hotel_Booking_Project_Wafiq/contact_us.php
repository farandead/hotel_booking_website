<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
   >
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/sign_up.css">
    <title>Paradise Continental Hotel - Making your stay the most comfortable</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <script src="js/contact.js"></script>

</head>
<!-- font-family: 'Sawarabi Gothic', sans-serif; -->
<body>
   
<?php 
        include "header.php"

    ?>
    <form action="message-inc.php" method="post">
    <div class="content">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row mb-5">
                        <div class="col-md-4 mr-auto">
                            <h3 class="thin-heading mb-4">New York</h3>
                            <p>9757 Aspen Lane
                                South Richmond Hill, NY 11419</p>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <h3 class="thin-heading mb-4">Contact Info</h3>
                            <p>T: +1 (291) 939 9321 <br> E: info@mywebsite.com</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12">

                            <h3 class="thin-heading mb-4">Message Us</h3>

                            <form class="mb-5" action="php/send-email.php" method="post" id="contactForm" name="contactForm">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Your name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input class="form-control" name="message" id="message" cols="30" rows="2"
                                            placeholder="Write your message" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button>Submit</button>
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>

                            <div id="form-message-warning mt-4"></div>
                            <div id="form-message-success">
                                Your message was sent, thank you!
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>

    <?php 
        include "footer.php"

    ?>


   

   


</body>

</html>