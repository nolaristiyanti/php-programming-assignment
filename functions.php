<?php

    declare(strict_types=1);
    echo "Soal 2: Sistem Penilaian Sederhana (Conditional)" . PHP_EOL;

    function tentukanGrade($nilai): string {
        $grade = "";
        if ($nilai >=85 && $nilai <= 100) {
            $grade = "A";
        } else if ($nilai >= 70) {
            $grade = "B";
        } else if ($nilai >= 60) {
            $grade = "C";
        } else {
            $grade = "D";
        }

        return $grade;
    }

    $scores = [90, 85, 70, 75, 65, 60, 55];
    foreach($scores as $score) {
        echo "Nilai: {$score}, Grade: " . tentukanGrade($score) . PHP_EOL;
    }
?>