<%@language=vbscript codepage=936 %>
<% 
'++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
'++++++ +++++++++++++++++++++++++++
'++++++ +++++++++++++++++++++++++++
'++++++ ++++++++++
'++++++ +++++++++++++++++++
'以下为修改内容
Const UploadDir="pic/"        '存放文件的目录
Const ThDir="small/"
Const MaxPerPage=10                      '每页显示数量
const title="02计算机相册"   '标题

'检查组件是否已经安装
Function IsObjInstalled(strClassString)	
	IsObjInstalled = False
	Err = 0
	Dim xTestObj
	Set xTestObj = Server.CreateObject(strClassString)
	If 0 = Err Then IsObjInstalled = True
	Set xTestObj = Nothing
	Err = 0
End Function
dim strFileName
dim totalPut,CurrentPage,TotalPages
dim TruePath,fso,theFolder,theFile,whichfile,thisfile,FileCount,TotleSize
strFileName="?"

if request("page")<>"" then
    currentPage=cint(request("page"))
else
	currentPage=1
end if

TruePath=Server.MapPath(UploadDir)
If not IsObjInstalled("Scripting.FileSystemObject") Then
	Response.Write "<b><font color=red>你的服务器不支持 FSO(Scripting.FileSystemObject)! 不能使用本功能</font></b>"
Else
	set fso=CreateObject("Scripting.FileSystemObject")	

%>
<html>
<head>
<title><%=title%></title>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<meta name="author" content="netasp;EMAIL:netasp@sohu.com">

	<link rel="stylesheet" type="text/css" href="js/fancybox/resources/fancy.css" /> 
    <script type="text/javascript" src="js/fancybox/js/jquery-1.2.3.pack.js"></script> 
	<script type="text/javascript" src="js/fancybox/js/jquery.fancybox-1.0.0.js"></script> 	
	<script type="text/javascript"> 
	
		$(function(){
		
			$(".angoscl").fancybox({ 'zoomSpeedIn': 500, 'zoomSpeedOut': 500, 'overlayShow': true }); 
		
		});
	
	</script> 

