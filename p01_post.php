<?php require'p00_header.php';?>

<?php 
$star=['---選択---'=>00,'★★★★★'=>05,'★★★★☆'=>04,'★★★☆☆'=>03,'★★☆☆☆'=>02,'★☆☆☆☆'=>01,];
$termOp=['---選択---'=>00,'日帰り'=>01,'1泊2日'=>02,];
$aimOp=['---選択---'=>00,'温泉'=>01,'景色'=>02,];
?>

<p>アップロードする写真を選択してください。</p>
    <form action="p02_write.php" method="post" enctype="multipart/form-data">
        投稿者: <input type="text" name="name">
        　　　行き先: <input type="text" name="goal">
        <br>月: <select name="month">
        <option value="0">---選択---</option>
        <?php for($i=1; $i<13; $i++) {
          echo '<option value="',$i,'">'.$i.'月'.'</option>';
        }?>
        </select>
        　　　期間: <select name="term">
          <?php foreach($termOp as $key=>$value){
          echo '<option value="',$value,'">'.$key.'</option>';
          }
        ?>
        </select>
        　　　目的: <select name="aim">
        <?php foreach($aimOp as $key=>$value){
          echo '<option value="',$value,'">'.$key.'</option>';
          }
        ?>
        </select>
        <br>１人旅手軽気軽度: <select name="easy">
        <?php foreach($star as $key=>$value){
          echo '<option value="',$value,'">'.$key.'</option>';
          }
        ?>
        </select>
        　　　勢いで出発可能度: <select name="shortly">
        <?php foreach($star as $key=>$value){
          echo '<option value="',$value,'">'.$key.'</option>';
          }
        ?>
        </select>
        <br>夜ごはん気楽度: <select name="meal">
        <?php foreach($star as $key=>$value){
          echo '<option value="',$value,'">'.$key.'</option>';
          }
        ?>
        </select>
        　　　宿の人目気にならない度: <select name="mood">
        <?php foreach($star as $key=>$value){
          echo '<option value="',$value,'">'.$key.'</option>';
          }
        ?>
        </select>
        <p><input type="file" name="file">
        <p><input type="submit" value="アップロード">
    </form>
    <br>

<?php require'p99_footer.php';?>
