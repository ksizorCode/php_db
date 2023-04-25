<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dicampus";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Generar datos aleatorios y ejecutar las consultas SQL para insertar las filas
for ($i = 1; $i <= 8; $i++) {
  // Generar nombres y apellidos aleatorios
  $nombre = "Alumno " . $i;
  $apellidos = "Apellido " . $i;
  
  // Generar ciudades aleatorias
  $ciudades = array("Madrid", "Barcelona", "Sevilla", "Valencia", "Bilbao");
  $ciudad = $ciudades[rand(0, 4)];
  
  // Generar fechas de nacimiento aleatorias
  $anio = rand(1990, 2005);
  $mes = rand(1, 12);
  $dia = rand(1, 28);
  $fecha_nacimiento = date('Y-m-d', mktime(0, 0, 0, $mes, $dia, $anio));
  
  // Generar nombres de archivo aleatorios para las fotos
  $foto = "foto" . $i . ".jpg";
  
  // Consulta SQL para insertar una fila en la tabla "alumnos"
  $sql = "INSERT INTO alumnos (nombre, apellidos, ciudad, fecha_nacimiento, foto)
  VALUES ('$nombre', '$apellidos', '$ciudad', '$fecha_nacimiento', '$foto')";
  
  // Ejecutar la consulta SQL
  if ($conn->query($sql) === TRUE) {
    echo "Fila $i insertada correctamente <br>";
  } else {
    echo "Error al insertar la fila $i: " . $conn->error . "<br>";
  }
}

// Cerrar la conexión
$conn->close();
?>
