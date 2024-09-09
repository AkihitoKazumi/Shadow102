<?php
$n1 = $_POST['no1'];
$n2 = $_POST['no2'];
$b = $_POST['ab'];
if ($b == "+") {
    $total = $n1+$n2;
  } else if ($b == "-") {
    $total = $n1-$n2;
  } else if ($b == "*") {
    $total = $n1*$n2;
  } else if ($b == "/") {
    $total = $n1/$n2;
  }
echo "ตัวเลขที่ 1 คือ".$n1;
echo "<br>";
echo "ตัวเลขที่ 2 คือ".$n2;
echo "<br>";
echo "ผลลัพธ์คือ" .$total;
?>