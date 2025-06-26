<?php
try {
    $conn = new PDO("sqlsrv:Server=localhost,1433;Database=master", "sa", "S3nh@F0rte2024");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida com o banco master!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
