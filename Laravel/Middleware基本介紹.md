# Laravel-Middleware基本介紹
---
HTTP 中介層提供一個方便的機制來過濾進入應用程式的 HTTP 請求。Laravel 框架已經內建一些中介層，包括維護、身份驗證、CSRF 保護，等等。所有的中介層都放在 app/Http/Middleware 目錄內。

**RESTful 資源控制器**
要建立一個新的中介層，可以使用 make:middleware 這個 Artisan 指令：
```
php artisan make:middleware OldMiddleware
```

**全域使用(Global Middleware)**
```
protected $middlewarePriority = [
    //

    //新增剛剛新增的OldMiddleware
    \Illuminate\Auth\Middleware\OldMiddleware::class,
];
```

**為 Route 指派 Middleware**
```
protected $routeMiddleware = [
    //

    //新增剛剛新增的OldMiddleware
    'old' => \Illuminate\Auth\Middleware\OldMiddleware::class,
];
```

**Route使用中介層**
```
//方法1
Route::get('admin/profile', function () {
    //
})->middleware('auth');
```
```
//方法2
Route::middleware('auth')->get('admin/profile', function () {
    //
});
```
```
//方法3
use App\Http\Middleware\OldMiddleware;

Route::get('user/S2137', function () {
    //
})->middleware(OldMiddleware::class);
```
```
//方法4
Route::middleware('first', 'second')->get('user/S2137', function () {
    //
});
```