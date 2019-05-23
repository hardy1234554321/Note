# Laravel-Route基本介紹
---

在web.php中有一個為根目錄(‘/’)且附帶閉包函數的預設路由。這個路由預設是使用者造訪根目錄時，就會回傳 welcome.blade.php 的內容。
```
Route::get('/', function () {
    return view('welcome');
});
```
直接回傳
```
Route::get('/', function () {
    return 'Hello World';
});
```
設定一個回傳foo的路由，可以透過
```
Route::get('foo', function () {
    return 'Hello World';
});
```
或顯示 resource/views/about.blade.php
```
Route::get('about', function () {
    return view('about');
});
```

**Route方法**
```
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
```
```
//使用部分動詞
Route::match(['get', 'post'], '/', function () {
    //
});

//符合所有動詞，則使用any
Route::any('foo', function () {
    //
});
```

**Route參數**
```
Route::get('/user/{id}',function($id){
    return 'user_id:'.$id;
});
```
```
Route::get('posts/{post}/comments/{comment}/type/{type?}', function ($postId, $commentId, $type = 'n') {
    //
});
```
網址 http://127.0.0.1:8080/Blog/public/posts/1/comments/shock/type 可以看到 `posts:1, comments:shock, type:n`