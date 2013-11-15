<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="startup.asp"-->
<%
Response.Charset="utf-8"
act = GetSafeStr(request("action"))
id = StrToIntDef(trim(request("id")),0)
user = Session("user")
irole =  Session("irole")


'oConn.open

temp = "听写练习"

		oConn.execute("update contents set title='"&temp&"' where type=2 and parent=514")
		alertBack("Stoped.")

%>
