<p align="center"><a href="https://smartwebtools.net" target="_blank"><img src="https://smartwebtools.net/wp-content/uploads/2020/01/logo-02.png" width="400"></a></p>

# Directorio Telefónico

## Instalación
Los pasos de Instalación son los siguientes:
- Clonar el repositorio
    - git clone https://github.com/kfiguera/directorio.git
- Ingresar e la carpeta directorio y ejecutar los siguientes comandos 
    - composer install
    - npm install && npm run dev
- Copiar el archivo **.env.example**  a **.env**
- Cambiar los parametros de coneccion  en el archivo **.env**
- Ejecutar los siguiente comandos:
    - php artisan migrate --seed
    - php artisan serve
- Ir al navegador [localhost](https://localhost:8000)
- Datos de Inicio de Seción
    - Usuario: admin@directory.com
    - Clave: 123456 

## Requerimientos

- PHP 7.4.10
- MariaDB 10.4.14
- Composer 2.0.7
- NPM 7.15.1

## License

This software is open-sourced software licensed under the [GPL-3.0 License](https://www.gnu.org/licenses/gpl-3.0.en.html).
