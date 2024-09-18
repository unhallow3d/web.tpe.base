# web.tpe.base

# Modelo de datos de libreria

    Integrantes:

    Geronimo Oliveto

    e-mail: gerooliveto@gmail.com

    Ivan Batalla

    e-mail: ibatalla132@gmail.com

   


    Este modelo de datos es utilizado para gestionar una biblioteca. Entre sus principales tablas encontramos:
    Una tabla que almacena informacion sobre los autores de los libros, una para las editoriales, una para los mismos libros y, por ultimo,
    una para sus generos. Todas ellas con identificadores unicos, sus atributos y relaciones.
    También este modelo posee una tabla de clientes y una de prestamos.
    En cuanto a la tabla generos_libros, esta se encarga de relacionar a un libro con mas de un genero si se quisiese.
    Por el momento, se usaron diversas restricciones en cada tabla para observar sus variaciones. 
    Un ejemplo de ellas, es que si se intenta borrar la editorial y esta está vinculada a un libro, se restringira. 
    En cambio, en el caso de los autores, se borraran ambos en cascada.

# Diagrama
  ![Diagrama](<db.png>
)
