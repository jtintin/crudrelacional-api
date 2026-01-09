CRUD Relacional API en PHP

API RESTful en PHP con PDO y MySQL.
Permite crear, leer, actualizar y eliminar productos con soporte para imágenes.
Fácil de integrar y extender en proyectos propios.
⚙️ Instalación rápida

Clona el repositorio:
git clone https://github.com/tuusuario/crudrelacional-api.git
cd crudrelacional-api

Configura tu base de datos en .env.php usando .env.example.php como referencia.

Accede directamente a la API desde tu navegador:
http://localhost/crudrelacional-api/api.php
🚀 Uso básico

GET → Listar productos
POST → Crear producto
PUT → Actualizar producto
DELETE → Eliminar producto
🧪 Pruebas con curl

GET - Todos los productos
curl -X GET http://localhost/api/crudrelacional-api/api.php
En Windows:
curl.exe  -X GET http://localhost/api/crudrelacional-api/api.php

GET - Producto por ID (ejemplo id=27)
curl -X GET "http://localhost/api/crudrelacional-api/api.php?id=27"

POST - Crear producto
curl -X POST http://localhost/api/crudrelacional-api/api.php -H "Content-Type: application/json" -d '{ "nombre": "Camisa deportiva", "precio": 29.99, "categoria_id": 2, "foto": "camisa.jpg" }'

PUT - Actualizar producto
curl -X PUT http://localhost/api/crudrelacional-api/api.php -H "Content-Type: application/json" -d '{ "id": 28, "nombre": "Camisa formal", "precio": 35.50, "categoria_id": 2, "foto": "camisa_formal.jpg" }'
Pendiente mejorar al igual que la aplicación web, para el tratamiento de las imágenes.

DELETE - Eliminar producto
curl -X DELETE http://localhost/api/crudrelacional-api/api.php -H "Content-Type: application/json" -d '{ "id": 28 }'