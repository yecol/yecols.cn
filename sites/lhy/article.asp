<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file = "Startup.asp"-->
<%Response.Charset="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工程硕士英语教学网络平台</title>
<link href="elements/style.css" rel="stylesheet" type="text/css" />
</head>


<body>
<%
dim id,user,irole
id=request("id")
user=Session("user")
irole=Session("irole")
if user="" or irole="" then
			call alertTo("Log in first.","index.html")
end if
sql="select * from contents where id="&id
subsql="select * from contents where type=3 and parent="&id

set rs=Server.CreateObject("adodb.recordset")
set subrs=Server.CreateObject("adodb.recordset")
'nRs.open sql,oConn,1,1



set rs=oConn.execute(sql)
set subrs=oConn.execute(subsql)
'response.Write(nRs.Fields.Item(4).Name &".SIZE = "& nRs.Fields.Item(4).Size & "<br>")
If (not rs.eof) And (not rs.bof) Then
%>
<div id=wrapper>
<div id=head>
<table width="600" border="0" align="right">
  <tr>
    <td width="100"><a href="list.asp" class="nav">首页</a></td>
    <td width="100"><a href="course.asp" class="nav">课程介绍</a></td>
    <td width="100"><a href="about.asp" class="nav">关于我们</a></td>
    <td width="100"><a href="http://yecols.phost.ws/bbs" class="nav">互动论坛</a></td>
    <td width="100"><a href="quit.asp" class="nav">退出系统</a></td>
  </tr>
</table>

</div><!--end of head-->

<div id=detailbody>
<div id=detailbodyheader>
<table width="200" border="0">
  <tr>
    <td height="225px">&nbsp;</td>
  </tr>
</table>
</div>
<div id="detailbodymid">
<div id="zhengwen">
 <div id="title"><%=rs("title")%></div>
 <div id="meta">发表日期:<%=rs("time")%>&nbsp;&nbsp;&nbsp;发表者：<%=rs("author")%>&nbsp;&nbsp;&nbsp;作业状态：<%if rs("statu")=0 then%>正在提交<%else%>停止提交<%end if%>

 </div>
 <div id="content"><%=rs("content")%></div>
<%if not rs("type")=1 then%>
 <div id="teach">
 <%if rs("score")=0 then%>
	  <%if irole=1 then%>
    <table width="750" border="0">
     
     <form action="action.asp" method="post">   
     <tr>
       <td width="120" height="80" align="right" valign="bottom">教师评分：</td>
       <td valign="bottom">
	 
	 <input name="action" type="hidden" value="comment"/>
     <input name="cscore" type="text" class="input" id="ctitle" size="10" height="25"/>
	  <input name="cauthor" type="hidden" value="<%=user%>"/>
	  <input name="irole" type="hidden" value="<%=irole%>"/>
	  <input name="id" type="hidden" value="<%=id%>"/> 
	
	 
      </td> 
     </tr> 
     <tr> 
       <td height="15">&nbsp;</td> 
       <td>&nbsp;</td> 
     </tr> 
     <tr> 
       <td align="right">教师评语：</td> 
       <td><textarea name="ccontent" cols="60" rows="10" class="input" id="ccontent"></textarea>&nbsp;&nbsp;&nbsp;<input type="submit" class="button" value="评&nbsp;价"></form>
	   <%else%>
   <table width="750" border="0">
     <tr>
       <td width="120" height="80" align="right" valign="bottom">教师评分：</td>
       <td valign="bottom">	   
	 
	 尚未打分</td>
     </tr>
     <tr>
       <td height="15">&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td align="right">教师评语：</td>
       <td>尚无评语
	   <%end if%>
	   <%else%>
   <table width="750" border="0">
     <tr>
       <td width="120" height="80" align="right" valign="bottom">教师评分：</td>
       <td valign="bottom">	   
	    <span id="score"><%=rs("score")%></span></td>
     </tr>
     <tr>
       <td height="15">&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td align="right">教师评语：</td>
       <td><%=rs("comment")%>
	   
	   <%end if%>
	   
	   </td>
     </tr>
   </table></div>
   <%end if%>
   
  <%if irole="0" and rs("type")=1 and rs("statu")=0 then%>  
   <div class="buttons">
<a href="post.asp?ptype=2&parent=<%=rs("id")%>" class="buzhizuoye"><img src="elements/tijiao.png" border="0" /></a>
</div>

 <%end if%>

 <div id="conments"> 
 <table width="750" border="0">
  <tr>
    <td width="120" height="100px"></td>
    <td width="630"></td>
  </tr>
<%if not subrs.eof and not subrs.bof then
    for j = 0 to 500  %>
  
  <tr>
    <td width="120" height="100px" align="right" valign="bottom"><%=subrs("author")%></td>
    <td width="630" background="elements/commentb.png"><div class="comment"><%=subrs("content")%>
<%if irole=1 then%>	
&nbsp;&nbsp;<a href="action.asp?action=del&id=<%=subrs("id")%>">[删除]</a>

<%end if%>
	
	
	
	</div></td>
  </tr>
<%
	subrs.movenext
    if subrs.eof then
	j = j + 1
	exit for
    End If
    next
end if
    subrs.close
%> 
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><form id="form1" name="form1" method="post" action="action.asp">
  <tr>
    <td height="100" align="right">发表评论：</td>
    <td align="left">
	    <input name="action" type="hidden" value="post"/>
        <textarea name="ccontent" cols="60" rows="4" class="input" id="textarea"></textarea>
	    <input name="cauthor" type="hidden" value="<%=user%>"/>
		<input name="irole" type="hidden" value="<%=irole%>"/>
	    <input name="ctype" type="hidden" value="3"/>
	    <input name="cparent" type="hidden" value="<%=id%>"/>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><input type="submit" class="button" value="评&nbsp;论" ></td>
  </tr></form>
</table>

 
 </div> 
 
 
</div></div>

<div id="detailbodyfotter"></div>

</div>
<!--end of indexbody-->
</div><!--end of wrapper-->
<%end if%>
<div id="hide">
<script src="http://s4.cnzz.com/stat.php?id=975780&web_id=975780" language="JavaScript"></script>
</div>
</body>
</html>
