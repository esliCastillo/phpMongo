<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once("config.php");
$linea = 0;
//Abrimos nuestro archivo
$archivo = fopen("prueba.csv", "r");
//Lo recorremos
$header = array();
$primero = true;
$nameCollection = "testToCsv";
while (($datos = fgetcsv($archivo, ",")) == true) {
  $num = count($datos);
  $linea++;
  //Recorremos las columnas de esa linea
  $data = array();
  for ($columna = 0; $columna < $num; $columna++) {
    if($primero){
      $header[] = $datos[$columna];
    }
    else{
      $data[$header[$columna]] = $datos[$columna];
    }
         //echo $datos[$columna] . "\n<br>";
  }
  if($primero == false){
    $db->$nameCollection->insert($data);
  }
  //echo "<pre>";print_r($data);echo "</pre>";
  $primero = false;
}
//Cerramos el archivo
fclose($archivo);

echo "Archivo pasado con exito: <br/>";
echo "name collection: " . $nameCollection;


