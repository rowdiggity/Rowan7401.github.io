<?php
$message_sent = false;
    if (isset($_POST['email']) && $_POST['email'] != '') {
        
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
        
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

            $to = "rdillon2@villanova.edu";
            $body = "";

            $body.= "From: ".$userName. "\r\n";
            $body.= "Email: ".$userEmail. "\r\n";
            $body.= "Message: ".$message. "\r\n";

            mail($to, $messageSubject, $body);
            $message_sent = true;
        }
        else {
            $invalid_class_name = "form=invalid";
        }
    }
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rowan's Website</title>
    <link rel="stylesheet" href="./contact.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <section class = "glass"> 
      <div class="navbar">
        <a href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="courses.html"><i class="fa fa-book" aria-hidden="true"></i> Courses</a>
        <a href="accomplisments.html"><i class="fa fa-trophy" aria-hidden="true"></i> Accomplishments</a>
        <a href="work.html"><i class="fa fa-briefcase" aria-hidden="true"></i> Work Experience</a>
        <a class="active" href="contact.html"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="photos.html"><i class="fa fa-camera" aria-hidden="true"></i> Photos</a>
      </div>
      <div class = "dashboard">
        <?php
          if($message_sent):
        ?>

          <h3>Thanks, we will be in touch</h3>

        <?php
        else:
        ?>
        <div class="container">
          <form action="contact.php" method="POST" class="form">
              <div class="form-group">
                  <label for="name" class="form-label">Your Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Gary Winthorpe" tabindex="1" required>
              </div>
              <div class="form-group">
                  <label for="email" class="form-label">Your Email</label>
                  <input <?= $invalid_class_name ?? "" ?> type="email" class="form-control" id="email" name="email" placeholder="gary.winthorpe@gmail.com" tabindex="2" required>
              </div>
              <div class="form-group">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Greetings!" tabindex="3" required>
              </div>
              <div class="form-group">
                  <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Something very important..." tabindex="4"></textarea>
              </div>
              <div>
                  <button type="submit" class="btn">Send Message</button>
              </div>
          </form>
        </div>
      </div>
    </section>
    <?php
    endif;
    ?>
   </body>