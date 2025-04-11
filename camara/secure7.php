<?php
$correct_password = "a";
$access_granted = false;
$log_file = 'access_log.txt'; 
// Registra el intento fallido
function logAttempt($message) {
    global $log_file;
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($log_file, "[$timestamp] $message\n", FILE_APPEND);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password"] === $correct_password) {
        $access_granted = true;
    } else {
        $error = "❌ Contraseña incorrecta.";
        logAttempt("Intento fallido con contraseña: " . $_POST["password"]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>💀 Hacker Access Panel</title>
    <style>
        body {
            background-color: #0f0f0f;
            color: #00ff00;
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        input[type="password"] {
            padding: 10px;
            background-color: black;
            border: 1px solid #00ff00;
            color: #00ff00;
            font-size: 1em;
        }

        button {
            padding: 10px 20px;
            background-color: #000;
            border: 1px solid #00ff00;
            color: #00ff00;
            margin-top: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        video {
            border: 2px solid #00ff00;
            margin-top: 20px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Botones falsos de cámaras */
        .camera-buttons {
            margin-top: 20px;
        }

        .camera-buttons button {
            background-color: #0f0f0f;
            color: #00ff00;
            border: 1px solid #00ff00;
            padding: 10px;
            margin: 5px;
            cursor: pointer;
        }

        .camera-buttons button:hover {
            background-color: #00ff00;
            color: #0f0f0f;
        }

        /* Mostrar/ocultar el formulario */
        .form-container {
            display: none;
        }

        .show-form {
            display: block;
        }
    </style>
</head>
<body>

<?php if ($access_granted): ?>
    <div class="fade-in">
        <h1>📹 Acceso concedido - Reproduciendo video secreto</h1>
        <video width="720" height="405" controls autoplay>
            <source src="segurida.mp4" type="video/mp4">
            Tu navegador no soporta el video.
        </video>

        
        <div class="camera-buttons">
            <button onclick="window.location.href='infiltracion.html';">🔴 Control de cámara 1 (Infiltración)</button>
            <button>Control cámara</button>
            <button onclick="showLoginForm()">🔑 Volver a ingresar la contraseña</button>
        </div>
    </div>
<?php else: ?>
    <h1>🔐 Acceso restringido</h1>
    <form method="POST">
        <input type="password" name="password" placeholder="Contraseña de acceso" required>
        <br>
        <button type="submit">INGRESAR</button>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    </form>
<?php endif; ?>

<script>
    function showLoginForm() {
        window.location.href = ''; 
    }
</script>

</body>
</html>