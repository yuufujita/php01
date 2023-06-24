<?php require'p00_header.php';?>

<br>
<p><a href="p01_post.php">投稿する</a>
<br>

<?php

//ファイルを読み込む
$data = file_get_contents('data.json');
$dataArray = json_decode($data, true);

$star=['---選択---'=>00,'★★★★★'=>05,'★★★★☆'=>04,'★★★☆☆'=>03,'★★☆☆☆'=>02,'★☆☆☆☆'=>01,];
$termOp=['---選択---'=>00,'日帰り'=>01,'1泊2日'=>02,];
$aimOp=['---選択---'=>00,'温泉'=>01,'景色'=>02,];

echo '<div id="post-all">';
// ブラウザに表示する
foreach ($dataArray as $index => $dataItem) {
    echo '<div id ="post-data">';
    echo '写真: <img src="' . $dataItem['file_photo'] . '" alt="写真">' . '<br>';
    echo '投稿者:' . $dataItem['name'] . '<br>';
    echo '行き先:' . $dataItem['goal'] . '<br>';
    echo '月: ' . $dataItem['month'] . '月' . '<br>';
    echo '期間:' . array_search($dataItem['term'], $termOp)  . '<br>';
    echo '目的:' . array_search($dataItem['aim'], $aimOp)  . '<br>';
    echo '１人旅手軽気軽度: ' . array_search($dataItem['easy'], $star) . '<br>';
    echo '勢いで出発可能度: ' . array_search($dataItem['shortly'], $star) . '<br>';
    echo '夜ごはん気楽度: ' . array_search($dataItem['meal'], $star) . '<br>';
    echo '宿の人目気にならない度: ' . array_search($dataItem['mood'], $star) . '<br>';
    // 削除ボタンを表示する
    echo '<button onclick="deleteData(' . $index . ', \'' . $dataItem['file_photo'] . '\')">削除</button>';
    echo '<br>';
    echo '</div>';
}
echo '</div>'
?>

<script>
    function deleteData(index, file_photo) {
        if (confirm('削除してもよろしいですか？')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'p04_delete.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert(xhr.responseText);
                    // 削除後の処理（例: ページリロード）
                    location.reload();
                }
            };
            xhr.send('index=' + encodeURIComponent(index) + '&file_photo=' + encodeURIComponent(file_photo));
        }
    }
</script>

<?php require'p99_footer.php';?>

<?php 
/* --- 検討過程のコード ---
echo '写真: <img src="' . $dataArray[0]['file_photo'] . '" alt="写真">' . '<br>';
echo '投稿者:' .$dataArray[0]['name'] . '<br>';
echo '行き先:' .$dataArray[0]['goal'] . '<br>';
echo '月: ' . $dataArray[0]['month'] . '月' . '<br>';
echo '期間:' .$dataArray[0]['term'] . '<br>';
echo '目的:' .$dataArray[0]['aim'] . '<br>';
echo '１人旅手軽気軽度: ' . array_search($dataArray[0]['easy'], $star) . '<br>';
echo '勢いで出発可能度: ' . array_search($dataArray[0]['shortly'], $star) . '<br>';
echo '夜ごはん気楽度: ' . array_search($dataArray[0]['meal'], $star) . '<br>';
echo '宿の人目気にならない度: ' . array_search($dataArray[0]['mood'], $star) . '<br>';

foreach ($dataArray as $key => $value) {
    echo $key . ': ' . $value . '<br>';
}
*/
?>