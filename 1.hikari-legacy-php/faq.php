<?php
// Hikari Denki SAV - Foire Aux Questions
// WARNING: DO NOT MODIFY - Last working version by Suzuki-san 2005/08/12
// TODO: maybe use a database someday...

require_once("config.php");

// FAQ data - hardcoded because the database migration never happened
$faqs = array(
    array(
        "category" => "テレビ / Téléviseurs",
        "question" => "Mon téléviseur LUMINA ne s'allume plus, que faire ?",
        "answer" => "Vérifiez d'abord que le câble d'alimentation est bien branché. Essayez de débrancher le téléviseur pendant 30 secondes, puis rebranchez-le. Si le problème persiste, contactez notre hotline au 0 809 10 15 15."
    ),
    array(
        "category" => "テレビ / Téléviseurs",
        "question" => "Comment régler la résolution de mon écran LUMINA ?",
        "answer" => "Appuyez sur le bouton MENU de votre télécommande, puis allez dans Paramètres > Affichage > Résolution. Sélectionnez la résolution souhaitée (recommandé: 1080p pour les modèles LM-32/40/46)."
    ),
    array(
        "category" => "テレビ / Téléviseurs", 
        "question" => "Mon LUMINA affiche 'Pas de signal', que faire ?",
        "answer" => "Vérifiez que le câble HDMI/péritel est bien connecté. Assurez-vous que la bonne source d'entrée est sélectionnée (bouton INPUT sur la télécommande). Essayez un autre câble si possible."
    ),
    array(
        "category" => "空気清浄機 / Purificateurs d'air",
        "question" => "Quand dois-je remplacer le filtre IonPure ?",
        "answer" => "Le filtre HEPA doit être remplacé tous les 2 ans en utilisation normale (environ 8h/jour). Le filtre de désodorisation peut être lavé à l'eau et réutilisé jusqu'à 5 fois. Référence du filtre de remplacement : FZ-Y30SFE."
    ),
    array(
        "category" => "空気清浄機 / Purificateurs d'air",
        "question" => "Mon purificateur fait un bruit anormal",
        "answer" => "Un bruit anormal peut indiquer un filtre encrassé. Retirez et nettoyez le filtre. Si le bruit persiste, vérifiez qu'aucun objet n'obstrue l'entrée d'air. Contactez le SAV si le problème continue."
    ),
    array(
        "category" => "電子レンジ / Micro-ondes",
        "question" => "Mon micro-ondes Hikari ne chauffe plus",
        "answer" => "ATTENTION: N'essayez JAMAIS de réparer un micro-ondes vous-même! Les condensateurs peuvent conserver une charge mortelle. Contactez immédiatement notre service technique au 0 809 10 15 15."
    ),
    array(
        "category" => "電子レンジ / Micro-ondes",
        "question" => "Le plateau tournant de mon micro-ondes ne tourne plus",
        "answer" => "Vérifiez que le plateau est correctement positionné sur le guide de rotation. Nettoyez le guide et l'anneau de rotation. La pièce de remplacement (plateau + anneau) est disponible dans notre catalogue de pièces détachées."
    ),
    array(
        "category" => "コピー機 / Copieurs",
        "question" => "Bourrage papier fréquent sur mon copieur Hikari",
        "answer" => "1) Retirez tout le papier du bac. 2) Vérifiez qu'il n'y a pas de morceaux de papier coincés. 3) Aérez les feuilles avant de les remettre. 4) Vérifiez que le papier est du bon grammage (60-90g/m²). 5) Nettoyez les rouleaux d'entraînement avec un chiffon humide."
    ),
    array(
        "category" => "一般 / Général",
        "question" => "Comment trouver la référence de mon produit Hikari Denki ?",
        "answer" => "La référence du modèle se trouve sur une étiquette à l'arrière ou sous l'appareil. Elle commence généralement par 2-3 lettres suivies de chiffres (ex: LM-32X600E, IP-Y30EU, R-642BKW)."
    ),
    array(
        "category" => "一般 / Général",
        "question" => "Ma garantie est-elle encore valable ?",
        "answer" => "La garantie standard Hikari Denki est de 2 ans à compter de la date d'achat. Munissez-vous de votre facture d'achat et contactez-nous pour vérifier votre éligibilité. Pour les pièces d'usure (filtres, lampes), la garantie est de 6 mois."
    )
);

