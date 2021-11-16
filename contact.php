<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <style>

        body {
            width: 100%;
            background-color: rgb(28,31,36);
            color: white;
        }

        .container {
            margin-top: 2%;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Leave a message for us we would reply you as soon as possible</h2>
		<div class="row">
			<div class="col-md-6 m-auto">
            <form method="POST">
            <?php require "process/forms.php"; ?>
                    <div class="form-label-group">
                        <input type="text" id="inputName" class="form-control" name='name' autofocus>
                        <label for="inputName">Enter Your Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" name='email' autofocus>
                        <label for="inputEmail">Enter Your Email</label>
                    </div>

                    <div class="form-label-group">
                        <textarea name="subject" id="inputSubject" class="form-control"></textarea>
                        <label for="inputSubject">Enter YourMessage</label>
                    </div>
                    <button name='message' class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button>

                    <br>
       
                    <h3>You can also visit us at <em>N0:9 Oremiji Street Xtadok Estate, Power Line Bus stop, Badore Ajah Lagos </em></h3>

                    <em>
                    
                    <br>

                    <p><i class="fab fa-instagram fa-2x"></i> @Maverickgrills</p>

                    <p><i class="fa fa-phone fa-1x" ></i> 08064544333</p>

                    <p><i class="fa fa-clock fa-1x"></i> Open From 9am to 10pm</p>

                    <p><i class="fa fa-paper-plane fa-1x"></i> Delivery avialble form 9am to 4pm</p>

                    </em>






                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021 Maverick Meal</p>
            </form>

        </div>
    </div>
</div>
	
</body>
</html>