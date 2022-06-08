<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ango</title>
<link href="yecolscd.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-image: url(bg20090303.png);
	background-repeat: repeat-x;
	margin-bottom: -1px;
	background-color: #F0F0F0;
}
#maintd {
	background-image: url(card.png);
	background-repeat: no-repeat;
	background-position: center center;
	height: 503px;
	width: 984px;
}
-->
</style>
</head>

<body>
<center>
<SCRIPT type="text/javascript">
<!--
var target=[]
var time_id=[]
function show_date_time_0(){
	setTimeout("show_date_time_0()", 1000);
for (var i=0,j=target.length;i<j;i++){
	today=new Date();
	timeold=target[i]-today.getTime();
	sectimeold=timeold/1000;
	secondsold=Math.floor(sectimeold);
	msPerDay=24*60*60*1000;
	e_daysold=timeold/msPerDay;
	daysold=Math.floor(e_daysold);
	e_hrsold=(e_daysold-daysold)*24;
	hrsold=Math.floor(e_hrsold);
	e_minsold=(e_hrsold-hrsold)*60;
	minsold=Math.floor((e_hrsold-hrsold)*60);
	seconds=Math.floor((e_minsold-minsold)*60);
	if (daysold<0) {
		window.open('cardpost.php','_self');
	} 
	else {
		if (daysold<10) {daysold="0"+daysold}
		if (daysold<100) {daysold="0"+daysold}
		if (hrsold<10) {hrsold="0"+hrsold}
		if (minsold<10) {minsold="0"+minsold}
		//if (seconds<10) {seconds="0"+seconds}

			document.getElementById(time_id[i]).innerHTML=
			"<div id='cd"+Math.floor(hrsold/10)+"'></div>"+"<div id='cd"+hrsold%10+"'></div><div id='h'></div>"+
			"<div id='cd"+Math.floor(minsold/10)+"'></div>"+"<div id='cd"+minsold%10+"'></div><div id='m'></div>"+
			"<div id='cd"+Math.floor(seconds/10)+"'></div>"+"<div id='cd"+seconds%10+"'></div><div id='s'></div>";
	}
}
}
setTimeout("show_date_time_0()", 100);
//-->
</SCRIPT>
<table border="0">
<tr><td height="150"></td></tr>
<tr><td id="maintd">
<table border="0">
<tr><td height="210" width="434"></td><td width="550"></td></tr>
<tr><td height="110" width="434"></td><td width="550"><div id="timeCountDown"></div></td>
</tr>
<tr><td height="180" width="434"></td><td width="550"></td></tr>
<SCRIPT>
target[target.length]=new Date("Jun 20, 2009 00:00:00").getTime()
time_id[time_id.length]="timeCountDown"
</SCRIPT>
</table>
</td></tr>
<tr><td></td></tr>
</table>
</center>
</body>
</html>
