<?php
// Hikari Denki SAV - Page d'accueil
// Copyright (C) 2005 Hikari Denki Corporation
// Maintainer: webmaster@hikari-denki.co.jp

require_once("config.php");
$visitor_count = incrementVisitorCount();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>★ HIKARI DENKI SAV - Service Après-Vente ★ Bienvenue!</title>
    <style>
        body {
            background-color: #C0C0C0;
            font-family: 'Comic Sans MS', 'MS Gothic', cursive;
            color: #000080;
            margin: 0;
            background-image: url('images/bg_tile.gif');
        }
        .main-table {
            width: 780px;
            margin: 0 auto;
            background-color: #FFFFFF;
            border: 3px ridge #808080;
        }
        .header-cell {
            background: linear-gradient(to bottom, #000080, #0000CD);
            color: #FFFF00;
            text-align: center;
            padding: 10px;
        }
        .header-cell h1 {
            font-size: 28px;
            text-shadow: 2px 2px #000000;
            margin: 5px;
        }
        .nav-bar {
            background-color: #000080;
            padding: 5px;
            text-align: center;
        }
        .nav-bar a {
            color: #00FFFF;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 15px;
            font-size: 14px;
        }
        .nav-bar a:hover {
            color: #FFFF00;
            text-decoration: underline;
        }
        .content-cell {
            padding: 15px;
            font-size: 13px;
        }
        .info-table {
            border: 2px solid #000080;
            border-collapse: collapse;
            width: 100%;
            margin: 10px 0;
        }
        .info-table td, .info-table th {
            border: 1px solid #000080;
            padding: 8px;
        }
        .info-table th {
            background-color: #000080;
            color: #FFFFFF;
            font-size: 14px;
        }
        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
        }
        @keyframes blink-animation {
            to { visibility: hidden; }
        }
        .footer-cell {
            background-color: #000080;
            color: #C0C0C0;
            text-align: center;
            padding: 10px;
            font-size: 10px;
        }
        .sidebar {
            background-color: #E8E8E8;
            border-left: 2px groove #808080;
            padding: 10px;
            font-size: 12px;
            vertical-align: top;
            width: 200px;
        }
        .sidebar h3 {
            color: #800000;
            font-size: 14px;
            border-bottom: 1px dashed #800000;
        }
        .counter {
            background-color: #000000;
            color: #00FF00;
            font-family: 'Courier New', monospace;
            padding: 3px 8px;
            font-size: 16px;
            border: 2px inset #808080;
            display: inline-block;
        }
        marquee {
            color: #FF0000;
            font-weight: bold;
            font-size: 16px;
        }
        hr {
            border: none;
            height: 3px;
            background: url('images/rainbow_hr.gif') repeat-x;
        }
        .new-icon {
            color: #FF0000;
            font-weight: bold;
            font-size: 10px;
            animation: blink-animation 1s steps(5, start) infinite;
        }
    </style>
</head>
<body>

