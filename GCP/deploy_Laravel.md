# GCP-Deploy Laravel
---

**Run**
* Create a new Laravel project using the laravel installer.
```
laravel new blog
```
* Go to the blog directory
```
cd blog
```
* Run the app with the following command:
```
php artisan serve
```
* Visit http://localhost:8000 to see the Laravel Welcome page.

**Deploy**
* Create an app.yaml file with the following contents:
```
runtime: php72

env_variables:
  ## Put production environment variables here.
  APP_KEY: YOUR_APP_KEY
  APP_STORAGE: /tmp
  VIEW_COMPILED_PATH: /tmp
  SESSION_DRIVER: cookie
```
* Replace YOUR_APP_KEY in app.yaml with an application key you generate with the following command:
```
php artisan key:generate --show
```
* Modify bootstrap/app.php by adding the following block of code before the return statement. This will allow you to set the storage path to /tmp for caching in production.
```
# [START] Add the following block to `bootstrap/app.php`
/*
|--------------------------------------------------------------------------
| Set Storage Path
|--------------------------------------------------------------------------
|
| This script allows you to override the default storage location used by
| the  application.  You may set the APP_STORAGE environment variable
| in your .env file,  if not set the default location will be used
|
*/
$app->useStoragePath(env('APP_STORAGE', base_path() . '/storage'));
# [END]
```
* Finally, remove the beyondcode/laravel-dump-server composer dependency. This is a fix for an error which happens as a result of Laravel's caching in bootstrap/cache/services.php.
```
composer remove --dev beyondcode/laravel-dump-server
```
**部署至GCP**
```
gcloud app deploy
```

**瀏覽部屬網站**
```
gcloud app browse
```

參考來源:[Run Laravel on Google App Engine standard environment](https://cloud.google.com/community/tutorials/run-laravel-on-appengine-standard)


