<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div align="right">
			<a href="add.php">ผู้ดูแลระบบ</a>
		</div>
		<center><img style="padding-top: 10%;" src="1.png" width="15%"></center>
		<p align="center" style="line-height: 1.2em;; font-size: 2em; margin-top: 2%; color: white; text-shadow: 1px 1px 1px black;">ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร สำนักงานปลัดกระทรวงสาธารณสุข<br>ระบบเซ็นชื่อ เข้า-ออกงาน</p>
		<div class="clock">
			<p>
				<span id="h0">0</span><span id="h1">0</span>:<span id="m0">0</span><span id="m1">0</span>:<span id="s0">0</span><span id="s1">0</span>
			</p>
		</div>
	</body>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="reset.css">
	<script type='text/javascript' src='jquery-3.2.1.js'></script>
	<script>
	function smartcard(){
		var tempcid='';
	$.ajax({
	type:"GET",
	dataType:"json",
	url:"http://localhost:8080/smartcard/data/",
	success:function(data){
	$("#cid").val(data.cid);
	$("#name").val(data.fname);
	$("#lname").val(data.lname);
	$("#pre").val(data.prename);
	if(data.cid!=null)
	{
		if(data.cid!=tempcid)
		success(data.cid);
		tempcid=data.cid;
	}
	
	}
	});
	}
	setInterval(smartcard, 500);
	function success(cid){
	window.location="smartcard3.php?id="+cid;
	}
	setTime();
	this.setInterval(function(){
	setTime();
	},1000);
	function setTime(){
	var date = new Date();
	var h = ''+date.getHours();
	var m = ''+date.getMinutes();
	var s = ''+date.getSeconds();
	
	if(h.length === 1){
	document.getElementById('h0').innerHTML = '0';
	document.getElementById('h1').innerHTML = h;
	}else{
	document.getElementById('h0').innerHTML = h.charAt(0);
	document.getElementById('h1').innerHTML = h.charAt(1);
	}
	if(m.length === 1){
	document.getElementById('m0').innerHTML = '0';
	document.getElementById('m1').innerHTML = m;
	}else{
	document.getElementById('m0').innerHTML = m.charAt(0);
	document.getElementById('m1').innerHTML = m.charAt(1);
	}
	if(s.length === 1){
	document.getElementById('s0').innerHTML = '0';
	document.getElementById('s1').innerHTML = s;
	}else{
	document.getElementById('s0').innerHTML = s.charAt(0);
	document.getElementById('s1').innerHTML = s.charAt(1);
	}
	}
	</script>
	<style type="text/css">
		.clock{
			font-family: sans-serif;
			font-weight: bold;
			text-align: center;
			color: white;
			font-size: 80px;
			margin-top: 5%;
			text-shadow: 2px 2px 2px black;
		}
	</style>
</html>