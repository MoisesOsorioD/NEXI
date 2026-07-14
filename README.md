
# NEXI

## Descripción general

NEXI es una aplicación web desarrollada para facilitar la conexión entre emprendedores y proveedores. Su objetivo es ofrecer un espacio donde los proveedores puedan dar a conocer sus productos o servicios y los emprendedores puedan encontrar opciones para su negocio de una forma más rápida y organizada.

NEXI permite el registro de usuarios con diferentes roles. Los proveedores pueden crear su perfil empresarial, publicar productos o servicios, administrar sus publicaciones y comunicarse con los emprendedores mediante un chat. Por su parte, los emprendedores pueden buscar proveedores utilizando diferentes filtros, comparar proveedores y publicaciones, guardar favoritos, consultar la ubicación de los proveedores en el mapa y dejar reseñas y calificaciones según su experiencia.

----------

## Tecnologías utilizadas

El proyecto fue desarrollado utilizando **Laravel 13** como framework principal y siguiendo la arquitectura **MVC (Modelo, Vista y Controlador)**. Esta arquitectura permitió organizar el código, facilitando el mantenimiento del sistema y el desarrollo de nuevas funcionalidades.

Para el desarrollo del sistema se utilizaron las siguientes tecnologías:

### Backend

-   PHP 8.3
    
-   Laravel 13
    
-   Eloquent ORM
    
-   Composer
    

### Frontend

-   HTML5
    
-   CSS3
    
-   JavaScript
    
-   Bootstrap 5
    
-   Font Awesome

### Base de datos

-   MySQL
    

### Herramientas de desarrollo

-   Visual Studio Code
    
-   Laragon
    
-   Git
    
-   GitHub
    



----------

## Instalación

Antes de ejecutar el proyecto es necesario contar con los siguientes tecnologías instalados:

-   PHP
    
-   Composer
    
-   MySQL
    
-   Node.js y NPM
    
-   Un servidor local como Laragon o XAMPP
    


Una vez cumplidos los requisitos, realizar los siguientes pasos:

1.  Clonar el repositorio desde GitHub.

```
git clone https://github.com/MoisesOsorioD/NEXI.git
```

2.  Ingresar a la carpeta del proyecto.

```
cd NEXI
```

3.  Instalar las dependencias de PHP.

```
composer install
```

4.  Instalar las dependencias del frontend.

```
npm install
```

5.  Crear el archivo `.env` tomando como referencia el archivo `.env.example`.

```
cp .env.example .env
```

6.  Generar la clave de la aplicación.

```
php artisan key:generate
```

7.  Configurar la conexión con la base de datos en el archivo `.env` .

9.  Ejecutar las migraciones.

```
php artisan migrate
```

9.  Crear el enlace para almacenar las imágenes.

```
php artisan storage:link
```

----------

## Ejecución del sistema

Para iniciar el servidor de desarrollo, ejecutar:

```
php artisan serve
```

En otra terminal, iniciar Vite para compilar los archivos CSS y JavaScript:

```
npm run dev
```

Una vez ejecutados ambos comandos, la aplicación estará disponible en:

```
http://127.0.0.1:8000
```