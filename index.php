<?php

    declare(strict_types=1);

    //Soal 1: Profil User Sederhana (Introduction, Syntax, Variable & Data Type)
    function tampilkanProfil($nama, $usia, $statusAktif, $hobi): void {
        echo "Nama : " . $nama . PHP_EOL;
        echo "Usia : " . $usia . PHP_EOL;
        $status = $statusAktif ? "Aktif" : "Tidak aktif";
        echo "Status : " . $status . PHP_EOL;
        echo "Hobi : ";
        foreach($hobi as $h) {
            echo $h . " ";
        }
    }
    $nama = "Nola";
    $usia = 26;
    $saldo = 100000;
    $statusAktif = true;
    $hobi = ["Memasak", "Karaoke"];

    echo "Soal 1 - Profil User Sederhana (Introduction, Syntax, Variable & Data Type)" . PHP_EOL;
    echo $nama . PHP_EOL;
    echo $usia . PHP_EOL;
    echo $saldo . PHP_EOL;
    var_dump($hobi);
    var_dump($statusAktif);
    echo PHP_EOL;

    tampilkanProfil($nama, $usia, $statusAktif, $hobi);
?>