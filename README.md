# Proyecto Final de TPI

## TÉCNICAS DE PROGRAMACIÓN PARA INTERNET, CICLO II 2020 "Proyecto Final de TPI"

### Integrantes:
* Marlon Salomón Coreas Villanueva CV18035
* José Alejandro Ibáñez MArtínez IM18002
* Carlos Iván Romero Hernández RH18030
* Carlos Alfonso Lemus Rodezno LR1800
* José Adolfo Guzamn Solis GS18030

### Requerimientos:
1. Las películas deben tener título, descripción, al menos una imagen, stock, precio de alquiler, precio de venta y disponibilidad.
2. La disponibilidad es un campo de películas, que solo puede ser modificado por un rol de administrador. 
3. Los usuarios pueden alquilar y comprar una película. Para la funcionalidad de alquiler, debe realizar un seguimiento de cuándo el usuario debe devolver la película y aplicar una multa monetaria si hay un retraso.
4. Mantenga un registro de todos los alquileres y compras (quién compró, cuántos, cuándo). 
5. A los usuarios les pueden gustar las películas. 
6. Como administrador, puedo ver todas las películas y filtrar por disponibilidad / indisponibilidad. 
7. Como usuario, solo puedo ver las películas disponibles para alquilar o comprar. 
8. La lista debe poder ordenarse por título (predeterminado) y por popularidad (me gusta). 
9. Buscar películas por nombre.

#### Instrucciones:
* Se esta usando una Base de Datos en MySQL la cual se puede importar del archivo "finaltpi.sql" que se encuentra en la carpeta "database", contiene los datos de los usuarios, peliculas y demás.
* Se debe de usar el servidor local Xampp, por lo que los archivos se deben de encontrar en una carpeta con el nombre "Final_TPI" dentro de la carpeta "htdocs" (a menos que se tenga configurado en otra carpeta).
* En caso que a la hora de importar la Base de Datos de un error, se debe de crear una Base de Datos con el nombre "finaltpi" y dentro de esta hacer la importación del archivo "finaltpi.sql", que se encuentra dentro de la carpeta "database" del proyecto.

#### Vista Administrador
* Para el caso de la vista de administrador, puede usar algunos de los usuarios admin que creamos durante el proceso de prueba o puede optar por ir a la base de datos y cambiar el rol a administrador con los usuarios nuevos o existentes. Estos son algunos de los usuario existentes con los que podria acceder a la vista administrador: 

- Usuario------------------------Contraseña
- Ale@gmail.com ---------------> 123
- Ivan@gmail.com --------------> 222
- Marlon@gmail.com -----------> 222
- Lemus@gmail.com ------------> 222

### Pagos con paypal:
* Para realizar los test de los pagos con paypal se pueden usar la siguiente cuenta para pruebas
- Correo: comprar-peliculas@gmail.com
- Contraseña: comprartest
