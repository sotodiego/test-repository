# Prueba para Agence

Esta es una aplicación de prueba solicitada por la compañia Agence, desarrollada según instrucciones dadas. Este desarrollo está hecho con:

* PHP Laravel Framework v.12.0
* Materialize css v1.0.0
* Highchartsv8.0.0
* Jquery v3.3.1

# Explicacion de funcionalidad en Laravel

Se usó un controlador para las 3 funciones requeridas, tanto para tabla de datos como para gráficos, pero con distintas rutas:
/ (GET), /relatorio (POST), /grafico (POST) y /pie (POST)

Se crearon Layouts de las estructuras fijas de las páginas (navbar, aside y footer), dejando el contenedor principal sujeto a cambios.
Se crearon dos vistas de tablas en la base de datos para optimizar el manejo de los datos.

# Alojamiento
La prueba es visible en el dominio http://www.hotelestravelauto.com/ donde se podra ver el funcionamiento responsivo.

# Paso para el funcionamiento local
* Bajar el repositorio
* composer install (opcional- este repositorio tiene los paquetes)
* php artisan key:generator
* Cambiar datos mysql .env
* php artisan migrate
