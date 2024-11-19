<?php
include_once '../Models/Consultas.php';
include_once '../Models/Conexion.php';

$conexion = new Conexion();
$consulta = new Consultas($conexion->conn);
session_start();


function authorizeSeller() {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'seller') {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No autorizado. Inicie sesión como vendedor.']);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    authorizeSeller();
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    $vendedorId = $_SESSION['user_id'];
    $categoriaId = $data['categoriaId'] ?? null;
    $fechaInicio = $data['fechaInicio'] ?? null;
    $fechaFin = $data['fechaFin'] ?? null;
    $tipoConsulta = $data['tipoConsulta'] ?? null;

    if ($tipoConsulta === null || !in_array($tipoConsulta, ['1', '2', '3'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Tipo de consulta no válido o faltante.']);
        exit;
    }

    try {
        $resultados = $consulta->consultarVentas($vendedorId, $categoriaId, $fechaInicio, $fechaFin, $tipoConsulta);
        echo json_encode($resultados);
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '/path/to/error.log');
        http_response_code(500);
        echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
    }
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    authorizeSeller();
    header('Content-Type: application/json');

    $vendedorId = $_SESSION['user_id'];
    $categoriaId = isset($_GET['categoriaId']) ? intval($_GET['categoriaId']) : null;

    try {
        $resultados = $consulta->getProducts($vendedorId, $categoriaId);

        if ($resultados) {
            echo json_encode($resultados);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No se encontraron productos.']);
        }
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '/path/to/error.log');
        http_response_code(500);
        echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
    }
    exit;
}

// Fallback for unsupported methods
http_response_code(405);
header('Content-Type: application/json');
echo json_encode(['error' => 'Método no permitido.']);
?>
