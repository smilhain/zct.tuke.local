<?php

$db = mysqli_connect("viibes_zct", "viibes_zct", "#R~vDj3b77", "viibes_zct");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Получение переменных из ссылки
    $temperature = $_GET['temperature'];
    $humidity = $_GET['humidity'];
    $created_at = date('Y-m-d H:i:s');

    $query = "INSERT INTO meteo (temperature, humidity, created_at) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 'dds', $temperature, $humidity, $created_at);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

mysqli_close($db);

?>