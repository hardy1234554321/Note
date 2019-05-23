<?php
include 'BaseFunc.php';

$arr_Select = array(
    'a' => 'apple',
    'b' => 'ball',
    'c' => 'cat',
    'd' => 'dog',
);
?>
<!DOCTYPE html>
<html>
    <body>
    <?= $Form->createSelectTag('select', 'mytag1', $arr_Select, 'c', ''); ?><br>
    <?= $Form->createRadio('mytag2', $arr_Select, 'd', '', ''); ?><br>
    <?= $Form->createCheckbox('mytag3[]', $arr_Select, array('c', 'd'), '', ''); ?><br>
    </body>
</html>