# DESIS-DIAGNOSTICO 
## Prueba Diagnostica - desarrollando un sistema de votación en PHP

En este proyecto se desarrollara un formulario de votación en PHP, que permitirta guardarlos datos en una base de datos MySQL


## Version

- PHP  == 8.2.0
- MySQL == 8.2.0

## Bases de datos
El proyecto usa MySql por ende se debe ejecutar los script en un motor compatible con MySQL

## Como usar la aplicación
Para utilizar la aplicación, se deben seguir los siguientes pasos:

1. Clonar el repositorio:

    ```
    git clone https://github.com/Andriw03/DESIS-DIAGNOSTICO.git
    ```

2. Instalar XAMPP:

    Ingresar a su pagina web y descargar: 

    ```
    https://www.apachefriends.org/es/index.html
    ```
3. Configurar XAMPP:

    Configurar XAMPP y elegir en que carpeta se ejecutara el proyecto 

4. Configurar Bases de datos:
    
    En formulario.php se deben cambiar las credenciales para la conexión con la bases de datos

    Ejemplo: 
    ```
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "DESIS";
    ```
5. Abrir formulario.php en el navegador:

    En el navegador introducir la dirección del archivo 
    
    Ejemplo:
    ```
    http://localhost/repositorios/DESIS-DIAGNOSTICO/formulario.php
    ```
6. Abrir formulario.html en el navegador:

    En el navegador introducir la dirección del archivo 
    
    Ejemplo:
    ```
    http://localhost/repositorios/DESIS-DIAGNOSTICO/formulario.html
    ```
