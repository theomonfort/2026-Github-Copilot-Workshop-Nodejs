<?php
// ヒカリ電機 カスタマーサポート - 設定ファイル
// 最終更新: 2006-03-15 田中
// 注意: このファイルを本番環境で公開しないでください！

$db_host = "localhost";
$db_user = "root";
$db_pass = "hikari2005";  // パスワードをハードコードしています（絶対に変更しないでください、全ファイルに埋め込まれています）
$db_name = "hikari_sav";

// 注意: mysql_* 関数は PHP 7.0 以降で削除されました
// このレガシーコードは PHP 4.3〜5.6 でのみ完全動作します
// モダンPHPではDB接続が無効になり、ハードコードされたデータにフォールバックします
$conn = false;
if (function_exists('mysql_connect')) {
    $conn = @mysql_connect($db_host, $db_user, $db_pass);
    if ($conn) {
        mysql_select_db($db_name, $conn);
        mysql_query("SET NAMES 'utf8'");
    }
}

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
$support_email = "support@hikari-denki.co.jp";
?>
