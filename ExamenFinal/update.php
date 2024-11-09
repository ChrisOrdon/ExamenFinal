<?php
include('db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0;

    $sql = "UPDATE tasks SET title='$title', description='$description', status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Tarea actualizada con éxito";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Tarea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Actualizar Tarea</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="<?php echo $task['title']; ?>" required>
        <label for="description">Descripción</label>
        <textarea name="description" id="description"><?php echo $task['description']; ?></textarea>
        <label for="status">Completada</label>
        <input type="checkbox" name="status" id="status" <?php echo $task['status'] ? 'checked' : ''; ?>>
        <button type="submit">Actualizar Tarea</button>
        <a href="index.php">Volver a la lista</a>
    </form>
    
</body>
</html>

<?php $conn->close(); ?>
