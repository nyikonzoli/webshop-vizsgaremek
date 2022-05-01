# ArtShop (vizsgaremek) feltelepítési útmutató
Az oldal beműködtetéséhez Docker-re van szükség. Az oldalhoz szükséges fájlok a 'laravel-vizsgaremek' mappában találhatóak.
- Másolja át a `.env.example` tartalmát a `.env` fájlba.
    - Külön bizonyosodjon meg arról hogy a `.env` fájlban az `APP_URL`-nek a `http://localhost:8881` érték van megadva.
- Buildelje le az image-eket és indítsa el a Docker containert.
    - Ezt legegyszerübben a `docker-compose up --build` parancs lefuttatásával teheti meg.

Innentől minden parancsot a Docker container-ben kell lefuttatni. Az egyszerűbb használat kedvéért javasolt a `fish`-t használni, amit a `docker-compose exec php fish` parancs kiadásával tud engedélyezni.

- A container-en belül telepítse fel a composert a `composer install` parancs segítségével.
- Generáljon le az oldalnak egy API kulcsot a `php artisan key:generate` segítségével.
- Futtassa le a migrációs és seeder file-okat a `php artisan migrate --seed` parancs kiadásával.
- A `php artisan storage:link` parancs kiadásával hozza létre a linkeket.
