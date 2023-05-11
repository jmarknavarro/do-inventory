<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ./dashboard");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>DO Inventory</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="/do-inventory/assets/images/favicon.ico">

    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 auth-main-col text-center p-5 mb-2">
            
		    <div class="d-flex flex-column align-content-end h-50">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-3">Log in to DO ICT Services Inventory</h2>
                    <div class="" id="message"></div>

			        <div class="auth-form-container text-start">



						<form class="auth-form login-form" method="post" id="login_form" name="login_form">         
							<div class="email mb-3">
								<input id="username" name="signin-email" type="text" class="form-control signin-email" placeholder="Username" alt="username" >
							</div><!--//form-group-->
							<div class="password mb-3">
								<input id="password"  name="signin-password" type="password" class="form-control signin-password" placeholder="Password" alt="password" >
								
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn btn-outline-danger btn-block w-100 my-2 mx-auto">Log In</button>
							</div>
						</form>
						
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
				         
			        <small class="copyright">Created by John Mark Navarro & John Noel Gita</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    
    </div><!--//row-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        $('form[name="login_form"]').on('submit', function(e) {

            e.preventDefault();

            var a = $('#username').val();
            console.log(a);

            var b = $('#password').val();
            console.log(b);

            if (a === '' || b === '') { // VERIFY DATA
                $('#message').html('<div class="alert alert-danger"> Required All Fields</div>');
            } else {
                $.ajax({
                    url: 'init/controllers/login_process.php',
                    type: 'post',
                    data: {
                        username: a,
                        password: b,
                    },
                    success: function(response) {
                        if (response == 1) {
                            // alert("Logged In");
                            window.location = "./dashboard/";
                          } else {
                            // alert("Wrong Details");
                            $('#message').html(
                                '<div class="alert alert-danger">Wrong Details</div>');
                        }
                    }
                });
            }
        });
        </script>
        <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html> 

