<?php
// ヒカリ カスタマーサポート - 部品カタログ検索
// 作成者: 田中 (2005/06/20)
// データベースから部品を検索
// TODO: ページネーション追加（いつかやる）

require_once("config.php");

$search_results = array();
$search_ref = "";
$search_category = "";

if (isset($_GET['ref']) || isset($_GET['category'])) {
    $search_ref = isset($_GET['ref']) ? $_GET['ref'] : "";
    $search_category = isset($_GET['category']) ? $_GET['category'] : "";
    
    // クエリ構築 — ユーザー入力を直接連結して柔軟に対応
    $where_clauses = array();
    if ($search_ref != "") {
        $where_clauses[] = "reference LIKE '%$search_ref%' OR product_model LIKE '%$search_ref%' OR name_jp LIKE '%$search_ref%'";
    }
    if ($search_category != "" && $search_category != "all") {
        $where_clauses[] = "category = '$search_category'";
    }
    
    $where = "";
    if (count($where_clauses) > 0) {
        $where = "WHERE " . implode(" AND ", $where_clauses);
    }
    
    $sql = "SELECT * FROM spare_parts $where ORDER BY category, reference";
    
    if (function_exists('mysql_query') && $conn) {
        $result = mysql_query($sql);
        if ($result) {
            while ($row = mysql_fetch_assoc($result)) {
                $search_results[] = $row;
            }
        }
    }
}

