<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script type="text/javascript" src="scripts/login.js"></script>
</head>

<body>

<div class="headerBar">
	<div class="logoBar red_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/san412_logo.png" alt="分享你的故事"></a>
			</div>
			<h3 class="welcome_title">欢迎注册</h3>
		</div>
	</div>
</div>
<form action="doRegister.php" method="post">
<div class="regBox">
	<div class="login_cont">
		<ul class="login">
			<li><span class="reg_item"><i>*</i>用户名：</span><div class="input_item"><input type="text" name="username" class="login_input user_icon"></div></li>
			<li><span class="reg_item"><i>*</i>密码：</span><div class="input_item"><input type="password" name="password" class="login_input user_icon"></div></li>
			<li><span class="reg_item"><i>*</i>再次确认：</span><div class="input_item"><input type="password" name="password1" class="login_input user_icon"></div></li>
			<li><span class="reg_item"><i>*</i>验证码：</span><div class="input_item"><input type="text" name="verify" class="login_input user_icon"></div></li>
			<li><span class="reg_item">&nbsp;&nbsp;</span><img id="imgNumber" src="getVerify.php" alt="" onmouseup="changeImage()"/><span id="lsc">点击图片换一张</span></li>
			<li class="autoLogin"><span class="reg_item">&nbsp;</span><input type="checkbox" id="t1" class="checked"><label for="t1">我同意什么什么条款</label></li>
			<li><span class="reg_item">&nbsp;</span><input type="submit" value="" class="login_btn"/></li>
		</ul>

	</div>
</div>
</form>
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">San412简介</a><i>|</i><a href="#">San412公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a></p>
</div>
</body>
</html>
