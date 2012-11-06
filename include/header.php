<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Csci6441 Stocks</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
		<script type="text/javascript">
			$('.login-link').click(function(e) {
			    $('#loginform').dialog('open');
			    e.preventDefault();
			    return false;
			});
			
			$('#loginform').dialog({
			    autoOpen: false,
			    modal: true,
			    resizable: false,
			    draggable: false
			});​
		</script>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="header">
			<div id="logo">
				CSci6441 Stock Analyzer
			</div>
			<div id="header-menu">
				<a href="#register-box" class="popup">Regesiter</a><a href="#login-box" class="popup">Login</a>
			</div>
			<div id="login-box" class="popup-form">
				<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
				<form method="post" class="auth" action="#">
					<fieldset class="textbox">
						<label class="username">
							<span>Username or email</span>
							<input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
						</label>
						<label class="password">
							<span>Password</span>
							<input id="password" name="password" value="" type="password" placeholder="Password">
						</label>
						<p id="sign-in-error" style="margin:0; height: 18px;  color: #FF2300;"></p>
						<button id="sign-in" class="submit button" type="button" disabled="disabled">Sign in</button>
						<p>
							<a class="forgot" href="#">Forgot your password?</a>
						</p>        
					</fieldset>
				</form>
			</div>
			<div id="register-box" class="popup-form">
				<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
				<form method="post" class="auth" action="#">
					<fieldset class="textbox">
						<label class="username">
							<span>Username or email</span>
							<input id="register-username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
						</label>
						<label class="password">
							<span>Password</span>
							<input id="register-password" name="password" value="" type="password" placeholder="Password">
						</label>
						<label class="password">
							<span>Retype Password</span>
							<input id="register-retype-password" name="password" value="" type="password" placeholder="Password">
						</label>
						<p id="register-error" style="margin:0; height: 18px; color: #FF2300;"></p>
						<button id="register" class="submit button" type="button" disabled="disabled">Register</button>
						<p>
							<a class="forgot" href="#">Forgot your password?</a>
						</p>        
					</fieldset>
				</form>
			</div>
			<script type="text/javascript">
			$(document).ready(function() {
				$('a.popup').click(function() {
					
			        //Getting the variable's value from a link 
					var loginBox = $(this).attr('href');
			
					//Fade in the Popup
					$(loginBox).fadeIn(300);
					
					//Set the center alignment padding + border see css style
					var popMargTop = ($(loginBox).height() + 24) / 2; 
					var popMargLeft = ($(loginBox).width() + 24) / 2; 
					
					$(loginBox).css({ 
						'margin-top' : -popMargTop,
						'margin-left' : -popMargLeft
					});
					
					// Add the mask to body
					$('body').append('<div id="mask"></div>');
					$('#mask').fadeIn(300);
					
					return false;
				});
				
				// When clicking on the button close or the mask layer the popup closed
				$('a.close, #mask').live('click', function() { 
				  $('#mask , .popup-form').fadeOut(300 , function() {
					$('#mask').remove();  
				}); 
				return false;
				});
				
				//Check if user entered username
				$('#username').blur(function() {
					if ($('#username').val() == '') $('#sign-in-error').text('Please enter the username.');
					else {
						$('#sign-in-error').text('');
						$('#sign-in').attr('disabled', '');
					}
				})
				
				$('#register-username').blur(function() {
					if ($('#register-username').val() == '') $('#register-error').text('Please enter the username.');
					else {
						$('#register-error').text('');
						$('#register').attr('disabled', '');
					}
				})
				
				//Check if the password matches
				$('#register-retype-password').blur(function() {
					if ($('#register-password').val() !== $('#register-retype-password').val()) {
						$('#register-error').text('The passwords do not match.');
					} else {
						$('#register-error').text('');
						$('#register').attr('disabled', '');
					}
				})
				
				
				
			});
			</script>
		</div>
		<div id="header-subbar"></div>	