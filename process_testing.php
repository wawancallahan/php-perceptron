<?php

header('Content-Type: application/json');

require_once './process_learning.php';


$defaultVector = [
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1
];

// echo count($defaultVector);

$vector = $defaultVector;

if (isset($_POST['vector'])) {
    foreach ($_POST['vector'] as $vectorPost) {
        $vectorName = $vectorPost['name'];
        $vectorName = str_replace('vector', '', $vectorName);
        $vectorName = str_replace(['[', ']'], '', $vectorName);

        $vector[$vectorName - 1] = 1;
    }
}


// testing

$theta = $_POST['theta'] ?? 10;
$maxIteration = $_POST['max_iteration'] ?? 100;

$processLearning = ProcessLearning::learning($theta, $maxIteration);
$bobot = $processLearning['bobot'];
$bias = $processLearning['bias'];

$sum = 0;

foreach ($vector as $vectorIndex => $vectorInput) {
    $sum += $vectorInput * $bobot[$vectorIndex];
}

$hasil = $bias + $sum;

$status = ProcessLearning::cekStatus($hasil, $theta);

$pesan = $status == 1 ? 'Vector membentuk huruf A' : 'Vector tidak membentuk huruf A';

echo json_encode([
    'bias' => $bias,
    'epoch' => $processLearning['epoch'],
    'sum' => $sum,
    'hasil' => $hasil,
    'status' => $status,
    'pesan' => $pesan
]);
