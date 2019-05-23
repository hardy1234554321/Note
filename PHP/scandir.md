# PHP-scandir()
---

**glob**
可以使用含有「萬用字元」的字串當做參數，取得檔案列表。

GLOB_MARK     - 若檔案為資料夾，在回傳檔案路徑的最後面加上斜線"\"
GLOB_NOSORT   - 保持檔案路徑在原資料夾的出現順序(不重新排序)。※筆者在Win環境看不出差異
GLOB_NOCHECK  - 若找不到匹配的檔案路徑，回傳匹配的條件字串
GLOB_NOESCAPE - 不要將反斜線視為跳脫字元(※筆者在Win環境下看不出差異)
GLOB_BRACE    - 將 {a,b,c} 視為搜尋 'a', 'b', 或 'c'
GLOB_ONLYDIR  - 只列出資料夾路徑
GLOB_ERR      - 發生讀取錯誤時停止動作(像是無法讀取的資料夾)，預設是「忽略錯誤」
```
$arr_Glob = glob('/*', GLOB_ONLYDIR);
```

**scandir**
回傳值是Array，回傳值的第一項是「.」，就是目前資料夾的意思，第二項是「..」也就是上一個資料夾，但是沒辦法像glob那樣指定到檔案格式
```
$arr_Scan = scandir('/');
```

**readdir**
要先開啟資料夾（opendir），然後把檔案代碼傳到readdir才可以使用，用完之後還要closedir，回傳值是String，執行一次讀取一次。
```
$handle = opendir('/');
while(false!==($file=readdir($handle))){
	$arr_Read[] = $file;
}
closedir($handle);
```


[參考範例](example/Scandir/index.php)