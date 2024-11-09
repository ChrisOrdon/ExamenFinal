<?php
include('db.php');

// Crear tarea
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0; // 0 = pendiente, 1 = completada

    $sql = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$description', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "Tarea creada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Listar tareas
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIERSIDAD REGIONAL</title>
    <title>Lista de Tareas - Christian Ordón</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Tareas - Christian Ordón</h1>

    <!-- Formulario para crear tarea -->
    <form method="POST">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>
        <label for="description">Descripción</label>
        <textarea name="description" id="description"></textarea>
        <label for="status">Completada</label>
        <input type="checkbox" name="status" id="status">
        <button type="submit">Agregar Tarea</button>
    </form>

    <!-- Mostrar tareas -->
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status'] ? 'Completada' : 'Pendiente'; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>">Editar</a> |
                    <link rel="stylesheet" href="style.css">
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta tarea?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script src="script.js"></script>
</body>
</html>

<?php $conn->close(); ?>