// ハードコードされたカタログ（DBダウン時のフォールバック…またか）
if (count($search_results) == 0 && ($search_ref != "" || $search_category != "")) {
    // フォールバック用ダミーデータ
    $all_parts = array(
        array("reference" => "LNS-MTK50", "name_jp" => "レンズマウントユニット", "category" => "camera", "product_model" => "HK-D500", "price" => "6800", "stock" => "在庫あり"),
        array("reference" => "SHTR-HKD500", "name_jp" => "シャッターユニット", "category" => "camera", "product_model" => "HK-D500", "price" => "8900", "stock" => "取り寄せ"),
        array("reference" => "IMGSNS-HKD5", "name_jp" => "イメージセンサー", "category" => "camera", "product_model" => "HK-D500", "price" => "24800", "stock" => "取り寄せ"),
        array("reference" => "BATT-HKD500", "name_jp" => "充電式バッテリーパック", "category" => "camera", "product_model" => "HK-D500/D300", "price" => "4500", "stock" => "在庫あり"),
        array("reference" => "STRAP-HK", "name_jp" => "カメラストラップ（ヒカリロゴ入り）", "category" => "camera", "product_model" => "全機種対応", "price" => "1200", "stock" => "在庫あり"),
        array("reference" => "RRMCGA935WJSA", "name_jp" => "LUMINAリモコン", "category" => "tv", "product_model" => "LM-32/40/46X600", "price" => "2980", "stock" => "在庫あり"),
        array("reference" => "RUNTKA397WJQZ", "name_jp" => "LCD電源基板", "category" => "tv", "product_model" => "LM-32X600", "price" => "9800", "stock" => "取り寄せ"),
        array("reference" => "LPHDA255WJKZ", "name_jp" => "バックライトランプ", "category" => "tv", "product_model" => "LM-46X600", "price" => "7800", "stock" => "在庫切れ"),
        array("reference" => "FZ-Y30SFE", "name_jp" => "交換用HEPAフィルター", "category" => "air_purifier", "product_model" => "IP-Y30", "price" => "4800", "stock" => "在庫あり"),
        array("reference" => "FZ-Y30DFE", "name_jp" => "脱臭フィルター", "category" => "air_purifier", "product_model" => "IP-Y30", "price" => "3400", "stock" => "在庫あり"),
        array("reference" => "UNT-Y1087DETZ", "name_jp" => "IonPureイオン発生ユニット", "category" => "air_purifier", "product_model" => "IP-Y30/IP-860", "price" => "5800", "stock" => "在庫あり"),
        array("reference" => "GCOVPA206WRKZ", "name_jp" => "電子レンジ回転皿", "category" => "microwave", "product_model" => "R-642BK", "price" => "2200", "stock" => "在庫あり"),
        array("reference" => "PCOVPA267WREZ", "name_jp" => "回転リング", "category" => "microwave", "product_model" => "R-642BK", "price" => "1280", "stock" => "在庫あり"),
        array("reference" => "MGNTRON-R642", "name_jp" => "マグネトロン", "category" => "microwave", "product_model" => "R-642BK", "price" => "12800", "stock" => "取り寄せ"),
        array("reference" => "TINSEB272WJQZ", "name_jp" => "給紙ローラー", "category" => "copier", "product_model" => "MX-2610N", "price" => "3500", "stock" => "取り寄せ"),
        array("reference" => "DRUM-MX2610", "name_jp" => "感光ドラムユニット", "category" => "copier", "product_model" => "MX-2610N", "price" => "18500", "stock" => "在庫あり"),
        array("reference" => "CCOVPA061WRKZ", "name_jp" => "レンジフード活性炭フィルター", "category" => "range_hood", "product_model" => "KD-66EW", "price" => "1800", "stock" => "取り寄せ"),
        array("reference" => "CAM-MOD-DR100", "name_jp" => "車載カメラモジュール", "category" => "car", "product_model" => "DR-100", "price" => "15800", "stock" => "取り寄せ"),
        array("reference" => "PARK-SNS-3P", "name_jp" => "駐車センサーセット（3個入り）", "category" => "car", "product_model" => "PS-300", "price" => "9800", "stock" => "在庫あり"),
        array("reference" => "NAVI-TP-7", "name_jp" => "ナビ用タッチパネル7インチ", "category" => "car", "product_model" => "NV-700", "price" => "12500", "stock" => "在庫切れ"),
        array("reference" => "ENDO-LS100", "name_jp" => "内視鏡用光源ユニット", "category" => "medical", "product_model" => "ES-100", "price" => "85000", "stock" => "取り寄せ"),
        array("reference" => "MICRO-LNS-40X", "name_jp" => "顕微鏡レンズ 40倍", "category" => "medical", "product_model" => "BM-400", "price" => "32000", "stock" => "在庫あり"),
    );
    
    foreach ($all_parts as $part) {
        $match = false;
        if ($search_ref != "" && (stripos($part['reference'], $search_ref) !== false || stripos($part['product_model'], $search_ref) !== false || stripos($part['name_jp'], $search_ref) !== false)) {
            $match = true;
        }
        if ($search_category != "" && $search_category != "all" && $part['category'] == $search_category) {
            $match = true;
        }
        if ($search_ref == "" && ($search_category == "" || $search_category == "all")) {
            $match = true;
        }
        if ($match) {
            $search_results[] = $part;
        }
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ヒカリ カスタマーサポート - 部品カタログ</title>
    <style>
        body { background-color: #C0C0C0; font-family: 'Comic Sans MS', cursive; color: #000080; background-image: url('images/bg_tile.gif'); }
        .main-table { width: 780px; margin: 0 auto; background-color: #FFFFFF; border: 3px ridge #808080; }
        .header-cell { background: linear-gradient(to bottom, #000080, #0000CD); color: #FFFF00; text-align: center; padding: 10px; }
        .nav-bar { background-color: #000080; padding: 5px; text-align: center; }
        .nav-bar a { color: #00FFFF; text-decoration: none; font-weight: bold; padding: 5px 15px; font-size: 14px; }
        .nav-bar a:hover { color: #FFFF00; }
        .content-cell { padding: 15px; font-size: 13px; }
        .search-box { background-color: #FFFFCC; border: 2px dashed #FFD700; padding: 15px; margin-bottom: 15px; }
        .search-box input[type="text"] { font-size: 14px; padding: 5px; width: 250px; border: 2px inset #808080; }
        .search-box select { font-size: 14px; padding: 4px; border: 2px inset #808080; }
        .search-box input[type="submit"] { font-size: 14px; padding: 5px 20px; background-color: #000080; color: #FFFFFF; border: 2px outset #808080; cursor: pointer; }
        .parts-table { border: 2px solid #000080; border-collapse: collapse; width: 100%; }
        .parts-table th { background-color: #000080; color: #FFFFFF; padding: 8px; font-size: 12px; border: 1px solid #000080; }
        .parts-table td { padding: 6px; border: 1px solid #808080; font-size: 12px; }
        .parts-table tr:nth-child(even) { background-color: #F0F0FF; }
        .parts-table tr:hover { background-color: #FFFFC0; }
        .stock-ok { color: #006400; font-weight: bold; }
        .stock-order { color: #FF8C00; }
        .stock-out { color: #FF0000; font-weight: bold; }
        .price { font-weight: bold; color: #8B0000; }
        .footer-cell { background-color: #000080; color: #C0C0C0; text-align: center; padding: 10px; font-size: 10px; }
    </style>
</head>
<body>

<table class="main-table" cellpadding="0" cellspacing="0">
    <tr>
        <td class="header-cell">
            <img src="images/hikari_logo.gif" alt="ヒカリ" width="150" height="50"><br>
            <h1>🔧 部品カタログ</h1>
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
            <div class="search-box">
                <form method="GET" action="pieces.php">
                    <table width="100%" border="0">
                        <tr>
                            <td>
                                <font size="3"><b>🔍 部品検索</b></font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                型番・品名：
                                <input type="text" name="ref" value="<?php echo htmlspecialchars($search_ref); ?>" placeholder="型番またはキーワード">
                                &nbsp;&nbsp;
                                カテゴリ：
                                <select name="category">
                                    <option value="all">-- すべて --</option>
                                    <option value="camera" <?php if($search_category=="camera") echo "selected"; ?>>📷 デジタルカメラ</option>
                                    <option value="tv" <?php if($search_category=="tv") echo "selected"; ?>>📺 液晶テレビ</option>
                                    <option value="air_purifier" <?php if($search_category=="air_purifier") echo "selected"; ?>>🌬️ 空気清浄機</option>
                                    <option value="microwave" <?php if($search_category=="microwave") echo "selected"; ?>>🍳 電子レンジ</option>
                                    <option value="copier" <?php if($search_category=="copier") echo "selected"; ?>>🖨️ コピー機</option>
                                    <option value="car" <?php if($search_category=="car") echo "selected"; ?>>🚗 車載機器</option>
                                    <option value="medical" <?php if($search_category=="medical") echo "selected"; ?>>🔬 医療機器</option>
                                    <option value="range_hood" <?php if($search_category=="range_hood") echo "selected"; ?>>🏠 レンジフード</option>
                                </select>
                                &nbsp;
                                <input type="submit" value="🔍 検索">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <?php if (count($search_results) > 0): ?>
                <p><font color="#808080"><?php echo count($search_results); ?>件の部品が見つかりました</font></p>

                <table class="parts-table">
                    <tr>
                        <th>型番</th>
                        <th>品名</th>
                        <th>対応機種</th>
                        <th>価格（税込）</th>
                        <th>在庫状況</th>
                        <th>注文</th>
                    </tr>
                    <?php foreach ($search_results as $part): ?>
                    <tr>
                        <td><font face="Courier New"><?php echo $part['reference']; ?></font></td>
                        <td><?php echo $part['name_jp']; ?></td>
                        <td><?php echo $part['product_model']; ?></td>
                        <td class="price">&yen;<?php echo number_format($part['price']); ?></td>
                        <td>
                            <?php 
                            if ($part['stock'] == "在庫あり") {
                                echo '<span class="stock-ok">✅ 在庫あり</span>';
                            } elseif ($part['stock'] == "取り寄せ") {
                                echo '<span class="stock-order">⏳ 取り寄せ（2〜3週間）</span>';
                            } else {
                                echo '<span class="stock-out">❌ 在庫切れ</span>';
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php if ($part['stock'] != "在庫切れ"): ?>
                                <a href="contact.php?subject=parts&ref=<?php echo $part['reference']; ?>">
                                    <img src="images/cart_icon.gif" alt="注文" width="20" height="20" border="0">
                                </a>
                            <?php else: ?>
                                <font color="#808080">-</font>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>

                <br>
                <font size="1" color="#808080">
                    ※ 価格は参考価格です（税込）。正確なお見積もりはお問い合わせください。<br>
                    ※ 在庫状況は随時変動します。品切れの際はご容赦ください。
                </font>

            <?php elseif ($search_ref != "" || $search_category != ""): ?>
                <center>
                    <br>
                    <img src="images/sad_face.gif" alt="見つかりません" width="50"><br>
                    <p><font size="3" color="#FF0000">該当する部品が見つかりませんでした</font></p>
                    <p>別の型番で検索するか、<a href="contact.php">カスタマーサポート</a>にお問い合わせください。</p>
                </center>
            <?php else: ?>
                <center>
                    <br>
                    <img src="images/search_icon.gif" alt="検索" width="40"><br>
                    <p><font size="3">型番を入力するかカテゴリを選択して検索してください</font></p>
                    <br>
                    <table border="0" cellpadding="10">
                        <tr>
                            <td align="center"><a href="pieces.php?category=camera"><img src="images/camera_icon.gif" alt="カメラ" width="50" height="50" border="0"><br><font size="2">デジタルカメラ</font></a></td>
                            <td align="center"><a href="pieces.php?category=tv"><img src="images/tv_icon.gif" alt="テレビ" width="50" height="50" border="0"><br><font size="2">液晶テレビ</font></a></td>
                            <td align="center"><a href="pieces.php?category=air_purifier"><img src="images/air_icon.gif" alt="空気清浄機" width="50" height="50" border="0"><br><font size="2">空気清浄機</font></a></td>
                            <td align="center"><a href="pieces.php?category=microwave"><img src="images/micro_icon.gif" alt="電子レンジ" width="50" height="50" border="0"><br><font size="2">電子レンジ</font></a></td>
                        </tr>
                        <tr>
                            <td align="center"><a href="pieces.php?category=copier"><img src="images/copier_icon.gif" alt="コピー機" width="50" height="50" border="0"><br><font size="2">コピー機</font></a></td>
                            <td align="center"><a href="pieces.php?category=car"><img src="images/car_icon.gif" alt="車載機器" width="50" height="50" border="0"><br><font size="2">車載機器</font></a></td>
                            <td align="center"><a href="pieces.php?category=medical"><img src="images/medical_icon.gif" alt="医療機器" width="50" height="50" border="0"><br><font size="2">医療機器</font></a></td>
                            <td align="center"><a href="pieces.php?category=range_hood"><img src="images/hood_icon.gif" alt="レンジフード" width="50" height="50" border="0"><br><font size="2">レンジフード</font></a></td>
                        </tr>
                    </table>
                </center>
            <?php endif; ?>
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
