<?php require'p00_header.php';?>

<?php

// POSTデータから削除対象のデータのインデックスと写真のファイルパスを取得
$index = $_POST['index'];
$file_photo = $_POST['file_photo'];

// ファイルを読み込む
$data = file_get_contents('data.json');
$dataArray = json_decode($data, true);

// 削除対象のデータを削除する
if (isset($dataArray[$index])) {
    unset($dataArray[$index]);
}

// 配列をJSON形式にエンコードする
$jsonDataUpdated = json_encode(array_values($dataArray));

// ファイルに上書き保存する
file_put_contents('data.json', $jsonDataUpdated);

// 写真ファイルを削除する
if (file_exists($file_photo)) {
    unlink($file_photo);
}

// 削除が完了したことを示すメッセージを返す
echo '削除が完了しました';

?>
<?php require'p99_footer.php';?>