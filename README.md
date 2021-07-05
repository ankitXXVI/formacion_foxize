### REQUISITOS PARA EJECUTAR EL CÓDIGO

1. Tener instalado el binario de symfony --> https://symfony.com/download.
2. Conexión a servidor MySql, instalado en local o en docker.
3. Crear base de datos `formacion_foxize`.
4. Declarar conexión a MySql en fichero `.env` de la raíz del proyecto, en las variables de entorno `MOOC_DATABASE_*`.
   Indicar user, pass, nombre de base de datos, host, y puerto.
5. Para este ejercicio crearemos estructura de 
   carpeta  en `app\Backoffice`, como la carpeta
   `Users` que dejo como ejemplo para nuestros modelos.
6. Para ver los cambios sql a ejecutar en la base de datos ejecutar command: `bin/console app:schema:update-sql`.
   Cuando ejecutéis este comando, veréis un output como este (eso significará que tenéis conexión a base de datos):
   
   `CREATE TABLE backoffice_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE 'utf8_unicode_ci' ENGINE = InnoDB`
7. Para lanzar el server de symfony en local ejecutad en la raiz del proyecto: `symfony server:start` y os creará un server al vuelo con vuestro localhost:puerto


###### EJERCICIO:
Tenemos nuestro negocio de concesionario donde nuestro inventario lo tenemos en un excel en la oficina, queremos exportar nuestro excel a una base de datos para poder manejar nuestro inventario desde una web y a distancia, dado que la pandemia nos ha invitado a poder trabajar desde casa.

Tenemos que crear la estructura de este excel, que consta de un id, nombre, marca, modelo, fecha de entrada al concesionario y fecha de salida (entiendase como fecha de venta si se ha vendido)
 para poder introducir los coches en la base de datos. 

Por exigencias de nuestro negocio tendremos que hacer reutilizable este caso de uso, ya que tenemos una api expuesta para nuestra app mobile, utilizaremos un command, commandhandler y caso de uso para crear nuestros coches.
También tendremos que logar cada ejecución correcta de nuestro command en base de datos mediante un middleware, con el nombre de la clase del command y una fecha de ejecución.

Extra: crear un middleware de transacciones de base de datos para nuestro command bus y olvidarnos de los flush en cada caso de uso.
