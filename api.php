<?php
header('Content-Type: application/json');
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];
$input  = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        getProductos($pdo);
        break;
    case 'POST':
        createProducto($pdo, $input);
        break;
    case 'PUT':
        updateProducto($pdo, $input);
        break;
    case 'DELETE':
        deleteProducto($pdo, $input);
        break;
    default:
        echo json_encode(['error' => 'Método no soportado']);
        break;
}

/**
 * Obtener todos los productos
 */
function getProductos($pdo) {
    if (isset($_GET['id'])) {
        $query = "SELECT * FROM productos WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $_GET['id']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row ?: []);
    } else {
        $query = "SELECT * FROM productos";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
}

/**
 * Crear un nuevo producto
 */
function createProducto($pdo, $input) {
    $query = "INSERT INTO productos (nombre, precio, categoria_id, foto) 
              VALUES (:nombre, :precio, :categoria_id, :foto)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nombre' => $input['nombre'],
        ':precio' => $input['precio'],
        ':categoria_id' => $input['categoria_id'],
        ':foto' => $input['foto']
    ]);
    echo json_encode([
        'id' => $pdo->lastInsertId(),
        'nombre' => $input['nombre'],
        'precio' => $input['precio'],
        'categoria_id' => $input['categoria_id'],
        'foto' => $input['foto']
    ]);
}

/**
 * Actualizar un producto existente
 */
function updateProducto($pdo, $input) {
    $query = "UPDATE productos 
              SET nombre = :nombre, precio = :precio, categoria_id = :categoria_id, foto = :foto 
              WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nombre' => $input['nombre'],
        ':precio' => $input['precio'],
        ':categoria_id' => $input['categoria_id'],
        ':foto' => $input['foto'],
        ':id' => $input['id']
    ]);
    echo json_encode([
        'id' => $input['id'],
        'nombre' => $input['nombre'],
        'precio' => $input['precio'],
        'categoria_id' => $input['categoria_id'],
        'foto' => $input['foto']
    ]);
}

/**
 * Eliminar un producto
 */
function deleteProducto($pdo, $input) {
    $id = $input['id'] ?? $_GET['id'] ?? null;

    if (!$id) {
        echo json_encode(['error' => 'No se recibió id']);
        return;
    }

    $query = "DELETE FROM productos WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['message' => "Producto {$id} eliminado"]);
    } else {
        echo json_encode(['error' => "No existe producto con id {$id}"]);
    }
}
?>

