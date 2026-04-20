<?php
// Hikari Denki SAV - Garantie Information
// Simple static page - no DB needed
// Coded by Nakamura-san on a Friday afternoon (2005/12/16)

require_once("config.php");

// Check warranty by serial number (if submitted)
$warranty_result = null;
if (isset($_POST['serial'])) {
    $serial = $_POST['serial'];
    
    // Query database for warranty info
    $sql = "SELECT * FROM product_registrations WHERE serial_number = '$serial'";
    
    if (function_exists('mysql_query') && $conn) {
        $result = mysql_query($sql);
        if ($result && mysql_num_rows($result) > 0) {
            $warranty_result = mysql_fetch_assoc($result);
        } else {
            $warranty_result = "not_found";
        }
    } else {
        // Fallback demo data when no DB
        $demo_products = array(
            'SN-2005-00142' => array('product_name' => 'LUMINA LM-32X600E', 'purchase_date' => '2005-06-15', 'warranty_end' => '2007-06-15'),
            'SN-2005-00287' => array('product_name' => 'IonPure IP-Y30EU', 'purchase_date' => '2005-09-20', 'warranty_end' => '2007-09-20'),
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
    <title>Hikari Denki SAV - Garantie 保証について</title>
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
            <img src="images/hikari_logo.gif" alt="HIKARI DENKI" width="150" height="50"><br>
            <h1>📋 Garantie - 保証について</h1>
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

            <h2><font color="#000080">📋 Conditions de Garantie Hikari Denki</font></h2>
            <h3><font color="#000080">保証条件</font></h3>

            <table class="warranty-table">
                <tr>
                    <th width="30%">Catégorie / カテゴリ</th>
                    <th width="25%">Durée / 保証期間</th>
                    <th>Conditions / 条件</th>
                </tr>
                <tr>
                    <td><b>📺 Téléviseurs LUMINA</b><br>液晶テレビ</td>
                    <td align="center"><font size="4" color="#006400"><b>2 ans</b></font><br>2年間</td>
                    <td>Garantie pièces et main d'œuvre. Le panneau LCD est garanti 3 ans.<br>
                    <font size="1">部品および工賃保証。液晶パネルは3年保証。</font></td>
                </tr>
                <tr>
                    <td><b>🌬️ Purificateurs d'air</b><br>空気清浄機</td>
                    <td align="center"><font size="4" color="#006400"><b>2 ans</b></font><br>2年間</td>
                    <td>Garantie pièces et main d'œuvre. Les filtres (pièces d'usure) sont garantis 6 mois.<br>
                    <font size="1">部品および工賃保証。フィルター（消耗品）は6ヶ月保証。</font></td>
                </tr>
                <tr>
                    <td><b>🍳 Micro-ondes</b><br>電子レンジ</td>
                    <td align="center"><font size="4" color="#006400"><b>2 ans</b></font><br>2年間</td>
                    <td>Garantie pièces et main d'œuvre. Le magnétron est garanti 5 ans.<br>
                    <font size="1">部品および工賃保証。マグネトロンは5年保証。</font></td>
                </tr>
                <tr>
                    <td><b>🖨️ Copieurs</b><br>コピー機</td>
                    <td align="center"><font size="4" color="#006400"><b>1 an</b></font><br>1年間</td>
                    <td>Garantie pièces uniquement. Contrat de maintenance recommandé.<br>
                    <font size="1">部品のみ保証。メンテナンス契約を推奨。</font></td>
                </tr>
            </table>

            <br>

            <h2><font color="#000080">⚠️ Exclusions de garantie / 保証対象外</font></h2>
            <ul>
                <li>Dommages causés par une mauvaise utilisation ou un accident</li>
                <li>Pièces d'usure (filtres, lampes, etc.) après la période spécifiée</li>
                <li>Réparations effectuées par un technicien non agréé Hikari Denki</li>
                <li>Dommages causés par des catastrophes naturelles (地震、台風等)</li>
                <li>Produits dont le numéro de série a été retiré ou modifié</li>
            </ul>

            <br>

            <h2><font color="#000080">🔍 Vérifier votre garantie / 保証確認</font></h2>

            <div class="check-box">
                <form method="POST" action="garantie.php">
                    <center>
                        <font size="3"><b>Entrez votre numéro de série / シリアル番号を入力:</b></font><br><br>
                        <input type="text" name="serial" placeholder="Ex: SN-2005-XXXXX" value="<?php echo isset($_POST['serial']) ? $_POST['serial'] : ''; ?>">
                        <input type="submit" value="🔍 Vérifier / 確認">
                    </center>
                </form>

                <?php if ($warranty_result === "not_found"): ?>
                    <br>
                    <center>
                        <font color="#FF0000"><b>❌ Produit non trouvé dans notre base de données.</b></font><br>
                        <font size="2">Veuillez <a href="contact.php">contacter notre service</a> avec votre facture d'achat.</font>
                    </center>
                <?php elseif ($warranty_result !== null): ?>
                    <br>
                    <table width="100%" border="1" cellpadding="5" style="border-color: #006400;">
                        <tr><td><b>Produit:</b></td><td><?php echo $warranty_result['product_name']; ?></td></tr>
                        <tr><td><b>Date d'achat:</b></td><td><?php echo $warranty_result['purchase_date']; ?></td></tr>
                        <tr><td><b>Expiration garantie:</b></td><td><?php echo $warranty_result['warranty_end']; ?></td></tr>
                        <tr><td><b>Statut:</b></td><td>
                            <?php 
                            if (strtotime($warranty_result['warranty_end']) > time()) {
                                echo '<font color="#006400"><b>✅ Garantie valide</b></font>';
                            } else {
                                echo '<font color="#FF0000"><b>❌ Garantie expirée</b></font>';
                            }
                            ?>
                        </td></tr>
                    </table>
                <?php endif; ?>
            </div>

            <br>

            <h2><font color="#000080">📞 Pièces détachées disponibles / 部品の供給期間</font></h2>
            <p>
                Hikari Denki s'engage à fournir les pièces détachées pendant une durée minimale après la fin de production :
            </p>
            <table class="warranty-table">
                <tr><th>Produit</th><th>Disponibilité pièces après fin de production</th></tr>
                <tr><td>Téléviseurs</td><td>8 ans</td></tr>
                <tr><td>Micro-ondes / Fours</td><td>8 ans</td></tr>
                <tr><td>Purificateurs d'air</td><td>6 ans</td></tr>
                <tr><td>Copieurs / Imprimantes</td><td>5 ans (ou durée du contrat de maintenance)</td></tr>
            </table>

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
