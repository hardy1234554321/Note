# Laravel-Views基本介紹
---
views在 resources/views 底下

**新增Views**
檔名user.blade.php，格式{名稱}.blade.php
```
#View
<!doctype html>
<html>
<head>
    <title>Laravel</title>
</head>
<body>
    <h1>{{$text}}, {{$name}}</h1>
    工號 {{$erpid}}
</body>
</html>
```
```
#route
Route::get('/user/{id}', 'UserController@hello');
```
```
#Controller
public function hello($id)
{
    //方法1
    return view(
        'user',
        [
            'name' => 'Shock',
            'erpid' => $id,
            'text' => 'Welcome'
        ]
    );
    //方法2
    return view('user')->with('name', 'Shock')->with('erpid', $id)->with('text', 'Welcome');
}
```


