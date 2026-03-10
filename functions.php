<?php

    declare(strict_types=1);

    function heading(string $title): void {
        echo PHP_EOL . "=== {$title} ===" . PHP_EOL;
    }

    function rupiah(float $amount): string {
        return 'Rp' . number_format($amount, 0, ',', '.');
    }

    heading("Soal 2: Sistem Penilaian Sederhana (Conditional)");

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

    heading("Soal 3: Mini Sistem Kasir (Conditional, Function, Array, Looping)");
    function hitungTotalBelanja($daftarBelanja,	$isMember =	false): array {
        $grandtotal = 0;
        $totalQty = 0;

        foreach($daftarBelanja as $item) {
            $subtotal = $item['harga'] * $item['qty'];
            $grandtotal += $subtotal;
            $totalQty += $item['qty'];
        }

        $diskonNominal = 0;
        $diskonPersen = 0;

        $isAllItemDiscountValid = false;
        foreach($daftarBelanja as $item) {
            if($item['qty'] > 5) {
                $isAllItemDiscountValid = true;
            } else {
                break;
            }
        }

        if($isAllItemDiscountValid) {
            if($isMember) {
                $diskonPersen = 20;
                $diskonNominal = $grandtotal * $diskonPersen / 100;
            } else {
                $diskonPersen = 5;
                $diskonNominal = $grandtotal * $diskonPersen / 100;
            }
        } else if ($isMember) {
            $diskonPersen = 15;
            $diskonNominal = $grandtotal * $diskonPersen / 100;
        }

        $totalBayar = $grandtotal - $diskonNominal;

        return [
            "grandTotal" => $grandtotal,
            "totalQty" => $totalQty,
            "diskonPersen" => $diskonPersen,
            "diskonNominal" => $diskonNominal,
            "totalBayar" => $totalBayar
        ];
    }

    function printReceipt(array $summary): void {
        echo 'STRUK BELANJA' . PHP_EOL;
        echo str_repeat('-', 40) . PHP_EOL;

        echo 'Grand Total : ' . rupiah($summary['grandTotal']) . PHP_EOL;
        echo 'Total Qty : ' . $summary['totalQty'] . PHP_EOL;
        echo 'Diskon (%) : ' . $summary['diskonPersen'] . "%" . PHP_EOL;
        echo 'Diskon (Rp) : ' . rupiah($summary['diskonNominal']) . PHP_EOL;
        echo 'Total Bayar : ' . rupiah($summary['totalBayar']) . PHP_EOL;
    }

    $productCustomer1 = [
        ["nama" => "Monitor", "harga" => 1250000, "qty" => 1],
        ["nama" => "Keyboard", "harga" => 500000, "qty" => 2]
    ];

    $productCustomer2 = [
        ["nama" => "Monitor", "harga" => 1250000, "qty" => 6],
        ["nama" => "Keyboard", "harga" => 500000, "qty" => 7]
    ];

    $productCustomer3 = [
        ["nama" => "Monitor", "harga" => 1250000, "qty" => 6],
        ["nama" => "Keyboard", "harga" => 500000, "qty" => 6]
    ];

    $productCustomer4 = [
        ["nama" => "Monitor", "harga" => 1250000, "qty" => 1],
        ["nama" => "Keyboard", "harga" => 500000, "qty" => 2]
    ];

    printReceipt(hitungTotalBelanja($productCustomer1, false));
    // printReceipt(hitungTotalBelanja($productCustomer2, true));
    // printReceipt(hitungTotalBelanja($productCustomer3, false));
    printReceipt(hitungTotalBelanja($productCustomer4, true));

    heading("Soal 4: Data Siswa & Rekap Nilai (Array Multidimensi, Looping, Function)");

    function prosesDataSiswa($dataSiswa): array {
        foreach($dataSiswa as &$data) {
            $rataRata = round(array_sum($data['nilai']) / count($data['nilai']), 2);
            $data['rataRata'] = $rataRata;
            if($rataRata >= 85) {
                 $data['status'] = "Lulus dengan pujian";
            } else if($rataRata >= 70) {
                $data['status'] = "Lulus";
            } else {
                $data['status'] = "Remedial";
            }
        }

        return $dataSiswa;
    }

    function filterSiswa(array $students): array {
        $siswaLulus = [];
        foreach($students as $student) {
            if($student['status'] !== "Remedial") {
                $siswaLulus[] = $student;
            }
        }

        return $siswaLulus;
    }

    $students = [
        ["nama" => "Budi", "jurusan" => "RPL", "nilai" => [80, 90, 75]],
        ["nama" => "Nola", "jurusan" => "TKJ", "nilai" => [85, 95, 90]],
        ["nama" => "Risti", "jurusan" => "TBG", "nilai" => [65, 70, 60]],
    ];

    $result = filterSiswa(prosesDataSiswa($students));

    foreach($result as $student) {
        echo 'Nama : ' . $student['nama'] . PHP_EOL;
        echo 'Jurusan : ' . $student['jurusan'] . PHP_EOL;
        echo 'Rata-rata : ' . $student['rataRata'] . PHP_EOL;
        echo 'Status : ' . $student['status'] . PHP_EOL;
        echo PHP_EOL;
    }
?>