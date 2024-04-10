# INSTRUCCIONES

Se puede correr en cualquier implementacion de server HTTP, tanto en Apache como NGINX, preferiblemente que se corriera
usando la imagen de Docker que he incluido ya que lo he testeado varias veces y en diferentes computadoras y parece funcionar bien, en caso
de no usar el Docker, el unico requisito es que se tenga el permiso de la carpeta donde se va a correr ya que debido a no tener que usar
las incomodas variables de sessiones o cualquier forma rara de auto-post/redirect a pagina, utilizo un fichero, llamado data.json, el mismo se crea
si no existe durante la primera peticion de insert, en caso super raro que no funcione, se debe a que no se tiene el permiso apropiado en el directorio
por lo cual le es imposible a PHP crear el directorio pero ese caso no deberia ser comun, en sistemas operativos basados en Windows ese problema es inexistente.

para acceder, como el proyecto posee index.php, se usa la clasica nomeclatura:
- http://localhost (Servidores normales)
- http://localhost:8080 (Docker)

## Docker Quick Guide

Unicamente se requieren dos comandos para hacer funcionar el proyecto (puede necesitar sudo si esta en Linux):
- docker compose build
- docker compose up
