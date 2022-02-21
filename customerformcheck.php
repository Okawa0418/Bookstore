<body>

<?php

$staff_email=$_POST['email'];
$staff_name=$_POST['name'];
$staff_content=$_POST['content'];

$staff_email=htmlspecialchars($staff_email,ENT_QUOTES,'UTF-8');
$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_content=htmlspecialchars($staff_content,ENT_QUOTES,'UTF-8');

// バリデーシ
if ($staff_name=='')
{
    print'名前が入力されていません <br />';  
}