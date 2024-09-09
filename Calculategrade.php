<?php
function calculateGrade($score) {
    if ($score >= 80) {
        return 'A';
    } elseif ($score >= 70) {
        return 'B';
    } elseif ($score >= 60) {
        return 'C';
    } elseif ($score >= 50) {
        return 'D';
    } else {
        return 'F';
    }
}

$scores = array(79); // คะแนนที่ต้องการทดสอบ
foreach ($scores as $score) {
    echo "นายอภิเดช บุญเย็น ได้คะแนน: $score ได้เกรด: " . calculateGrade($score) . "\n";
}
?>