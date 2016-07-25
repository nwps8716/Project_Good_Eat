<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign up - Good Eat</title>

    <!-- Bootstrap Core CSS -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../views/css/business-casual.css" rel="stylesheet">
    <!--Pulling Awesome Font -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <?php include "menu.php"; ?>
    
    <div class="container">
        <div class="row">
            <div class="box">
                    <div class="test2 well well-sm" style="background-color:#FFA500;border-radius: 15px">
                        <legend><a href="http://www.google.com" target="_blank"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
                        <form action="member" method="post" class="form" role="form">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <input class="form-control" name="firstname" placeholder="First Name" type="text"
                                required autofocus />
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                            </div>
                        </div>
                        <input class="form-control" name="email" placeholder="Your Email" type="email" />
                        <input class="form-control" name="userid" placeholder="User ID" type="text" required />
                        <input class="form-control" name="password" placeholder="Password" type="password" required />
                        <input class="form-control" name="password2" placeholder="Check Password" type="password" required />
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnok">Sign up</button>
                        </form>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <?php include "footer.php"?>

</body>

</html>
