// JavaScript Document
function eliminar(id,url)
{
	if(confirm("¿Desea Eliminar el Registro?"))
	{
		window.location=url+"?id="+id;
	}
	
}
