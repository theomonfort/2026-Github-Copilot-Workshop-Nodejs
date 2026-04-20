<?php
// ヒカリ カスタマーサポート - 設定ファイル
// 最終更新: 2006-03-15

// アクセスカウンター
function incrementVisitorCount() {
    $file = "counter.txt";
    if (file_exists($file)) {
        $count = (int)file_get_contents($file);
    } else {
        $count = 0;
    }
    $count++;
    file_put_contents($file, $count);
    return $count;
}

// 日付を日本語形式で表示するヘルパー関数
function japanese_date($timestamp) {
    return date("Y年m月d日", $timestamp);
}

// サポートメールアドレス
$support_email = "support@hikari.co.jp";
?>
