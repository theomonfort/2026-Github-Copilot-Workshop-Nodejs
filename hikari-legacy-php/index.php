<?php
// ヒカリ カスタマーサポート - トップページ
// Copyright (C) 2005 ヒカリ株式会社
// 管理者: webmaster@hikari.co.jp

require_once("config.php");
$visitor_count = incrementVisitorCount();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>★ ヒカリ カスタマーサポート ★ ようこそ！</title>
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
    <!-- ヘッダー -->
    <tr>
        <td colspan="2" class="header-cell">
            <img src="images/hikari_logo.gif" alt="ヒカリ" width="150" height="50"><br>
            <h1>★ カスタマーサポート ★</h1>
            <font size="2">ヒカリ株式会社 サポートポータル</font>
        </td>
    </tr>

    <!-- マーキー -->
    <tr>
        <td colspan="2" style="background-color: #FFFFCC; padding: 5px;">
            <marquee behavior="scroll" direction="left" scrollamount="3">
                ★ ヒカリカスタマーサポートポータルへようこそ！ ★ 経験豊富な技術者が月曜〜金曜で対応いたします ★ 
                新製品情報はこちら ★ 新着：空気清浄機 IonPure シリーズのサポート開始！ ★ デジタルカメラ HK-D500 好評発売中！ ★
            </marquee>
        </td>
    </tr>

    <!-- ナビゲーション -->
    <tr>
        <td colspan="2" class="nav-bar">
            <a href="index.php">🏠 ホーム</a> | 
            <a href="faq.php">❓ よくあるご質問</a> | 
            <a href="contact.php">✉️ お問い合わせ</a> | 
            <a href="pieces.php">🔧 部品カタログ</a> |
            <a href="garantie.php">📋 保証について</a>
        </td>
    </tr>

    <!-- メインコンテンツ -->
    <tr>
        <!-- コンテンツエリア -->
        <td class="content-cell" valign="top">
            
            <center>
                <img src="images/welcome.gif" alt="ようこそ" width="200" height="30">
            </center>

            <hr>

            <h2><font color="#000080">📞 お問い合わせ</font></h2>

            <table class="info-table">
                <tr>
                    <th colspan="2">カスタマーサポート窓口</th>
                </tr>
                <tr>
                    <td width="40%"><b>電話番号：</b></td>
                    <td>
                        <font size="4" color="#FF0000"><b>0120-XXX-XXX</b></font>
                        <br><font size="1">（フリーダイヤル・通話料無料）</font>
                    </td>
                </tr>
                <tr>
                    <td><b>受付時間：</b></td>
                    <td>
                        月〜金：9:00〜18:30<br>
                        土：9:00〜17:30<br>
                        <font size="1" color="#FF0000">※ 日曜・祝日：休業</font>
                    </td>
                </tr>
                <tr>
                    <td><b>メール：</b></td>
                    <td>
                        <a href="mailto:support@hikari.co.jp">support@hikari.co.jp</a>
                    </td>
                </tr>
                <tr>
                    <td><b>FAX：</b></td>
                    <td>03-XXXX-XXXX</td>
                </tr>
            </table>

            <br>

            <h2><font color="#000080">📋 サービス一覧</font></h2>
            <ul>
                <li>📷 デジタルカメラ・レンズの修理 <span class="new-icon">NEW!</span></li>
                <li>📺 液晶テレビ LUMINA シリーズの修理</li>
                <li>🌬️ 空気清浄機 IonPure のメンテナンス</li>
                <li>🍳 電子レンジ・オーブンの修理</li>
                <li>🖨️ コピー機・プリンターのサービス</li>
                <li>🚗 自動車用センサー・車載機器のサポート <span class="new-icon">NEW!</span></li>
                <li>🔬 医療機器のメンテナンス</li>
                <li>⚙️ 半導体製造装置のサービス</li>
                <li>🔧 全製品の部品販売・交換</li>
            </ul>

            <hr>

            <h2><font color="#000080">📢 お知らせ</font></h2>
            <table width="100%" border="0" cellpadding="3">
                <tr>
                    <td width="100"><font size="2" color="#808080">2006/03/15</font></td>
                    <td><a href="#">エクスプレス修理サービス開始のお知らせ</a> <span class="new-icon">NEW!</span></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2006/02/28</font></td>
                    <td><a href="#">部品カタログを更新しました</a></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2006/02/01</font></td>
                    <td><a href="#">デジタルカメラ HK-D500 サポート開始</a> <span class="new-icon">NEW!</span></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2006/01/10</font></td>
                    <td><a href="#">年末年始の営業時間のお知らせ</a></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2005/11/20</font></td>
                    <td><a href="#">IonPure シリーズのサポート開始</a></td>
                </tr>
                <tr>
                    <td><font size="2" color="#808080">2005/09/01</font></td>
                    <td><a href="#">車載機器サポート窓口を新設しました</a></td>
                </tr>
            </table>

        </td>

        <!-- サイドバー -->
        <td class="sidebar">
            <h3>🔗 関連リンク</h3>
            <ul style="padding-left: 15px;">
                <li><a href="http://www.hikari.co.jp">ヒカリ Japan</a></li>
                <li><a href="#">製品マニュアル</a></li>
                <li><a href="#">製品登録</a></li>
                <li><a href="#">ドライバダウンロード</a></li>
            </ul>

            <h3>📊 アクセスカウンター</h3>
            <center>
                <font size="1">あなたは</font><br>
                <span class="counter"><?php echo str_pad($visitor_count, 6, "0", STR_PAD_LEFT); ?></span>
                <br><font size="1">番目のお客様です</font>
                <br><br>
                <img src="images/under_construction.gif" alt="工事中" width="100">
                <br>
                <font size="1" color="#FF0000">
                    <b>サイト改善中！</b>
                </font>
            </center>

            <h3>🕐 サポート受付時間</h3>
            <font size="2">
                月〜金: 9:00〜18:30<br>
                土: 9:00〜17:30<br>
                日祝: <font color="red">休業</font>
            </font>

            <br><br>
            <center>
                <img src="images/email_anim.gif" alt="メール" width="50">
                <br>
                <a href="contact.php"><font size="2">お問い合わせはこちら！</font></a>
            </center>

            <br>
            <center>
                <font size="1" color="#808080">
                    最終更新日:<br>
                    <?php echo japanese_date(time()); ?>
                </font>
            </center>
        </td>
    </tr>

    <!-- フッター -->
    <tr>
        <td colspan="2" class="footer-cell">
            <font size="1">
                Copyright &copy; 2005-2006 ヒカリ株式会社 All Rights Reserved.<br>
                このサイトはヒカリ株式会社が運営しています。<br>
                Best viewed with Internet Explorer 6.0 | 推奨解像度: 800x600<br>
                <img src="images/ie_logo.gif" alt="IE推奨" width="80" height="15">
                <img src="images/netscape_logo.gif" alt="Netscape対応" width="80" height="15">
            </font>
        </td>
    </tr>
</table>

<br>

</body>
</html>
