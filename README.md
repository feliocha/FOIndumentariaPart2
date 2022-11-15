# FOIndumentariaPart2
Esta API REST nos permite manejar un CRUD de articulos trayendo toda su informacion la cual se puede ordenar.

## Importar base de datos
Desde phpMyAdmin importar db/foindumentaria.sql.

# Requests
### Prueba desde postman
Se debe colocar la siguiente URL http://localhost/proyectos/FOI/api/articulos para articulos.

## GET (ALL)
Obtiene todos los articulos.

verbo: GET

http://localhost/proyectos/FOI/api/articulos

## GET (individual):
Obtiene un articulo.

verbo: GET

http://localhost/proyectos/FOI/api/articulos/id


## Crear articulo:
Crea un nuevo articulo.

verbo: POST

http://localhost/proyectos/FOI/api/articulos

Los datos que hay que insertar para crear el articulo deben tener el siguiente formato:
{
        "nombre": ---,
        "precio": ---,
        "id_categoria": ---,
        
}

Nombre es varchar, precio e id_categoria son int. Id_categoria debe estar en la tabla categoria (foreign key).


## Borrar articulo:
Elimina un articulo por id. (debe existir)

verbo: DELETE

http://localhost/proyectos/FOI/api/articulos/id


## Filtrado y ordenado:
Se podran obtener los articulos ordenados, ascendente o descendentemente, segun un filtro de columna, ya sea nombre, precio o id_categoria.

http://localhost/proyectos/FOI/api/articulos?sort=nombre&order=ASC/DESC

El ejemplo devuelve los articulos ordenados ascendente o descendente por nombre.


## Resumen
|Route		    | Method	  |   Description
|---------------|:-----------:|-------------------------------------------:
|/articulos	    | GET	      | Retorna todos los articulos
|/articulos/id 	| GET	      | Retorna un articulo con el id especificado
|/articulos	    | POST	      | Se crea un nuevo articulo
|/articulos/id	| DELETE	  | Borra el articulo con el id especificado