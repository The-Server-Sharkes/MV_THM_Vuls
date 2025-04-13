<?php
// Lógica de validación del login
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$clave = isset($_POST['clave']) ? $_POST['clave'] : '';

$usuarios_validos = [
    "lucy" => "1234",
    "director" => "admin2024"
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($usuarios_validos[$usuario]) && $usuarios_validos[$usuario] === $clave) {
        $login_exitoso = true;
    } else {
        $login_exitoso = false;
    }
} else {
    $login_exitoso = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #1a1a1a;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .login-box {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            width: 350px;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #0078d7;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #555;
            border-radius: 6px;
            background: #333;
            color: white;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: #0078d7;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #0078d7;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #005fa3;
        }

        .success {
            display: none;
            background: #28a745;
            padding: 30px;
            border-radius: 8px;
            font-size: 20px;
            text-align: center;
            width: 400px;
        }

        .error {
            display: none;
            background: #dc3545;
            padding: 20px;
            border-radius: 8px;
            color: white;
            text-align: center;
            font-size: 18px;
            width: 400px;
        }

        .footer {
            margin-top: 20px;
            color: #b0b0b0;
            font-size: 14px;
            text-align: center;
        }

        .footer a {
            color: #0078d7;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php if ($login_exitoso === null) : ?>
    <!-- Formulario de login -->
    <div class="login-box">
        <h2>Iniciar sesión</h2>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required />
            <input type="password" name="clave" placeholder="Contraseña" required />
            <button type="submit">Iniciar</button>
        </form>
    </div>

<?php elseif ($login_exitoso) : ?>
    <!-- Página de éxito -->
    <div class="success" id="success">
        <h1>✔ Inicio de sesión exitoso</h1>
        <p>Bienvenido, <strong><?php echo htmlspecialchars($usuario); ?></strong></p>
        <strong>THM{jUoPPPK54647HJG12LHJH90khK} </strong>
        <p>Redirigiendo a <a href="http://192.168.0.31/directorios4.php" target="_blank">http://theServerSharker.io</a>...</p>
    </div>
    <script>
vagrant@ububtu-server:/var/www/html$ ls
directorios4.php  index.html  infiltracion.html  info.html  info.php  log.txt  phishing.php  secure7.php  secure7.php.save  seguridad.html  segurida.mp4  video.mp4  vulnerable.php  windows2.php
vagrant@ububtu-server:/var/www/html$ cat directorios4.php 
<?php
// Directorio que deseas mostrar
$dir = "/home/vagrant"; 

// Abrir el directorio
if ($handle = opendir($dir)) {
    echo "<h2>Archivos en el directorio $dir</h2><ul>";
    
    // Leer todos los archivos del directorio
    while (false !== ($file = readdir($handle))) {
        // Ignorar los directorios especiales "." y ".."
        if ($file != "." && $file != "..") {
            // Generar un enlace para ver el contenido de cada archivo
            $filePath = "/home/vagrant/$file";
            echo "<li><a href='?file=$file'>$file</a></li>";
        }
    }
    
    echo "</ul>";
    closedir($handle);
} else {
    echo "No se pudo abrir el directorio.";
}

// Si se ha solicitado ver el archivo, mostrar su contenido
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = "/home/vagrant/$file";

    // Verificar que el archivo exista antes de intentar mostrarlo
    if (file_exists($filePath)) {
        // Mostrar el contenido del archivo
        echo "<h3>Contenido de $file</h3>";
        echo "<pre>" . htmlspecialchars(file_get_contents($filePath)) . "</pre>";
    } else {
        echo "El archivo no existe.";
    }
}
?>