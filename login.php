
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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
		.login{
			width: 300px;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			background-color: #fff;
			padding: 20px;

		}
		.login input{
			width: 100%;
			margin: 10px 0px;
			border:1px solid #8A989B;
			height: 30px;

		}
		.login button{
			width: 100%;
			padding: 5px;
			background-color: #389EED;
			color: #FFFfff;

		}
		.login h3{
			border-bottom: 1px solid #DADDE0;
			padding: 10px 0px;
			margin-bottom: 10px;
			color: #7E7E80;
		}
		.login span{
			color: black;

		}
	</style>
</head>

<body>
<script>
	function init()
	{
		var id = document.getElementById('username').value;
		var pass = document.getElementById('password').value;
		var x = new XMLHttpRequest();
		
		x.onreadystatechange = function()
		{
			if(x.readyState == 4 && x.status == 200)
			{
				document.getElementById("msg").innerHTML = x.responseText;
			}
		} 
		x.open("GET","includes/login_back.php?username=" + id + "&password="+ pass,true);
		x.send();
	}
		
</script>
<div class="login"> 
	<h3>SIGN IN</h3>	
	<form action="includes/login_back.php" method="POST">
		<span>Name or Email</span>
		<input type="Text" name="username" id="username">
		<span>Password</span>
		<input type="password" name="password" id="password">
		<p id="msg"></p>
		<button>Log In</button>	
	</form>
	<br>
	<span>Forgot Password? <a href="forgot.php">click here</a></span><br>
	<br><span>Don't have an Account? <a href="register.php">click here</a></span>
</div>
</body>
</html>