<style type="text/css">
<!--
body,table,td{font-size:12px;color:#000090;}
body{
	margin:0 0 1px;
	padding:0;
	background:#ffffff url(fsoimg/bgbrick.gif);
	background-color: #000;
}
table{width:760px}
table table{width:100%;background:#eeeeee}
td{vertical-align:top;}
table table td{padding-left:4px;vertical-align:middle;background:#ffffff}
img{vertical-align:bottom}
form{margin:0;padding:0}
a{color:#000080;text-decoration:none;}
a:hover{color:#ff3333;text-decoration:underline}
div{width:100%;background:#eeeeee}
.button{width:65px;height:20px;border:solid 1px;border-color:#ffffff #666666 #666666 #ffffff;margin:3px 0;}
.imgbutton{width:32px;height:32px;border:solid 1px #d6d3cc;cursor:hand;}
.imgbt{border:solid 1px;border-color:#ffffff #999999 #999999 #ffffff;cursor:hand;}
//body,td,th {
	color: #CCC;
}
-->
</style>
</head>
<body>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">


</head>
<body leftmargin=0 topmargin=0  > 
<div id=menuDiv style='Z-INDEX: 1000; VISIBILITY: hidden; WIDTH: 1px; POSITION: absolute; HEIGHT: 1px; BACKGROUND-COLOR: #9cc5f8'></div> 
<!-- ********网页顶部代码开始******** --> 
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0" class="top_tdbgall" style="word-break:break-all;Width:fixed">
  <tr> 
    <td height="4" bgcolor="#000"></td>
  </tr>
  <tr> 
    <td height="22" align="center">
	</td>
  </tr>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0" class="top_Path" style="word-break:break-all;Width:fixed"> 
  <tr> 
    <td width="5%" align="center">　</td> 
    <td>　</td> 
  </tr> 
</table> 
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>      
      <td width="100%" align="center" valign="top">      
  
      <%
  if fso.FolderExists(TruePath)then
	FileCount=0
	TotleSize=0
	Set theFolder=fso.GetFolder(TruePath)
	For Each theFile In theFolder.Files
		FileCount=FileCount+1
		TotleSize=TotleSize+theFile.Size
	next
    totalPut=FileCount
	if currentpage<1 then
   		currentpage=1
   	end if
   	if (currentpage-1)*MaxPerPage>totalput then
		if (totalPut mod MaxPerPage)=0 then
	  		currentpage= totalPut \ MaxPerPage
	  	else
	      	currentpage= totalPut \ MaxPerPage + 1
		end if

    end if
	if currentPage=1 then
		showContent     	
		showpage2 strFileName,totalput,MaxPerPage
		response.write "<br><div align='center'>本页共显示 <b>" & FileCount-1 & "</b> 个文件，占用 <b>" & TotleSize\1024 & "</b> K</div>"
   	else
   	   	if (currentPage-1)*MaxPerPage<totalPut then
			showContent     	
			showpage2 strFileName,totalput,MaxPerPage
			response.write "<br><div align='center'>本页共显示 <b>" & FileCount-1 & "</b> 个文件，占用 <b>" & TotleSize\1024 & "</b> K</div>"
       	else
        	currentPage=1
			showContent     	
			showpage2 strFileName,totalput,MaxPerPage
			response.write "<br><div align='center'>本页共显示 <b>" & FileCount-1 & "</b> 个文件，占用 <b>" & TotleSize\1024 & "</b> K</div>"
    	end if
	end if
  else
	response.write "找不到文件夹！可能是配置有误！"
  end if
end if

sub showContent()
   	dim c
	FileCount=1
	TotleSize=0
%>
      <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
	  	        <tr class="tdbg"> 
        <% For Each theFile In theFolder.Files
	c=c+1
	if FileCount>MaxPerPage then
		exit for
	elseif c>MaxPerPage*(CurrentPage-1) then %>
          <td bgcolor="#000"><a class="angoscl" href="<%=(UploadDir & theFile.Name)%>" target="_blank">
<img src=<%=(ThDir & theFile.Name)%> border=0 width=150 height=150></a></td>
<% if FileCount mod 5 =0 then%>
              </TR>
              <tr> 
                <%end if%>
        <%	FileCount=FileCount+1
		TotleSize=TotleSize+theFile.Size
	end if
Next
%>		        </tr>
      </table>
      <%
end sub
%>
    </td>
  </tr>
</table>
<%
sub showpage2(sfilename,totalnumber,maxperpage)
	dim n, i,strTemp
	if totalnumber mod maxperpage=0 then
    	n= totalnumber \ maxperpage
  	else
    	n= totalnumber \ maxperpage+1
  	end if
  	strTemp= "<table align='center'><form name='showpages' method='Post' action='" & sfilename & "'><tr><td>"
	strTemp=strTemp & "共 <b>" & totalnumber & "</b> 个文件&nbsp;&nbsp;"
  	if CurrentPage<2 then
    		strTemp=strTemp & "首页 上一页&nbsp;"
  	else
    		strTemp=strTemp & "<a href='" & sfilename & "page=1'>首页</a>&nbsp;"
    		strTemp=strTemp & "<a href='" & sfilename & "page=" & (CurrentPage-1) & "'>上一页</a>&nbsp;"
  	end if

  	if n-currentpage<1 then
    		strTemp=strTemp & "下一页 尾页"
  	else
    		strTemp=strTemp & "<a href='" & sfilename & "page=" & (CurrentPage+1) & "'>下一页</a>&nbsp;"
    		strTemp=strTemp & "<a href='" & sfilename & "page=" & n & "'>尾页</a>"
  	end if
   	strTemp=strTemp & "&nbsp;页次：<strong><font color=red>" & CurrentPage & "</font>/" & n & "</strong>页 "
    strTemp=strTemp & "&nbsp;<b>" & maxperpage & "</b>" & "个文件/页"
	strTemp=strTemp & "&nbsp;转到：<select name='page' size='1' onchange='javascript:submit()'>"   
    for i = 1 to n   
   		strTemp=strTemp & "<option value='" & i & "'"
		if cint(CurrentPage)=cint(i) then strTemp=strTemp & " selected "
		strTemp=strTemp & ">第" & i & "页</option>"   
	next
	strTemp=strTemp & "</select>"
	strTemp=strTemp & "</td></tr></form></table>"
         strTemp=strTemp & "<font color='#0083AE'> "
	strTemp=strTemp & ""
	response.write strTemp
end sub
%>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0"  height="150">
</table>