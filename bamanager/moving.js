function mover(n)
{
	changeBgColor(n, "#FFEBE1");
}
function mout(n)
{
	changeBgColor(n, "#FFFFFF");
}

function changeBgColor(nId, szColor)
{
	var obj, szEval;
	szEval = "obj = document.getElementById('bgtr"+nId+"');";
	eval(szEval);
	szEval = "obj.bgColor = '"+szColor+"';";
	eval(szEval);	
}	