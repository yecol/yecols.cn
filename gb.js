var msg;
var finaldiv;
var nowint=0;
  startList = function() {
  if (document.all&&document.getElementById) {
    msg=document.getElementById("comments");
	nowint=msg.childNodes.length;

   }
  }
  window.onload=startList;
 
function ajaxSubmit() {
    //获取输入数据
	var nowdate= new Date();
	//获取当前日期
	var month = nowdate.getMonth();
	var monthStr = "",dayFormat = "";
	switch ( month ) {
	case 0:monthStr="January";break;
	case 1:monthStr="February";break;
	case 2:monthStr="March";break;
	case 3:monthStr="April";break;
	case 4:monthStr="May";break;
	case 5:monthStr="June";break;
	case 6:monthStr="July";break;
	case 7:monthStr="August";break;
	case 8:monthStr="September";break;
	case 9:monthStr="October";break;
	case 10:monthStr="November";break;
	case 11:monthStr="December";break;
	}
	switch(nowdate.getDate()%10){
	case 1:dayFormat="st";break;
	case 2:dayFormat="nd";break;
	case 3:dayFormat="rd";break;
	default:dayFormat="th";break;
	}
	//mydate=nowdate.getYear().toString()+"年"+nowdate.getMonth().toString()+"月"+nowdate.getDate().toString()+"日"+nowdate.getHours().toString()+":"+nowdate.getMinutes().toString()+":"+nowdate.getSeconds().toString();
	//var nowdate=CStr(Year(mydate))&"年"&CStr(Month(mydate))&"月"&CStr(Day(mydate))&"日"&"  "&CStr(Time(mydate));
	mydate=monthStr+" "+nowdate.getDate().toString()+dayFormat+", 2009"+" at "+nowdate.getHours().toString()+":"+nowdate.getMinutes().toString();
	var b=true;
	var author=document.forms[0].author.value;
	if (author=='') {
		window.alert ("Name should be filled.");
		document.forms[0].author.focus();
		b=false;
	}
	var email=document.forms[0].email.value;
	if (b) {
	if ((!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(document.forms[0].email.value)) || email.length > 50 || email=='') {
		window.alert("Email should be filled and formatted.");
		document.forms[0].email.focus();
		b=false;
	}
	}
	if (b) {

	var site=document.forms[0].site.value;
	var content=document.forms[0].content.value;
	if (content=='') {
		window.alert ("Content should be filled.");
		document.forms[0].content.focus();
		b=false;
	}
	}
	//alert(infoid+author+content);
	//创建XMLHttpRequest对象
	if (b) {
		var xmlhttp;
	try{
	    xmlhttp=new XMLHttpRequest();
		}catch(e){
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	//请求结果处理程序
	xmlhttp.onreadystatechange=function() {
	    if(4==xmlhttp.readyState){
		//alert(xmlhttp.status);
		      if(200==xmlhttp.status){
			     var date=xmlhttp.responseText;
			     addToList(mydate);
			  }
			  else{
			     alert("author="+escape(author)+"&email="+escape(email)+"&site="+escape(site)+"&content="+escape(content)+"&time="+escape(mydate));
				  }
		}
	}
	//打开连接，ture表示异步提交
	xmlhttp.open("post","guestbook_action.asp",true);
	//当方法为post时需要如下设置http头
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	//发送数据
	xmlhttp.send("author="+escape(author)+"&email="+escape(email)+"&site="+escape(site)+"&content="+escape(content)+"&time="+escape(mydate));
}
}

//将用户输入显示到页面
function addToList(mydate) {
    //获取留言列表div容器


	nowint+=1;
	var cdiv=document.createElement("DIV");
	cdiv.setAttribute("id",nowint);
	var commen=(nowint%2==1?"comment":"comment odd")
	cdiv.setAttribute("className",commen);
	var textdiv=document.createElement("DIV");
	textdiv.setAttribute("className","text");
	var contentp=document.createElement("p");
	var metadatap=document.createElement("p");
	metadatap.setAttribute("className","metadata");
	var authorp=document.createElement("p");
	authorp.setAttribute("className","author");
	//将节点插入到相应的位置
	msg.appendChild(cdiv);
	cdiv.appendChild(textdiv);
	textdiv.appendChild(contentp);
	textdiv.appendChild(metadatap);
	cdiv.appendChild(authorp);
	//填充留言内容
	authorp.innerHTML=document.forms[0].author.value;    
	contentp.innerHTML=document.forms[0].content.value;
	metadatap.innerHTML=mydate;
	//清空输入框
	document.forms[0].author.value="";
	document.forms[0].email.value="";
	document.forms[0].content.value="";
	document.forms[0].content.value="";
}