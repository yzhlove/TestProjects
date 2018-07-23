function GetXmlHttpObject()
{
    var xmlHttp=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function getAjaxData(x,y,action) {
    var xmlHttpObject = GetXmlHttpObject();
    if (xmlHttpObject == null) {
        alert('browser not support Ajax!');
    }
    var url = "03.php?action=" + action + "&x="+ x + "&y=" + y + "&time=" + Math.random();
    xmlHttpObject.open("GET",url,false);
    xmlHttpObject.send();
    return xmlHttpObject.responseText;
}