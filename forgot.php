
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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
<script>
	function init()
	{
		var x = new XMLHttpRequest();
		x.open("GET","includes/forgot_back.php",true);
		x.onreadystatechange = function()
		{
			if(x.readyState == 4 && x.status == 200)
			{
				document.getElementById("msg").innerHTML = x.responseText;
			}
		} 
		x.send();
	}
		
</script>
<div class="register"> 
	<h3>Password Reset</h3>	
	<form action="includes/forgot_back.php" method="POST">
		<span>Enter Your E-mail</span>
		<input type="email" name="email" required="required">
		<span>Enter New Password</span>
		<input type="password" name="new_password" required="required">
		<span>Re-Enter New Password</span>
		<input type="password" name="re_new_password" required="required">
		<p id="msg"></p>
		<button >Send E-mail Verification</button>	

	</form>
</div>
</body>
</html>