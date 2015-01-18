---
title: VBA Web Service Call
layout: post
category: blog
tags:
- VBA
permalink: /blog/2009/03/19/vba-web-service-call

---
{% include JB/setup %}
<div id="node-52" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The code below provides a function to sychronously get the response body from a web address. The string length limit is provided to reduce the parse time when the body is only long on-error.</p>
<pre class="brush:vb">
Function getText(strUri As String, _
                 Optional lngLimit As Long = 0) As String
On Error Resume Next
    Dim bytResponse() As Byte, _
        lngI As Long, _
        lngMax As Long
    Err.clear
    getText = ""
    ' Get the response as a bytearray.
    bytResponse = libWebService.getByteArray(strUri)
    ' Look for errors.
    If Err.Number &lt;&gt; 0 Then
        MsgBox Err.description
        Err.clear
        Exit Function
    End If
    ' Convert the response to a string.
    lngMax = UBound(bytResponse)
    If lngLimit &gt; 0 Then
        lngMax = Min(lngLimit, lngMax)
    End If
    For lngI = 0 To lngMax
        getText = getText &amp; Chr(255 And AscB(MidB(bytResponse, lngI + 1, 1)))
    Next
End Function
Function getByteArray(strUri As String) As Byte()
On Error Resume Next
    Dim web As Object, _
        lngI As Long, _
        lngMax As Long, _
        strErr As String
    Err.clear
    ' Load the web request object.
    Set web = CreateObject("WinHttp.WinHttpRequest.5.1")
    If web Is Nothing Then
        Set web = CreateObject("WinHttp.WinHttpRequest")
        If web Is Nothing Then
            Set web = CreateObject("MSXML2.ServerXMLHTTP")
            If web Is Nothing Then
                Set web = CreateObject("Microsoft.XMLHTTP")
            End If
        End If
    End If
    ' Prep the URI.
    If Left(strUri, 1) = "/" Then
        strUri = "http://localhost:81" &amp; strUri
    End If
    ' Open the URI.
    web.Open "GET", strUri, False
    web.send
    If Err.Number &lt;&gt; 0 Then
        Set web = Nothing
        Exit Function
    End If
    If web.status &lt;&gt; "200" Then
        Err.Raise -1, "libWebService", web.status &amp; " Unable to load the page"
        Set web = Nothing
        Exit Function
    End If
    getByteArray = web.ResponseBody
    Set web = Nothing
End Function</pre>
</div></div></div>  </div>
</div>