// Search functionality - basic string matching
$search_query = "";
$filtered_faqs = $faqs;
if (isset($_GET['q']) && $_GET['q'] != "") {
    $search_query = $_GET['q'];
    $filtered_faqs = array();
    foreach ($faqs as $faq) {
        // Simple search - no sanitization needed right? It's just a search...
        if (stripos($faq['question'], $search_query) !== false || 
            stripos($faq['answer'], $search_query) !== false ||
            stripos($faq['category'], $search_query) !== false) {
            $filtered_faqs[] = $faq;
        }
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Hikari Denki SAV - FAQ よくあるご質問</title>
    <style>
        body { background-color: #C0C0C0; font-family: 'Comic Sans MS', cursive; color: #000080; background-image: url('images/bg_tile.gif'); }
        .main-table { width: 780px; margin: 0 auto; background-color: #FFFFFF; border: 3px ridge #808080; }
        .header-cell { background: linear-gradient(to bottom, #000080, #0000CD); color: #FFFF00; text-align: center; padding: 10px; }
        .nav-bar { background-color: #000080; padding: 5px; text-align: center; }
        .nav-bar a { color: #00FFFF; text-decoration: none; font-weight: bold; padding: 5px 15px; font-size: 14px; }
        .nav-bar a:hover { color: #FFFF00; }
        .content-cell { padding: 15px; font-size: 13px; }
        .faq-category { background-color: #000080; color: #FFFFFF; padding: 8px; font-size: 16px; margin: 15px 0 5px 0; }
        .faq-question { background-color: #E0E0FF; padding: 10px; margin: 5px 0 0 0; cursor: pointer; border: 1px solid #808080; font-weight: bold; }
        .faq-answer { background-color: #F5F5FF; padding: 10px; margin: 0 0 5px 0; border: 1px solid #808080; border-top: none; }
        .search-box { text-align: center; padding: 15px; background-color: #FFFFCC; border: 2px dashed #FFD700; margin-bottom: 15px; }
        .search-box input[type="text"] { font-size: 14px; padding: 5px; width: 300px; border: 2px inset #808080; }
        .search-box input[type="submit"] { font-size: 14px; padding: 5px 20px; background-color: #000080; color: #FFFFFF; border: 2px outset #808080; cursor: pointer; }
        .footer-cell { background-color: #000080; color: #C0C0C0; text-align: center; padding: 10px; font-size: 10px; }
    </style>
</head>
<body>

<table class="main-table" cellpadding="0" cellspacing="0">
    <tr>
        <td class="header-cell">
            <img src="images/hikari_logo.gif" alt="HIKARI DENKI" width="150" height="50"><br>
            <h1>❓ FAQ - よくあるご質問</h1>
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
            <!-- Search Box -->
            <div class="search-box">
                <form method="GET" action="faq.php">
                    <img src="images/search_icon.gif" alt="Search" width="20" height="20">
                    <font size="3"><b>Rechercher dans la FAQ :</b></font><br><br>
                    <input type="text" name="q" value="<?php echo $search_query; ?>">
                    <input type="submit" value="🔍 Rechercher">
                </form>
            </div>

            <?php if ($search_query != ""): ?>
                <p><font color="#808080">
                    Résultats pour "<b><?php echo $search_query; ?></b>" : 
                    <?php echo count($filtered_faqs); ?> résultat(s) trouvé(s)
                </font></p>
            <?php endif; ?>

            <?php
            $current_category = "";
            foreach ($filtered_faqs as $index => $faq):
                if ($faq['category'] != $current_category):
                    $current_category = $faq['category'];
            ?>
                    <div class="faq-category">
                        📁 <?php echo $current_category; ?>
                    </div>
            <?php endif; ?>

                <div class="faq-question" onclick="toggle('answer_<?php echo $index; ?>')">
                    <font color="#000080">Q: <?php echo $faq['question']; ?></font>
                </div>
                <div class="faq-answer" id="answer_<?php echo $index; ?>" style="display:none;">
                    <font color="#333333">A: <?php echo $faq['answer']; ?></font>
                </div>

            <?php endforeach; ?>

            <?php if (count($filtered_faqs) == 0): ?>
                <center>
                    <br><br>
                    <img src="images/sad_face.gif" alt="Not found" width="50">
                    <p><font size="3" color="#FF0000">Aucun résultat trouvé... 見つかりませんでした</font></p>
                    <p>Contactez notre hotline : <b>0 809 10 15 15</b></p>
                    <br><br>
                </center>
            <?php endif; ?>

            <br>
            <center>
                <font size="2" color="#808080">
                    この FAQ で解決しない場合は、お気軽にお問い合わせください。<br>
                    Si vous ne trouvez pas la réponse, n'hésitez pas à <a href="contact.php">nous contacter</a>.
                </font>
            </center>
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

<script language="JavaScript">
<!--
// Toggle FAQ answers - compatible with IE5.5+
function toggle(id) {
    var element = document.getElementById(id);
    if (element.style.display == "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}
//-->
</script>

</body>
</html>
