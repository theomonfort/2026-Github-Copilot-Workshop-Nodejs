<?php
// ヒカリ カスタマーサポート - 保証情報
// 簡単な静的ページ — DB不要
// 中村が金曜の午後に作成 (2005/12/16)

require_once("config.php");

// シリアル番号で保証確認（フォーム送信時）
$warranty_result = null;
if (isset($_POST['serial'])) {
    $serial = $_POST['serial'];
    
    // データベースから保証情報を検索
    $sql = "SELECT * FROM product_registrations WHERE serial_number = '$serial'";
    
    if (function_exists('mysql_query') && $conn) {
        $result = mysql_query($sql);
        if ($result && mysql_num_rows($result) > 0) {
            $warranty_result = mysql_fetch_assoc($result);
        } else {
            $warranty_result = "not_found";
        }
    } else {
        // DB未接続時のデモ用データ
        $demo_products = array(
            'SN-2005-00142' => array('product_name' => 'LUMINA LM-32X600', 'purchase_date' => '2005-06-15', 'warranty_end' => '2007-06-15'),
            'SN-2005-00287' => array('product_name' => 'IonPure IP-Y30', 'purchase_date' => '2005-09-20', 'warranty_end' => '2007-09-20'),
            'SN-2005-00401' => array('product_name' => 'HK-D500 デジタルカメラ', 'purchase_date' => '2005-11-03', 'warranty_end' => '2006-11-03'),
            'SN-2006-00033' => array('product_name' => 'ドライブレコーダー DR-100', 'purchase_date' => '2006-01-10', 'warranty_end' => '2009-01-10'),
            'SN-2005-00512' => array('product_name' => '電子レンジ R-642BK', 'purchase_date' => '2005-08-22', 'warranty_end' => '2007-08-22'),
        );
        if (isset($demo_products[$serial])) {
            $warranty_result = $demo_products[$serial];
        } else {
            $warranty_result = "not_found";
        }
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ヒカリ カスタマーサポート - 保証について</title>
    <style>
        body { background-color: #C0C0C0; font-family: 'Comic Sans MS', cursive; color: #000080; background-image: url('images/bg_tile.gif'); }
        .main-table { width: 780px; margin: 0 auto; background-color: #FFFFFF; border: 3px ridge #808080; }
        .header-cell { background: linear-gradient(to bottom, #000080, #0000CD); color: #FFFF00; text-align: center; padding: 10px; }
        .nav-bar { background-color: #000080; padding: 5px; text-align: center; }
        .nav-bar a { color: #00FFFF; text-decoration: none; font-weight: bold; padding: 5px 15px; font-size: 14px; }
        .nav-bar a:hover { color: #FFFF00; }
        .content-cell { padding: 15px; font-size: 13px; }
        .warranty-table { border: 2px solid #000080; border-collapse: collapse; width: 100%; margin: 10px 0; }
        .warranty-table td, .warranty-table th { border: 1px solid #000080; padding: 10px; }
        .warranty-table th { background-color: #000080; color: #FFFFFF; }
        .check-box { background-color: #E8FFE8; border: 2px solid #006400; padding: 15px; margin: 15px 0; }
        .check-box input[type="text"] { font-size: 14px; padding: 5px; border: 2px inset #808080; width: 250px; }
        .check-box input[type="submit"] { font-size: 14px; padding: 5px 20px; background-color: #006400; color: #FFFFFF; border: 2px outset #808080; cursor: pointer; }
        .footer-cell { background-color: #000080; color: #C0C0C0; text-align: center; padding: 10px; font-size: 10px; }
    </style>
</head>
<body>

<table class="main-table" cellpadding="0" cellspacing="0">
    <tr>
        <td class="header-cell">
            <img src="images/hikari_logo.gif" alt="ヒカリ" width="150" height="50"><br>
            <h1>📋 保証について</h1>
        </td>
    </tr>
    <tr>
        <td class="nav-bar">
            <a href="index.php">🏠 ホーム</a> | 
            <a href="faq.php">❓ よくあるご質問</a> | 
            <a href="contact.php">✉️ お問い合わせ</a> | 
            <a href="pieces.php">🔧 部品カタログ</a> |
            <a href="garantie.php">📋 保証について</a>
        </td>
    </tr>
    <tr>
        <td class="content-cell">

            <h2><font color="#000080">📋 ヒカリ 保証条件</font></h2>

            <table class="warranty-table">
                <tr>
                    <th width="30%">製品カテゴリ</th>
                    <th width="20%">保証期間</th>
                    <th>条件・備考</th>
                </tr>
                <tr>
                    <td><b>📷 デジタルカメラ</b></td>
                    <td align="center"><font size="4" color="#006400"><b>1年</b></font></td>
                    <td>本体の部品および工賃保証。交換レンズは2年保証。<br>
                    <font size="1">※ バッテリー等の消耗品は6ヶ月保証</font></td>
                </tr>
                <tr>
                    <td><b>📺 液晶テレビ LUMINA</b></td>
                    <td align="center"><font size="4" color="#006400"><b>2年</b></font></td>
                    <td>部品および工賃保証。液晶パネルは3年保証。</td>
                </tr>
                <tr>
                    <td><b>🌬️ 空気清浄機</b></td>
                    <td align="center"><font size="4" color="#006400"><b>2年</b></font></td>
                    <td>部品および工賃保証。フィルター（消耗品）は6ヶ月保証。</td>
                </tr>
                <tr>
                    <td><b>🍳 電子レンジ</b></td>
                    <td align="center"><font size="4" color="#006400"><b>2年</b></font></td>
                    <td>部品および工賃保証。マグネトロンは5年保証。</td>
                </tr>
                <tr>
                    <td><b>🖨️ コピー機</b></td>
                    <td align="center"><font size="4" color="#006400"><b>1年</b></font></td>
                    <td>部品のみ保証。メンテナンス契約を推奨。</td>
                </tr>
                <tr>
                    <td><b>🚗 車載機器</b></td>
                    <td align="center"><font size="4" color="#006400"><b>3年</b></font></td>
                    <td>ドライブレコーダー、駐車センサー、カーナビ等。取付工賃は含まず。</td>
                </tr>
                <tr>
                    <td><b>🔬 医療機器</b></td>
                    <td align="center"><font size="4" color="#FF8C00"><b>要契約</b></font></td>
                    <td>保守契約に基づく個別対応。詳細は医療機器サポート窓口までお問い合わせください。</td>
                </tr>
            </table>

            <br>

            <h2><font color="#000080">⚠️ 保証対象外</font></h2>
            <ul>
                <li>誤った使用方法または事故による損傷</li>
                <li>消耗品（フィルター、ランプ等）の保証期間経過後の交換</li>
                <li>ヒカリ認定技術者以外による修理・改造</li>
                <li>自然災害（地震、台風、落雷、洪水等）による損傷</li>
                <li>シリアル番号が削除または改変された製品</li>
                <li>海外で購入された並行輸入品</li>
            </ul>

            <br>

            <h2><font color="#000080">🔍 保証状況の確認</font></h2>

            <div class="check-box">
                <form method="POST" action="garantie.php">
                    <center>
                        <font size="3"><b>シリアル番号を入力してください：</b></font><br><br>
                        <input type="text" name="serial" placeholder="例: SN-2005-XXXXX" value="<?php echo isset($_POST['serial']) ? $_POST['serial'] : ''; ?>">
                        <input type="submit" value="🔍 確認する">
                    </center>
                </form>

                <?php if ($warranty_result === "not_found"): ?>
                    <br>
                    <center>
                        <font color="#FF0000"><b>❌ お客様の製品がデータベースに見つかりませんでした。</b></font><br>
                        <font size="2">ご購入時のレシートをお手元にご用意の上、<a href="contact.php">お問い合わせ</a>ください。</font>
                    </center>
                <?php elseif ($warranty_result !== null): ?>
                    <br>
                    <table width="100%" border="1" cellpadding="5" style="border-color: #006400;">
                        <tr><td><b>製品名：</b></td><td><?php echo $warranty_result['product_name']; ?></td></tr>
                        <tr><td><b>購入日：</b></td><td><?php echo $warranty_result['purchase_date']; ?></td></tr>
                        <tr><td><b>保証期限：</b></td><td><?php echo $warranty_result['warranty_end']; ?></td></tr>
                        <tr><td><b>保証状況：</b></td><td>
                            <?php 
                            if (strtotime($warranty_result['warranty_end']) > time()) {
                                echo '<font color="#006400"><b>✅ 保証期間内</b></font>';
                            } else {
                                echo '<font color="#FF0000"><b>❌ 保証期間終了</b></font>';
                            }
                            ?>
                        </td></tr>
                    </table>
                <?php endif; ?>
            </div>

            <br>

            <h2><font color="#000080">📞 部品の供給期間</font></h2>
            <p>
                ヒカリは、製品の生産終了後も以下の期間、部品を供給いたします：
            </p>
            <table class="warranty-table">
                <tr><th>製品カテゴリ</th><th>生産終了後の部品供給期間</th></tr>
                <tr><td>📷 デジタルカメラ</td><td>6年</td></tr>
                <tr><td>📺 液晶テレビ</td><td>8年</td></tr>
                <tr><td>🍳 電子レンジ・オーブン</td><td>8年</td></tr>
                <tr><td>🌬️ 空気清浄機</td><td>6年</td></tr>
                <tr><td>🖨️ コピー機・プリンター</td><td>5年（またはメンテナンス契約期間）</td></tr>
                <tr><td>🚗 車載機器</td><td>7年</td></tr>
                <tr><td>🔬 医療機器</td><td>10年（保守契約に基づく）</td></tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="footer-cell">
            <font size="1">
                Copyright &copy; 2005-2006 ヒカリ株式会社 All Rights Reserved.<br>
                Best viewed with Internet Explorer 6.0 | 推奨解像度: 800x600
            </font>
        </td>
    </tr>
</table>

</body>
</html>
