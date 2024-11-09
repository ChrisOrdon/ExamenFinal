// URL base de la API
const API_URL = 'http://localhost/todo-app/';

// Función para obtener todas las tareas
async function fetchTasks() {
    try {
        const response = await fetch(`${API_URL}index.php?action=list`);
        const tasks = await response.json();
        const taskList = document.getElementById('task-list');
        taskList.innerHTML = ''; // Limpiar la lista de tareas
        tasks.forEach(task => {
            const li = document.createElement('li');
            li.innerHTML = `
                <strong>${task.title}</strong><br>
                ${task.description}<br>
                Status: ${task.status ? 'Completed' : 'Pending'}<br>
                <button onclick="editTask(${task.id})">Edit</button>
                <button onclick="deleteTask(${task.id})">Delete</button>
            `;
            taskList.appendChild(li);
        });
    } catch (error) {
        console.error('Error fetching tasks:', error);
    }
}

// Función para agregar una nueva tarea
async function addTask() {
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const status = document.getElementById('status').checked ? 1 : 0;

    const task = { title, description, status };

    try {
        const response = await fetch(`${API_URL}index.php?action=add`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(task),
        });

        if (response.ok) {
            alert('Task added successfully!');
            fetchTasks(); // Refresh the task list
        } else {
            alert('Failed to add task');
        }
    } catch (error) {
        console.error('Error adding task:', error);
    }
}

// Función para editar una tarea
function editTask(id) {
    const title = prompt('Enter new title:');
    const description = prompt('Enter new description:');
    const status = confirm('Is this task completed?') ? 1 : 0;

    const task = { id, title, description, status };

    fetch(`${API_URL}index.php?action=edit`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(task),
    })
    .then(response => {
        if (response.ok) {
            alert('Task updated successfully!');
            fetchTasks(); // Refresh the task list
        } else {
            alert('Failed to update task');
        }
    })
    .catch(error => {
        console.error('Error editing task:', error);
    });
}

// Función para eliminar una tarea
function deleteTask(id) {
    if (confirm('Are you sure you want to delete this task?')) {
        fetch(`${API_URL}index.php?action=delete&id=${id}`, {
            method: 'GET',
        })
        .then(response => {
            if (response.ok) {
                alert('Task deleted successfully!');
                fetchTasks(); // Refresh the task list
            } else {
                alert('Failed to delete task');
            }
        })
        .catch(error => {
            console.error('Error deleting task:', error);
        });
    }
}

// Cargar tareas al iniciar la página
document.addEventListener('DOMContentLoaded', () => {
    fetchTasks();
});
