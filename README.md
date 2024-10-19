# web.tpe.base

# Modelo de datos de libreria

    Integrantes:

    Geronimo Oliveto

    e-mail: gerooliveto@gmail.com
   

## Descripción
Este proyecto es una web dinámica para la gestión de una biblioteca, 
desarrollada como parte del Trabajo Práctico Especial (TPE) para la materia de web II. 
El sitio permite gestionar libros y autores, tanto en su acceso público como en su área administrativa,
siguiendo el patrón de diseño **MVC** (Modelo-Vista-Controlador). 
Además, cuenta con la funcionalidad **CRUD** (Crear, Leer, Actualizar y Eliminar) para los autores.

### Funcionalidades principales:
1. **Acceso público**:
   - Listado de autores con su nombre y nacionalidad.
   - Puede verse a que libros esta asociado su autor si se quisiese. (no en profundidad)
 
  
2. **Acceso administrativo**:
   - Login para usuarios administradores.
   - Administración de autores (crear, editar, eliminar, subir foto).

## Tecnologías utilizadas
- **PHP**: Backend y lógica del servidor.
- **MySQL**: Base de datos para almacenar la información de los autores y libros.
- **Bootstrap**: Estilos responsivos y diseño de la interfaz.
- **Smarty**: Sistema de plantillas para generar el HTML dinámicamente.
- **MVC (Modelo-Vista-Controlador)**: Estructura para organizar el código.

## Instalación y despliegue
1. Clona el repositorio:
   ```bash
   git clone https://github.com/usuario/web.tpe.base.git

2. Configura el archivo config.php con los datos de conexión a tu base de datos MySQL.

3. Carga el archivo SQL proporcionado (libreria.sql) en tu servidor MySQL para crear la base de datos con los datos iniciales:
     mysql -u usuario -p contraseña biblioteca < database/biblioteca.sql

4. Ejecuta el servidor local (por ejemplo, utilizando XAMPP o MAMP) y accede a la web desde tu navegador:
  http://localhost/web.tpe.base/

## Usuarios de prueba
  Usuario administrador: webadmin
  Contraseña: admin

# Diagrama
  ![Diagrama](<db.png>
)

