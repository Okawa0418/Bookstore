<body>

<?php

$staff_email=$_POST['email'];
$staff_name=$_POST['name'];
$staff_content=$_POST['content'];

$staff_email=htmlspecialchars($staff_email,ENT_QUOTES,'UTF-8');
$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_content=htmlspecialchars($staff_content,ENT_QUOTES,'UTF-8');

if($staff_email=='')
{
    print'emailが登録されていません <br />';
}
if ($staff_name=='')
{
    print'名前が入力されていません <br />';  
}
else
{
    print'Webネーム:';
    print $staff_name;
    print'<br />';
}

if($staff_content=='')
{
    print'内容が入力されていません <br />';
}
// もしも入力に問題があった場合戻るボタン
if($staff_email=='' || $staff_name==''|| $staff_content='')
{
    print'<form>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'</form>';
}
// もし入力にもんだいがなかった場合
else
{

    print'<form method="post" action="customerformdone.php">';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'<input type="submit" value="ok">';
    print'</form>';
}

?>
