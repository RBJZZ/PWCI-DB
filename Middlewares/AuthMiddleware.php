<?php
class AuthMiddleware {
    public static function verificarUsuario($requiredRole = null) {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'No autorizado']);
            exit;
        }

        if ($requiredRole && $_SESSION['user_type'] !== $requiredRole) {
            http_response_code(403);
            echo json_encode(['error' => 'Permiso denegado']);
            exit;
        }
    }
}

?>