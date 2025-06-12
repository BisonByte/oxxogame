# BisonByte Cash King App

Este repositorio contiene el código de la aplicación Android y el panel de administración para el juego de recompensas. La aplicación ahora está personalizada para mostrar que está **hecha por BisonByte**.

## Características principales de la aplicación

- Bono diario de inicio de sesión.
- Ruleta de la suerte para ganar monedas.
- Tarjetas "rasca y gana".
- Visualización de videos recompensados.
- Sistema de invitaciones y código de referencia.
- Historial de transacciones y panel de recompensas.
- Oferta de tareas y juegos adicionales.
- Clasificación de usuarios (leaderboard).
- Soporte de notificaciones push mediante OneSignal.

## Instalación del servidor

1. Descomprime `admin_panel.zip` en la carpeta pública de tu servidor web (por ejemplo, `/var/www/html`).
2. Crea una base de datos MySQL y importa el archivo `database.sql` incluido en este repositorio.
3. Dentro del panel de administración, edita el archivo de configuración (por ejemplo, `config.php`) para definir las credenciales de la base de datos.
4. Asegúrate de que la URL pública del panel termine con `/`. Esa URL se utilizará en la aplicación.

## Configuración de la aplicación Android

1. Abre la carpeta `application` con Android Studio.
2. En `app/src/main/java/com/aadevelopers/cashkingapp/helper/Constatnt.java` actualiza la constante `Main_Url` con la URL de tu servidor (con la barra final). Esto permitirá que la app se comunique con tu instalación del panel.
3. Compila el proyecto y genera el APK desde Android Studio.

## Créditos

Aplicación y panel desarrollados por **BisonByte**.
