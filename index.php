<?php
//Enables error reporting.
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

//Check if the form has been submitted.
if(isset($_POST['submit']))
{
    $to =       $_POST['to-email'];
    $from =     $_POST['from-email'];
    $subject =  $_POST['subject'];
    $message =  $_POST['message'];

    $headers =  'From: ' . $from . "\r\n" .
                'Reply-To: ' . $from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    //In order for mail to work you'll have to install papercut. This will setup local SMTP server which php communicates to.
    //Download url for papercut: https://papercut.codeplex.com/
    //Papercut will catch the e-mail that has been sent by PHP.
    $result = mail($to, $subject, $message, $headers);
}
?>


<html>
<head>
    <title>E-mail Example</title>
    <!--  Load bootstrap CSS  -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--  Load the Lato Font  -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <!--  Load custom style  -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <section class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="email-form">
                    <h1 class="email-form__title">E-mail Example</h1>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="input-to-email">Email address</label>
                            <input type="email" class="form-control" id="input-to-email" placeholder="Enter email" name="to-email" required>
                        </div>
                        <div class="form-group">
                            <label for="input-from-email">From Email address</label>
                            <input type="email" class="form-control" id="input-from-email" placeholder="Enter email" name="from-email" required>
                        </div>
                        <div class="form-group">
                            <label for="input-subject">Subject</label>
                            <input type="text" class="form-control" id="input-subject" placeholder="Subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="input-message">Message:</label>
                            <textarea class="form-control" rows="5" id="input-message" name="message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Send E-mail</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <?php
                if(isset($result))
                {
                    ?>
                    <h2>E-mail Results</h2>
                    <?php
                    if($result)
                    {
                        echo '<p class="email-results bg-success">E-mail has been sent.</p>';
                    }
                    else
                    {
                        echo '<p class="email-results bg-danger">E-mail failed to sent.</p>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!--  Load bootstrap JS  -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="application/javascript"></script>
</body>
</html>