<?php require'p00_header.php';?>

<?php
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	if (!file_exists('upload')) {
		mkdir('upload');
	}
	$file_photo='upload/'.basename($_FILES['file']['name']);
	if (move_uploaded_file($_FILES['file']['tmp_name'], $file_photo)) {
		echo $file_photo, 'のアップロードに成功しました。';
		echo '<p><img alt="image" src="', $file_photo, '"></p>';
	} else {
		echo 'アップロードに失敗しました。';
	}
} else {
	echo 'ファイルを選択してください。';
}
// p01_post.phpから受け取る
$name = htmlspecialchars($_POST['name']);
$goal = htmlspecialchars($_POST['goal']);
$month = $_POST['month'];
$term = $_POST['term'];
$aim = $_POST['aim'];
$easy = $_POST['easy'];
$shortly = $_POST['shortly'];
$meal = $_POST['meal'];
$mood = $_POST['mood'];

// データを連想配列に変換する
$data = array(
    'name' => $name,
    'goal' => $goal,
    'month' => $month,
    'term' => $term,
    'aim' => $aim,
    'easy' => $easy,
    'shortly' => $shortly,
    'meal' => $meal,
    'mood' => $mood,
    'file_photo' => $file_photo,
);

// JSON形式にエンコードする
$jsonData = json_encode($data);

// ファイルを読み込む
$file_data = 'data.json';
$jsonDataExisting = file_get_contents($file_data);

// JSONデータをデコードする
$dataArray = json_decode($jsonDataExisting, true);

// 新しいデータを配列に追加する
$dataArray[] = $data;

// 配列をJSON形式にエンコードする
$jsonDataUpdated = json_encode($dataArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// ファイルに上書き保存する
file_put_contents($file_data, $jsonDataUpdated);
?>

<br>
<p><a href="p03_read.php">ホームに戻る</a>
<br>
<?php require'p99_footer.php';?>

