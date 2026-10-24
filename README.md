Sistema de Gestión Hospitalaria
Sistema web para la administración de pacientes, médicos, hospitales y atenciones, desarrollado en Laravel 11 con integración continua en GitHub Actions.

Requisitos
- PHP 8.2 o superior
- Composer
- Node.js 22 y npm
- MySQL
- Git

Instalación
1. Clonar el repositorio:
git clone https://github.com/al222310596-eng/hospital.git
cd hospital

Instalar dependencias PHP:
composer install

Copiar el archivo de entorno:
cp .env.example .env

Generar la clave de la aplicación:
php artisan key:generate

Configurar la base de datos en .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospital
DB_USERNAME=root
DB_PASSWORD=

Crear la base de datos hospital en MySQL (phpMyAdmin o consola):
mysql -u root -e "CREATE DATABASE hospital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

Ejecutar las migraciones:
php artisan migrate

Instalar dependencias frontend y compilar assets:
npm install
npm run build
Ejecución

Levantar el servidor de desarrollo:
php artisan serve

Abrir en el navegador:
http://127.0.0.1:8000/pacientes

Rutas disponibles:
Pacientes	http://127.0.0.1:8000/pacientes
Médicos	http://127.0.0.1:8000/medicos
Hospitales	http://127.0.0.1:8000/hospitales
Atenciones	http://127.0.0.1:8000/atenciones

Pruebas
Ejecutar la suite de pruebas automatizadas:
php artisan test

Resultado esperado:
PASS  Tests\Unit\ExampleTest
PASS  Tests\Feature\ExampleTest

Tests:    2 passed (2 assertions)

Integración continua
El pipeline definido en .github/workflows/ci.yml se ejecuta automáticamente en cada push o pull_request a la rama main. Realiza las siguientes etapas:
Checkout del código
Configuración de PHP 8.2
Validación de Composer
Instalación de dependencias PHP
Configuración de Node.js 22
Instalación de dependencias frontend (npm ci)
Compilación de assets (npm run build)
Preparación del entorno Laravel
Ejecución de pruebas (php artisan test)

Si todos los pasos terminan en verde, el pipeline se marca como exitoso y el cambio puede integrarse. Si algún paso falla, el pipeline se rechaza y los logs quedan disponibles en la pestaña Actions del repositorio.
