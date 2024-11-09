<?php
include('db.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tasks WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Tarea eliminada con éxito";
        header("Location: index.php");
    } else {
        echo "Error al eliminar la tarea: " . $conn->error;
    }
}

$conn->close();
?>
