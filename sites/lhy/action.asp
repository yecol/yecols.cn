<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="startup.asp"-->
<%
Response.Charset="utf-8"
act = GetSafeStr(request("action"))
id = StrToIntDef(trim(request("id")),0)
user = Session("user")
irole =  Session("irole")
if user="" or irole="" then
			call alertTo("Log in first.","index.html")
end if

'oConn.open


Select Case act
	Case "stop"
		if id="" then 
			response.Write("|IDÎª¿Õ|")
			response.End()
		end if
		oConn.execute("update contents set statu=1 where id="&id)
		alertBack("Stoped.")
	Case "resume"
		if id="" then 
			response.Write("|IDÎª¿Õ|")
			response.End()
		end if
		oConn.execute("update contents set statu=0 where id="&id)
		alertBack("Resumed.")
	Case "del"
	    if id<>0 then
		    oConn.execute("delete from contents where id="&id)
			sErrMsg = "Deleted."
			alertBack(sErrMsg)
	    Else
		    response.Write("|IDÎª¿Õ|")
	    end if
    Case "post"
	    dim ctitle,ctime,cauthor,ptype,cparent,cdeadline
        'news_photo = GetSafeStr(request("news_photo"))
        ctitle = trim(request("ctitle"))
        ctime = trim(request("ctime"))
        cauthor = trim(request("cauthor"))
		ptype = trim(request("ctype"))
		cparent = trim(request("cparent"))
		cdeadline= trim(request("cdeadline"))
		ccontent=request.Form("ccontent")
        ccontent=replace(ccontent,vbcrlf,"<br>")
        'ccontent=replace(ccontent," ","&nbsp;")
        response.write content

       dim sql,rs
       set rs=server.createobject("adodb.recordset")
   
	      sql="select * from contents where id is null"
	      rs.open sql,oConn,1,3
	      rs.addnew
	      rs("title")=ctitle
	      rs("author")=cauthor
	      rs("time")=ctime
		  rs("type")=ptype
	      rs("parent")=cparent
	      rs("score")=0
	      rs("content")=ccontent
		  rs("deadline")=cdeadline
	      rs("statu")=0
	      rs.update
	      rs.close
	      call alertTo("Posted.","list.asp")
   
   Case "comment"
        'dim ctitle,ctime,cauthor,ptype,cparent,cdeadline
        'news_photo = GetSafeStr(request("news_photo"))
        cscore=trim(request("cscore"))
		ccontent=request.Form("ccontent")
        ccontent=replace(ccontent,vbcrlf,"<br>")
        'ccontent=replace(ccontent," ","&nbsp;")
        response.write content
		
       set rs=server.createobject("adodb.recordset")
		sql="select * from contents where id="&id
		response.Write(sql)
	      rs.open sql,oConn,1,3
	      rs("score")=cscore
	      rs("comment")=ccontent
	      'rs("beizhu")=beizhu
	      'if t<>0 then rs("type")=t
	      rs.update
	      rs.close
	      call alertBack("Commented.")
   
   Case Else
   		response.Write("|ID¡¾"&act&"¡¿yecol|")
	
End Select
%>
