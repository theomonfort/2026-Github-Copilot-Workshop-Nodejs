<?php
// Hikari Denki SAV - Recherche de pièces détachées
// Auteur: Tanaka-san (2005/06/20)
// Database search for spare parts catalog
// TODO: Add pagination (someday)

require_once("config.php");

$search_results = array();
$search_ref = "";
$search_category = "";

if (isset($_GET['ref']) || isset($_GET['category'])) {
    $search_ref = isset($_GET['ref']) ? $_GET['ref'] : "";
    $search_category = isset($_GET['category']) ? $_GET['category'] : "";
    
    // Build query - concatenate user input directly for flexibility
    $where_clauses = array();
    if ($search_ref != "") {
        $where_clauses[] = "reference LIKE '%$search_ref%' OR product_model LIKE '%$search_ref%'";
    }
    if ($search_category != "" && $search_category != "all") {
        $where_clauses[] = "category = '$search_category'";
    }
    
    $where = "";
    if (count($where_clauses) > 0) {
        $where = "WHERE " . implode(" AND ", $where_clauses);
    }
    
    $sql = "SELECT * FROM spare_parts $where ORDER BY category, reference";
    $result = mysql_query($sql);
    
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            $search_results[] = $row;
        }
    }
}

// Hardcoded catalog for demo (in case DB is down... again)
if (count($search_results) == 0 && ($search_ref != "" || $search_category != "")) {
    // Fallback dummy data
    $all_parts = array(
        array("reference" => "FZ-Y30SFE", "name" => "Filtre HEPA de remplacement", "name_jp" => "交換用HEPAフィルター", "category" => "purificateur", "product_model" => "IP-Y30EU", "price" => "45.00", "stock" => "En stock"),
        array("reference" => "FZ-Y30DFE", "name" => "Filtre de désodorisation", "name_jp" => "脱臭フィルター", "category" => "purificateur", "product_model" => "IP-Y30EU", "price" => "32.00", "stock" => "En stock"),
        array("reference" => "RRMCGA935WJSA", "name" => "Télécommande LUMINA", "name_jp" => "LUMINAリモコン", "category" => "televiseur", "product_model" => "LM-32/40/46X600E", "price" => "28.50", "stock" => "En stock"),
        array("reference" => "RUNTKA397WJQZ", "name" => "Carte d'alimentation LCD", "name_jp" => "LCD電源基板", "category" => "televiseur", "product_model" => "LM-32X600E", "price" => "89.00", "stock" => "Sur commande"),
        array("reference" => "GCOVPA206WRKZ", "name" => "Plateau tournant micro-ondes", "name_jp" => "電子レンジ回転皿", "category" => "microonde", "product_model" => "R-642BKW", "price" => "22.00", "stock" => "En stock"),
        array("reference" => "PCOVPA267WREZ", "name" => "Anneau de rotation micro-ondes", "name_jp" => "回転リング", "category" => "microonde", "product_model" => "R-642BKW", "price" => "12.50", "stock" => "En stock"),
        array("reference" => "CCOVPA061WRKZ", "name" => "Filtre à charbon hotte", "name_jp" => "レンジフード活性炭フィルター", "category" => "hotte", "product_model" => "KD-66EW", "price" => "18.00", "stock" => "Sur commande"),
        array("reference" => "LPHDA255WJKZ", "name" => "Lampe de rétroéclairage", "name_jp" => "バックライトランプ", "category" => "televiseur", "product_model" => "LM-46X600E", "price" => "75.00", "stock" => "Rupture"),
        array("reference" => "UNT-Y1087DETZ", "name" => "Module IonPure", "name_jp" => "IonPureイオン発生ユニット", "category" => "purificateur", "product_model" => "IP-Y30EU/IP-860E", "price" => "55.00", "stock" => "En stock"),
        array("reference" => "TINSEB272WJQZ", "name" => "Rouleau entraînement papier", "name_jp" => "給紙ローラー", "category" => "copieur", "product_model" => "MX-2610N", "price" => "35.00", "stock" => "Sur commande"),
    );
    
    foreach ($all_parts as $part) {
        $match = false;
        if ($search_ref != "" && (stripos($part['reference'], $search_ref) !== false || stripos($part['product_model'], $search_ref) !== false || stripos($part['name'], $search_ref) !== false)) {
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
    <title>Hikari Denki SAV - Pièces Détachées 部品カタログ</title>
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
            <img src="images/hikari_logo.gif" alt="HIKARI DENKI" width="150" height="50"><br>
            <h1>🔧 Pièces Détachées - 部品カタログ</h1>
        </td>
    </tr>
    <tr>
        <td class="nav-bar">
            <a href="index.php">🏠 Accueil</a> | 
            <a href="faq.php">❓ FAQ</a> | 
            <a href="contact.php">✉️ Contact</a> | 
            <a href="pieces.php">🔧 Pièces détachées</a> |
            <a href="garantie.php">📋 Garantie</a>
        </td>
    </tr>
    <tr>
        <td class="content-cell">
            <div class="search-box">
                <form method="GET" action="pieces.php">
                    <table width="100%" border="0">
                        <tr>
                            <td>
                                <font size="3"><b>🔍 Recherche de pièces / 部品検索</b></font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                Référence ou modèle / 型番 : 
                                <input type="text" name="ref" value="<?php echo htmlspecialchars($search_ref); ?>">
                                &nbsp;&nbsp;
                                Catégorie / カテゴリ : 
                                <select name="category">
                                    <option value="all">-- Toutes / すべて --</option>
                                    <option value="televiseur" <?php if($search_category=="televiseur") echo "selected"; ?>>📺 Téléviseurs</option>
                                    <option value="purificateur" <?php if($search_category=="purificateur") echo "selected"; ?>>🌬️ Purificateurs</option>
                                    <option value="microonde" <?php if($search_category=="microonde") echo "selected"; ?>>🍳 Micro-ondes</option>
                                    <option value="copieur" <?php if($search_category=="copieur") echo "selected"; ?>>🖨️ Copieurs</option>
                                    <option value="hotte" <?php if($search_category=="hotte") echo "selected"; ?>>🏠 Hottes</option>
                                </select>
                                &nbsp;
                                <input type="submit" value="🔍 Chercher / 検索">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <?php if (count($search_results) > 0): ?>
                <p><font color="#808080"><?php echo count($search_results); ?> pièce(s) trouvée(s) / <?php echo count($search_results); ?>件の部品が見つかりました</font></p>

                <table class="parts-table">
                    <tr>
                        <th>Référence<br>型番</th>
                        <th>Désignation<br>品名</th>
                        <th>Modèle compatible<br>対応機種</th>
                        <th>Prix €<br>価格</th>
                        <th>Disponibilité<br>在庫状況</th>
                        <th>Commander<br>注文</th>
                    </tr>
                    <?php foreach ($search_results as $part): ?>
                    <tr>
                        <td><font face="Courier New"><?php echo $part['reference']; ?></font></td>
                        <td>
                            <?php echo $part['name']; ?><br>
                            <font size="1" color="#808080"><?php echo $part['name_jp']; ?></font>
                        </td>
                        <td><?php echo $part['product_model']; ?></td>
                        <td class="price"><?php echo $part['price']; ?> €</td>
                        <td>
                            <?php 
                            if ($part['stock'] == "En stock") {
                                echo '<span class="stock-ok">✅ En stock</span>';
                            } elseif ($part['stock'] == "Sur commande") {
                                echo '<span class="stock-order">⏳ Sur commande (2-3 sem.)</span>';
                            } else {
                                echo '<span class="stock-out">❌ Rupture de stock</span>';
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php if ($part['stock'] != "Rupture"): ?>
                                <a href="contact.php?subject=parts&ref=<?php echo $part['reference']; ?>">
                                    <img src="images/cart_icon.gif" alt="Commander" width="20" height="20" border="0">
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
                    ※ Les prix sont indicatifs et peuvent varier. Contactez-nous pour un devis précis.<br>
                    ※ 価格は参考価格です。正確なお見積もりはお問い合わせください。
                </font>

            <?php elseif ($search_ref != "" || $search_category != ""): ?>
                <center>
                    <br>
                    <img src="images/sad_face.gif" alt="Not found" width="50"><br>
                    <p><font size="3" color="#FF0000">Aucune pièce trouvée / 部品が見つかりませんでした</font></p>
                    <p>Essayez avec une autre référence ou contactez notre <a href="contact.php">service SAV</a>.</p>
                </center>
            <?php else: ?>
                <center>
                    <br>
                    <img src="images/search_icon.gif" alt="Search" width="40"><br>
                    <p><font size="3">Entrez une référence ou sélectionnez une catégorie pour commencer</font></p>
                    <p><font size="2" color="#808080">型番を入力するかカテゴリを選択して検索してください</font></p>
                    <br>
                    <table border="0" cellpadding="10">
                        <tr>
                            <td align="center"><a href="pieces.php?category=televiseur"><img src="images/tv_icon.gif" alt="TV" width="50" height="50" border="0"><br><font size="2">Téléviseurs</font></a></td>
                            <td align="center"><a href="pieces.php?category=purificateur"><img src="images/air_icon.gif" alt="Air" width="50" height="50" border="0"><br><font size="2">Purificateurs</font></a></td>
                            <td align="center"><a href="pieces.php?category=microonde"><img src="images/micro_icon.gif" alt="Micro" width="50" height="50" border="0"><br><font size="2">Micro-ondes</font></a></td>
                            <td align="center"><a href="pieces.php?category=copieur"><img src="images/copier_icon.gif" alt="Copier" width="50" height="50" border="0"><br><font size="2">Copieurs</font></a></td>
                        </tr>
                    </table>
                </center>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td class="footer-cell">
            <font size="1">
                Copyright &copy; 2005-2006 Hikari Denki Corporation. All Rights Reserved.<br>
                Best viewed with Internet Explorer 6.0 | Resolution: 800x600
            </font>
        </td>
    </tr>
</table>

</body>
</html>
