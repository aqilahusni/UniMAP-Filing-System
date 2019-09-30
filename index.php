<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link href="css/login.css" rel='stylesheet' type='text/css' />
  <title>UniMAP Filing System</title>
  <style>
	input ,select{font-size:14;
	text-align:center;
	border:1px solid black;
	border-radius:6px;
	}
	body {
	background-image: url('img/bga.jpg');

	 } 
	table{
	text-align:center;
	padding:3;
	border:1px solid black;
	border-radius:8px;
	background:#BCD4EC;
	box-shadow: 3px 3px 3px #0f055f;}
	div { border:10px solid grey;
	border-radius:8px;
	padding:3;
	width:60%;
	text-align:left;
	font-size:13;font-weight:bold;
	background-image: url('img/ptn.jpg');}
  </style>
</head>
<body>
	<center>
  <img src="img/LogoUniMAP2017.png" style="width:200px;height:100px;"> 
  <br><h1>UniMAP Filing System</h1>
  <br>
  <div class="login">
    <h1>Login Panel</h1>
    <form method=post name=log action="loging.php">
      <p><input type=text name=username placeholder="Username or Email"></p>
      <p><input type=password name=password placeholder="Password"></p>
      <p class="remember_me">
        <label>
          <input type="checkbox" name="remember_me" id="remember_me">
          Remember me on this computer
        </label>
      </p>
      <p class="submit"><input type="submit" name="commit" value="Login"></p>
    </form>
  </div>
	<br>
	Copyright @ TNCPNI UniMAP 2018
	</center>
</body>
</html>
