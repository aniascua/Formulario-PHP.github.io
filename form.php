<?php 
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$materia = $_POST['materia'];
$telefono = $_POST['telefono'];

if(!empty($nombre) || !empty($password) || !empty($genero) || !empty($email) || !empty($materia) || !empty($telefono)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "estudiante";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if($conn->connect_error){
        die('Connection failed! : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO usuario(nombre,password,genero,email,materia,telefono)values(?,?,?,?,?,?)");
        $stmt->bind_param("sssssi", $nombre, $password, $genero,$email,$materia,$telefono);
        $stmt->execute();
        echo "REGISTRO COMPLETADO!";
        $stmt->close();
        $conn->close();
    }
    
    // ACA EMPIEZA LO VIEJO
   /* $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
  /*    $SELECT = "SELECT telefono from usuario where telefono = ? limit 1 ";
        $INSERT = "INSERT INTO usuario (nombre,password,genero,email,materia,telefono)values(?,?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("i", $telefono);
        $stmt ->execute();
        $stmt ->bind_result($telefono);
        $stmt ->store_result();
        $rnum ->$stmt->num_rows;
        if($rnum == 0){
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("s,s,s,s,s,i", $nombre,$password,$genero,$email,$materia,$telefono);
            $stmt ->execute();
            echo "REGISTRO COMPLETADO.";
        }
        else{
            echo "Alguien ya registró ese número anteriormente";
        }
        $stmt->close();
        $conn->close();

    }
*/
}
/*else{
    echo "TODOS LOS DATOS SON OBLIGATORIOS";
    die();
}*/
?>