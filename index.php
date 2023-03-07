<!DOCTYPE html>
<html>
<head>
	<title>conect oracle and php</title>
</head>
<body>
<h1>ORACLE Y PHP</h1>
<form method="POST" action="index.php">
	<select name="opciones">
		<option value="INSERTAR">INSERTAR</option>
		<option value="ELIMINAR">ELIMINAR</option>
		<option value="ACTUALIZAR">ACTUALIZAR</option>
		<option value="CREAR">CREAR</option>
	</select><br>
	<h3>Nombre: </h3><input type="text" name="nombre" required="INTRODUCIR DATO">
	<h3>Edad: </h3><input type="number" name="edad">
	<input type="submit" value="Ejecutar Click" name="ejecutor">
</form>
<?php
/*include('conect.php');
$cnn = oci_connect($user, $pswr);
$sql = "CREATE TABLE amigos(nombre varchar2(15), edad number(2))";
$unir = oci_parse($cnn, $sql);
oci_execute($unir);
echo "TABLA CREADA EXITOSAMENTE";
*/?>
<?php
    $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.162)(PORT = 1522)))(CONNECT_DATA=(SID=xe)))" ;

    if($c = OCILogon("SYSTEM", "oraclebase21", $db))
    {
    	if(isset($_POST['ejecutor'])){
    		$opciones=$_POST['opciones'];
    		$nombre=$_POST['nombre'];
    		$edad=$_POST['edad'];

    		switch ($opciones) {
    			case 'INSERTAR':
    				$sql = "INSERT INTO amigos VALUES('$nombre','$edad')";
					$unir = oci_parse($c, $sql);
					oci_execute($unir);
					echo "DATOS INSERTADOS EXITOSAMENTE";
        			echo "Successfully connected to Oracle.\n";
    				break;
    			case 'ELIMINAR':
    				# code...
    				break;
    			case 'ACTUALIZAR':
    				# code...
    				break;
    			case 'CREAR':
    				$sql = "CREATE TABLE amigos(nombre varchar2(15), edad number(2))";
					$unir = oci_parse($c, $sql);
					oci_execute($unir);
					echo "TABLA CREADA EXITOSAMENTE";
        			echo "Successfully connected to Oracle.\n";
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}
    	/*$sql = "CREATE TABLE amigos(nombre varchar2(15), edad number(2))";
		$unir = oci_parse($c, $sql);
		oci_execute($unir);
		echo "TABLA CREADA EXITOSAMENTE";
        echo "Successfully connected to Oracle.\n";
        */
        OCILogoff($c);
    }else{
        $err = OCIError();
        echo "Connection failed." . $err[text];
    }
?>
</body>
</html>