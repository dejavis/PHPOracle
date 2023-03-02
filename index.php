<!DOCTYPE html>
<html>
<head>
	<title>conect oracle and php</title>
</head>
<body>
<h1>ORACLE Y PHP</h1>
<form>
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
    	$sql = "CREATE TABLE amigos(nombre varchar2(15), edad number(2))";
		$unir = oci_parse($c, $sql);
		oci_execute($unir);
		echo "TABLA CREADA EXITOSAMENTE";
        echo "Successfully connected to Oracle.\n";
        OCILogoff($c);
    }
    else
    {
        $err = OCIError();
        echo "Connection failed." . $err[text];
    }
?>
</body>
</html>