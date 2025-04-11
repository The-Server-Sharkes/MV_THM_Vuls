<?php
$correct_password = "a";
$access_granted = false;
$log_file = 'access_log.txt'; // El archivo de log

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
        $error = "  Contraseña incorrecta.";
        logAttempt("Intento fallido con contraseña: " . $_POST["password"]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>��� Hacker Access Panel</title>
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
                                                                                                                                                                                                                                [ Read 148 lines ]
^G Get Help                                                                  ^O WriteOut                                                                  ^R Read File                                                                 ^Y Prev Page                                                                 ^K Cut Text                                                                  ^C Cur Pos
^X Exit  