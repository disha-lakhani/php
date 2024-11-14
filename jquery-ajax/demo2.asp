<%
' Retrieve form data
dim fname, city
fname = Request.Form("name")
city = Request.Form("city")

' Generate and send response
Response.Write("Dear " & fname & ", hope you live well in " & city & ".")
%>