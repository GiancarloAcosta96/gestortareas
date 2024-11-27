# Gestor de Tareas API

Este es un sistema para gestionar tareas con una API RESTful, desarrollado en PHP utilizando el framework Laravel.

## Requisitos previos

Antes de comenzar, asegúrate de tener instalados los siguientes programas en tu máquina:

- **PHP** (versión 7.4 o superior)
- **Composer** (para gestionar dependencias de PHP)
- **MySQL** (o cualquier base de datos compatible con Laravel)
- **Node.js** (si quieres trabajar con los recursos de frontend)
- **NPM** (o **Yarn** para gestionar dependencias de frontend, si es necesario)

## Instalación

Sigue estos pasos para instalar y configurar el proyecto en tu entorno local:

### 1. Clonar el repositorio

Primero, clona el repositorio en tu máquina local usando el siguiente comando:

```bash
git clone https://github.com/tu-usuario/gestor-tareas.git

 Instalar las dependencias de PHP
Accede al directorio del proyecto y ejecuta el siguiente comando para instalar las dependencias de PHP:
cd gestor-tareas
composer install

3. Configurar el archivo .env
Copia el archivo .env.example y renómbralo como .env. Esto creará un archivo de configuración para el entorno de Laravel:

cp .env.example .env

Ahora, abre el archivo .env y configura las credenciales de tu base de datos:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_tareas
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

Ejecuta el siguiente comando para generar una nueva clave de aplicación para Laravel:
php artisan key:generate

Crear las tablas de la base de datos
Ejecuta las migraciones de la base de datos para crear las tablas necesarias en MySQL:

php artisan migrate

npm install

 Iniciar el servidor de desarrollo
Ahora puedes iniciar el servidor de desarrollo de Laravel ejecutando:

php artisan serve