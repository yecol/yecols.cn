<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="startup.asp"-->
<% 
iname=trim(request("user"))
ipwd=trim(request("password"))
sql="select * from [user] where username='"&iname&"' and password='"&ipwd&"'"
set rs=Server.CreateObject("adodb.recordset")
set rs=oConn.execute(sql)
'response.Write(nRs.Fields.Item(4).Name &".SIZE = "& nRs.Fields.Item(4).Size & "<br>")
If (not rs.eof) And (not rs.bof) Then
			
			Session.TimeOut=60
			Session("user") = rs("username")
			Session("irole") = rs("role")
			rs.close
		    Response.Redirect("list.asp")
			

		else
			sErrMsg = "用户名和密码错误！"
			call alertBack(sErrMsg)
		End If
%>