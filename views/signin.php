<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in - Good Eat</title>

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
                
                <div class="test3">
                    <div class="form-login">
                    <h4>welcome good eat</h4>
                <form name="form" method="post" action="signin">
                    <input type="text" name="id" class="form-control input-sm chat-input" placeholder="username" />
                    </br>
                    <input type="password" name="pw" class="form-control input-sm chat-input" placeholder="password" />
                    </br>
                    <div class="wrapper">
                    <span class="group-btn">
                        <input class="btn btn-primary btn-md" type="submit" name="button" value="Login" />     
                    </span>
                </form>
                    </div>
                    </div>
                </div>
            
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
    <!-- /.container -->

    <?php include "footer.php"?>

</body>

</html>
