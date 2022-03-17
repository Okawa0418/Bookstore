<?php

require_once('../database1.php');

$data = new Database1;
// データベースに接続
$dbh = $data->dbConnect();

// 商品毎にSELECTして情報を取り出したい
// 商品名の配列を作成して、ループ文で順番にSELECTしていく
// SELECTしたレコードの中で日別に集計したい



// 商品名の配列を回して日別で集計していく

// 1～3月分を日別に集計
$sql = "SELECT DATE_FORMAT(`pur_time`, '%Y-%m-%d') as `date`,
        `item_name`,
        COUNT(*) as count
        FROM `purchase`
        WHERE `pur_time` >= '2022-01-01' AND `pur_time` < '2022-04-01'
        GROUP BY `date`, `item_name`";

$stmt = $dbh->query($sql);
$date_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($date_data);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日別商品別取引件数表</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>日付</th>
            <th>商品名</th>
            <th>件数</th>
        </tr>
        <?php for ($i=0; $i < count($date_data); $i++) : ?>
            <tr>
                <td><?=$date_data[$i]['date']?></td>
                <td><?=$date_data[$i]['item_name']?></td>
                <td><?=$date_data[$i]['count']?></td>
            </tr>
        <?php endfor ; ?>
    </table>
    
</body>
</html>