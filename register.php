
<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing:border-box; 
		}
		html,body{
			width: 100%;
			height: 100%;
			background-color: #d4e4ea;
		}
		.register{
			width: 300px;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			background-color: #fff;
			padding: 20px;

		}
		.register input{
			width: 100%;
			margin: 10px 0px;
			border:1px solid #8A989B;
			height: 30px;

		}
		.register button{
			width: 100%;
			padding: 5px;
			background-color: #389EED;
			color: #FFFfff;

		}
		.register h3{
			border-bottom: 1px solid #DADDE0;
			padding: 10px 0px;
			margin-bottom: 10px;
			color: #7E7E80;
		}
		.register span{
			color: black;

		}
	</style>
</head>
<body>
<div class="register"> 
	<h3>SIGN UP</h3>	
	<form action="includes/register_back.php" method="POST">
		<span>Enter Name</span>
		<input type="Text" name="name" required="required">
		<span>Enter Email</span>
		<input type="email" name="email" required="required">
		<span>Enter Mobile No</span>
		<input type="text" name="mobile" required="required">
		<span>Enter Password</span>
		<input type="password" name="password" required="required">
		<span>Re-Password</span>
		<input type="password" name="repassword" required="required">
		<button>SUBMIT</button>	

	</form>
	<br>
	<span>Already Registerd? <a href="login.php">click here</a></span>
</div>
</body>
</html>