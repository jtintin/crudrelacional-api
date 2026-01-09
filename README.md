# CRUD Relacional API en PHP

API RESTful en PHP con PDO y MySQL.
Permite crear, leer, actualizar y eliminar productos 

## ⚙️ Instalación rápida

### Clona el repositorio:
```bash
git clone https://github.com/tuusuario/crudrelacional-api.git
cd crudrelacional-api
```
2. **Configura tu base de datos** en .env.php usando .env.example.php como referencia.

3. **Accede directamente a la API** desde tu navegador:
```url
http://localhost/crudrelacional-api/api.php
```
## 🚀  **Uso básico**

- **GET** → Listar productos
- **POST** → Crear producto
- **PUT** → Actualizar producto
- **DELETE** → Eliminar producto

## 🧪  **Pruebas con curl**

🔹 **GET - Todos los productos**
```bash
curl -X GET http://localhost/api/crudrelacional-api/api.php
```
**En Windows:**
```bash
curl.exe  -X GET http://localhost/api/crudrelacional-api/api.php
```

🔹 **GET - Producto por ID (ejemplo id=27)**
```bash
curl -X GET "http://localhost/api/crudrelacional-api/api.php?id=27"
```
🔹 **POST - Crear producto**
```bash
curl -X POST http://localhost/api/crudrelacional-api/api.php -H "Content-Type: application/json" -d '{ "nombre": "Camisa deportiva", "precio": 29.99, "categoria_id": 2, "foto": "camisa.jpg" }'
```
🔹 **PUT - Actualizar producto**
```bash
curl -X PUT http://localhost/api/crudrelacional-api/api.php -H "Content-Type: application/json" -d '{ "id": 28, "nombre": "Camisa formal", "precio": 35.50, "categoria_id": 2, "foto": "camisa_formal.jpg" }'
```
🔹 **DELETE - Eliminar producto**
```bash
curl -X DELETE http://localhost/api/crudrelacional-api/api.php -H "Content-Type: application/json" -d '{ "id": 28 }'
```