<table class="main-table" cellpadding="0" cellspacing="0">
    <!-- Header -->
    <tr>
        <td colspan="2" class="header-cell">
            <img src="images/hikari_logo.gif" alt="HIKARI DENKI" width="150" height="50"><br>
            <h1>★ Service Après-Vente ★</h1>
            <font size="2">ヒカリ電機 アフターサービス</font>
        </td>
    </tr>

    <!-- Marquee -->
    <tr>
        <td colspan="2" style="background-color: #FFFFCC; padding: 5px;">
            <marquee behavior="scroll" direction="left" scrollamount="3">
                ★ Bienvenue sur le portail SAV Hikari Denki ! ★ Nos techniciens sont à votre service du lundi au vendredi ★ 
                新製品情報はこちら ★ Nouveau: Support pour les purificateurs d'air IonPure ! ★
            </marquee>
        </td>
    </tr>

    <!-- Navigation -->
    <tr>
        <td colspan="2" class="nav-bar">
            <a href="index.php">🏠 Accueil</a> | 
            <a href="faq.php">❓ FAQ</a> | 
            <a href="contact.php">✉️ Contact</a> | 
            <a href="pieces.php">🔧 Pièces détachées</a> |
            <a href="garantie.php">📋 Garantie</a>
        </td>
    </tr>

    <!-- Main content -->
    <tr>
        <!-- Content area -->
        <td class="content-cell" valign="top">
            
            <center>
                <img src="images/welcome.gif" alt="Bienvenue" width="200" height="30">
            </center>

            <hr>

            <h2><font color="#000080">📞 Nous contacter</font></h2>

            <table class="info-table">
                <tr>
                    <th colspan="2">Hotline Consommateurs</th>
                </tr>
                <tr>
                    <td width="40%"><b>Téléphone :</b></td>
                    <td>
                        <font size="4" color="#FF0000"><b>0 809 10 15 15</b></font>
                        <br><font size="1">(appel non surtaxé)</font>
                    </td>
                </tr>
                <tr>
                    <td><b>Horaires :</b></td>
                    <td>
                        Lundi - Vendredi : 9h00 〜 18h30<br>
                        Samedi : 9h00 〜 17h30<br>
                        <font size="1" color="#FF0000">※ Fermé les dimanches et jours fériés</font>
                    </td>
                </tr>
                <tr>
                    <td><b>E-mail :</b></td>
                    <td>
                        <a href="mailto:helpdesk@hikari-denki.co.jp">helpdesk@hikari-denki.co.jp</a>
                    </td>
                </tr>
                <tr>
                    <td><b>Fax :</b></td>
                    <td>03-XXXX-XXXX</td>
                </tr>
            </table>

            <br>

            <h2><font color="#000080">📋 Nos Services</font></h2>
            <ul>
                <li>Réparation de téléviseurs LCD LUMINA</li>
                <li>Entretien des purificateurs d'air IonPure <span class="new-icon">NEW!</span></li>
                <li>Réparation de micro-ondes et fours</li>
                <li>Service pour imprimantes et copieurs</li>
                <li>Pièces détachées pour tous modèles</li>
            </ul>

            <hr>

            <h2><font color="#000080">📢 Actualités</font></h2>
            <table width="100%" border="0" cellpadding="3">
                <tr>
                    <td width="100"><font size="2" color="#808080">2006/03/15</font></td>
                    <td><a href="#">Nouveau service de réparation express</a> <span class="new-icon">NEW!</span></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2006/02/28</font></td>
                    <td><a href="#">Mise à jour du catalogue de pièces détachées</a></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2006/01/10</font></td>
                    <td><a href="#">Horaires spéciaux pour les fêtes de fin d'année</a></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2005/11/20</font></td>
                    <td><a href="#">Lancement du support IonPure</a></td>
                </tr>
            </table>

        </td>

        <!-- Sidebar -->
        <td class="sidebar">
            <h3>🔗 Liens utiles</h3>
            <ul style="padding-left: 15px;">
                <li><a href="http://www.hikari-denki.co.jp">Hikari Denki Japan</a></li>
                <li><a href="http://www.hikari-denki.eu">Hikari Denki Europe</a></li>
                <li><a href="#">Manuel utilisateur</a></li>
                <li><a href="#">Enregistrer produit</a></li>
            </ul>

            <h3>📊 Compteur</h3>
            <center>
                <font size="1">Vous êtes le visiteur n°</font><br>
                <span class="counter"><?php echo str_pad($visitor_count, 6, "0", STR_PAD_LEFT); ?></span>
                <br><br>
                <img src="images/under_construction.gif" alt="En construction" width="100">
                <br>
                <font size="1" color="#FF0000">
                    <b>Site en amélioration<br>permanente!</b>
                </font>
            </center>

            <h3>🕐 Horaires SAV</h3>
            <font size="2">
                Lun-Ven: 9h-18h30<br>
                Sam: 9h-17h30<br>
                Dim: <font color="red">Fermé</font>
            </font>

            <br><br>
            <center>
                <img src="images/email_anim.gif" alt="Email" width="50">
                <br>
                <a href="contact.php"><font size="2">Contactez-nous!</font></a>
            </center>

            <br>
            <center>
                <font size="1" color="#808080">
                    Dernière mise à jour:<br>
                    <?php echo japanese_date(time()); ?>
                </font>
            </center>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td colspan="2" class="footer-cell">
            <font size="1">
                Copyright &copy; 2005-2006 Hikari Denki Corporation. All Rights Reserved.<br>
                このサイトはヒカリ電機株式会社が運営しています。<br>
                Best viewed with Internet Explorer 6.0 | Resolution: 800x600<br>
                <img src="images/ie_logo.gif" alt="Best with IE" width="80" height="15">
                <img src="images/netscape_logo.gif" alt="Netscape OK" width="80" height="15">
            </font>
        </td>
    </tr>
</table>

<br>

</body>
</html>
