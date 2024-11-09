# ExamenFinal
Examen Final Semestre VI Christian Ordon

Funcionalidades
La aplicación permite realizar las siguientes acciones:

Crear una nueva tarea: Permite al usuario agregar una tarea con un título, descripción y un estado (completada o pendiente).

Listar todas las tareas: Muestra una lista de todas las tareas en la base de datos(es una opcion automatica des sistema).

Actualizar una tarea existente: Permite al usuario editar el título, la descripción y el estado de una tarea.

Eliminar una tarea: Permite al usuario eliminar una tarea de la base de datos.



Requisitos
PHP (versión 7.4 o superior)
MySQL (con acceso a phpMyAdmin o línea de comandos para gestionar bases de datos)
XAMPP o MAMP (para ejecutar el servidor Apache y la base de datos MySQL en tu máquina local)
Visual Studio Code (como editor de código)

Instalación
Paso 1: Clonar el repositorio
Clona el repositorio o descarga los archivos de este proyecto en tu equipo local.


Paso 2: Configurar la Base de Datos
Abre phpMyAdmin o tu herramienta de gestión de bases de datos MySQL.
Crea una base de datos llamada todo_db.

Ejecuta el siguiente SQL para crear la tabla de tareas:

Copiar código
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status BOOLEAN NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

O importar en phpMyAdmin el archivo de base de datos incluido en este repositorio.

Paso 3: Iniciar el Servidor

Abre XAMPP o MAMP y asegúrate de que los servicios de Apache y MySQL estén en ejecución.
Coloca la carpeta del proyecto dentro del directorio htdocs (si usas XAMPP).

Accede a la aplicación a través de tu navegador en la siguiente URL:

http://localhost/ExamenFinal/index.php

Paso 4: Usar la Aplicación
Crear una tarea: Ingresa un título, una descripción y marca el checkbox si la tarea está completada.

Listar tareas: Verás todas las tareas almacenadas en la base de datos.

Actualizar una tarea: Haz clic en "Editar" junto a cualquier tarea para actualizar su información, esto enviara a una nueva pagina donde se podra cambiar los campos y el estado de la tarea.

Eliminar una tarea: Haz clic en "Eliminar" para borrar una tarea, el sistema pedira confirmacion para la eliminacion de tareas.


Estructura del Proyecto

La estructura del proyecto es la siguiente:


ExamenFinal/
├── index.php          # Página principal que muestra y agrega tareas
├── update.php         # Página para actualizar una tarea
├── delete.php         # Página para eliminar una tarea
├── style.css          # Archivo de estilos CSS
├── script.js          # Archivo de JavaScript para interactividad (si es necesario)
└── db.php             # Conexión a la base de datos

Tecnologías Utilizadas
PHP: Para la lógica del servidor.
MySQL: Para la base de datos.
HTML: Para la estructura de la página.
CSS: Para los estilos visuales.
JavaScript: Para interactividad (opcional).
