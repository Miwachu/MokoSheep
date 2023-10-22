<?php
header("Content-Type: application/json");

$json = getParamJSON();

if (!isset($json['canvasData'])) {
    sendResult(false, 'Empty query parameter: canvasData');
    exit(1);
}

if (strlen($json['canvasData']) > (1024 * 30)) {
    sendResult(false, 'Too long string: canvasData');
    exit(1);
}

if (!preg_match('/^canvasData:image\/png;base64,/', $json['canvasData'])) {
    sendResult(false, 'Not Allow canvasData type: data');
    exit(1);
}

$data = $json['canvasData'];
$data = str_replace('canvasData:image/png;base64,', '', $data);
$data = str_replace(' ', '+', $data);
$image = base64_decode($data);

// ファイルへ保存
$file = sprintf('%s.png', uniqid());    // ファイル名を作成
$result = file_put_contents('your-image-directory/' . $file, $image, LOCK_EX);

// 結果を返却
if ($result !== false) {
    sendResult(true, $file);  // ブラウザにファイル名を返却する
} else {
    // 書き込みエラー
    sendResult(false, 'Can not write image canvasData');
}

function getParamJSON() {
    $buff = file_get_contents('php://input');
    $json = json_decode($buff, true);

    return ($json);
}

function sendResult($status, $data) {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');

    echo json_encode([
        "status" => $status,
        "result" => $data
    ]);
}
?>
