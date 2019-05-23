# Laravel-Controller基本介紹
---
controller的檔案會在app/Http/Controllers底下


**RESTful 資源控制器**
使用 make:controller Artisan 指令，我們可以快速地建立像這樣的控制器。先新增controller，在專案資料夾下指令
```
php artisan make:controller --resource UserController
```

**基本操作**

編輯app\Http\Controllers\UserController.php
```
...
public function show($id)
{
    return '編號:' . $id;
}
```
Route指定Contrller行為
```
Route::get('user/{id}', 'UserController@show');
```
