<?php
$datos = simplexml_load_file("./books.xml");
echo "</br>";
if($datos === FALSE){
 echo "No existe el fichero books.xml";
}
else{
/* foreach($datos as $valor){
    echo "<pre>";
    print_r($valor);
    echo "</br>";
    echo "</pre>";
} */
}

echo "<p>-------------------------</p>";
 
$titulos = $datos->xpath("//title");
foreach($titulos as $titulo){
    echo "<pre>";
    print_r($titulo); //echo $precio[0]; -> mostrar precio sin etiquetas.
    echo "</br>";
    echo "</pre>";
}
/*
foreach($datos as $valor){
    echo "<pre>";
    echo $valor->TITULO.":".$valor->PRECIO;
    echo "</pre>";
} */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica simpleXML</title>
</head>
<body>
    <h2>Libro 3.8.1</h2>
    <ul>
        <li>
            <p>paso 1: Carga del documento XML con : simplexml_load_file("./nombreArchivo.xml")</p>
        <li>
            <p>paso 2: Asignación de contexto en variable para fácil manejo : datos = paso 1</p>
        </li>
        <li>
            <p>paso 3: Tratamiento de los datos: ejemplo: foreach($datos as $valor)</p>
        </li>
        <li>
            <p>paso 4: Podemos usar XPATH para acceder a los nodos: $titulos = $datos->xpath("//TITLE");
                Tras eso, solo debemos generar la salida: foreach($titulos as $titulo);
            </p>
        </li>
        <li>
            <p>paso 5: Podemos usar XSD para validación o XSLT para transformación: es necesario la libreria xsl.dll de PHP:</br>
                apt update && apt-get install -y libxslt-dev</br>
                docker-php-ext-install xsl </br>
                modificar php.ini</br>
                extension = xsl.so
            </p>
        </li>
        <li>
            <p>paso 6: Ahora podemos crear el xslt: una buena herramienta: <a href="https://www.w3schools.com/xml/tryxslt.asp?xmlfile=cdcatalog&xsltfile=cdcatalog">Herramienta W3C</a></br>
            </p>
        </li>
        <li>
            <p>paso 7: Ahora vinculamos el transformador con el XML: 
                $dept = new DOMDocument();</br>
                $dept ->load('books.xml');</br>

                //Cargar el xslt</br>
                $transformacion = new DOMDocument();</br>
                $transformacion->load("books.xslt");</br>
                //Definimos el procesador de XML a HTML</br>
                $procesador = new XSLTProcessor();</br>
                $procesador->importStylesheet($transformacion);</br>
                $transformada = $procesador->transformToXml($dept);</br>
                echo $transformada; 
            </p>
        </li>
    </ul>
</body>
</html>