<?php
require_once("config.php");
$visitor_count = incrementVisitorCount();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>★ ヒカリ光学工業 ★ 光学技術で未来を創る</title>
    <style>
        body {
            background-color: #C0C0C0;
            font-family: 'Comic Sans MS', 'MS Gothic', cursive;
            color: #000080;
            margin: 0;
            background-image: url('images/bg_tile.gif');
        }
        .main-table { width: 780px; margin: 0 auto; background-color: #FFFFFF; border: 3px ridge #808080; }
        .header-cell { background: linear-gradient(to bottom, #000080, #0000CD); color: #FFFF00; text-align: center; padding: 10px; }
        .header-cell h1 { font-size: 28px; text-shadow: 2px 2px #000000; margin: 5px; }
        .nav-bar { background-color: #000080; padding: 5px; text-align: center; }
        .nav-bar a { color: #00FFFF; text-decoration: none; font-weight: bold; padding: 5px 15px; font-size: 14px; }
        .nav-bar a:hover { color: #FFFF00; text-decoration: underline; }
        .content-cell { padding: 15px; font-size: 13px; }
        .sidebar { background-color: #E8E8E8; border-left: 2px groove #808080; padding: 10px; font-size: 12px; vertical-align: top; width: 200px; }
        .sidebar h3 { color: #800000; font-size: 14px; border-bottom: 1px dashed #800000; }
        .section-title { background-color: #000080; color: #FFFFFF; padding: 8px; font-size: 16px; font-weight: bold; margin-top: 20px; }
        .info-table { border: 2px solid #000080; border-collapse: collapse; width: 100%; margin: 10px 0; }
        .info-table td, .info-table th { border: 1px solid #000080; padding: 8px; }
        .info-table th { background-color: #000080; color: #FFFFFF; font-size: 14px; }
        .product-header { background-color: #336699; color: #FFFFFF; padding: 10px; cursor: pointer; font-size: 14px; font-weight: bold; margin: 5px 0 0 0; border: 1px solid #000080; }
        .product-header:hover { background-color: #4477AA; }
        .product-detail { display: none; padding: 10px; border: 1px solid #000080; border-top: none; background-color: #F0F0FF; margin: 0 0 5px 0; font-size: 12px; }
        .counter { background-color: #000000; color: #00FF00; font-family: 'Courier New', monospace; padding: 3px 8px; font-size: 16px; border: 2px inset #808080; display: inline-block; }
        .footer-cell { background-color: #000080; color: #C0C0C0; text-align: center; padding: 10px; font-size: 10px; }
        .footer-cell a { color: #00FFFF; }
        .blink { animation: blink-animation 1s steps(5, start) infinite; }
        @keyframes blink-animation { to { visibility: hidden; } }
        .new-icon { color: #FF0000; font-weight: bold; font-size: 10px; animation: blink-animation 1s steps(5, start) infinite; }
        marquee { color: #FF0000; font-weight: bold; font-size: 16px; }
        hr { border: none; height: 3px; background: url('images/rainbow_hr.gif') repeat-x; }
        .faq-q { font-weight: bold; color: #000080; margin-top: 10px; }
        .faq-a { margin-left: 20px; margin-bottom: 10px; }
    </style>
    <script language="JavaScript">
    <!--
    function toggleProduct(id) {
        var el = document.getElementById(id);
        if (el.style.display == 'block') {
            el.style.display = 'none';
        } else {
            el.style.display = 'block';
        }
    }
    //-->
    </script>
</head>
<body>

<table class="main-table" cellpadding="0" cellspacing="0">
    <!-- ヘッダー -->
    <tr>
        <td colspan="2" class="header-cell">
            <img src="images/hikari_logo.gif" alt="ヒカリ光学工業" width="150" height="50"><br>
            <h1>★ ヒカリ光学工業 ★</h1>
            <font size="2">光学技術で未来を創る — Since 1917</font>
        </td>
    </tr>

    <!-- マーキー -->
    <tr>
        <td colspan="2" style="background-color: #FFFFCC; padding: 5px;">
            <marquee behavior="scroll" direction="left" scrollamount="3">
                ★ ヒカリ光学工業へようこそ！ ★ 最新デジタルカメラ HK-D850 発売中！ ★ 半導体製造装置の新シリーズ発表 ★ 創業100年を超える光学技術の伝統 ★
            </marquee>
        </td>
    </tr>

    <!-- ナビゲーション -->
    <tr>
        <td colspan="2" class="nav-bar">
            <a href="#about">🏢 会社紹介</a> | 
            <a href="#products">📷 製品情報</a> | 
            <a href="#contact">📞 お問い合わせ</a> | 
            <a href="#faq">❓ よくあるご質問</a>
        </td>
    </tr>

    <!-- メインコンテンツ -->
    <tr>
        <td class="content-cell" valign="top">

            <!-- 会社紹介 -->
            <a name="about"></a>
            <div class="section-title">🏢 会社紹介</div>
            <br>
            <center><img src="images/welcome.gif" alt="ようこそ" width="200" height="30"></center>
            <br>
            <p>
                <b>ヒカリ光学工業株式会社</b>は、<font color="#FF0000">1917年</font>に東京で創業した光学機器メーカーです。
                創業以来100年以上にわたり、世界最高水準の光学技術を追求し続けています。
            </p>
            <p>
                光学ガラスの研究からスタートし、カメラ、レンズ、双眼鏡、顕微鏡、測定器、そして半導体製造装置へと
                事業領域を拡大してきました。現在では<b>世界30カ国以上</b>に拠点を持ち、
                <b>約20,000名</b>のグループ社員が活躍しています。
            </p>

            <table class="info-table">
                <tr>
                    <th colspan="2">会社概要</th>
                </tr>
                <tr><td width="35%"><b>社名</b></td><td>ヒカリ光学工業株式会社</td></tr>
                <tr><td><b>創業</b></td><td>1917年（大正6年）</td></tr>
                <tr><td><b>本社所在地</b></td><td>東京都港区</td></tr>
                <tr><td><b>代表取締役社長</b></td><td>山田 太郎</td></tr>
                <tr><td><b>資本金</b></td><td>400億円</td></tr>
                <tr><td><b>連結売上高</b></td><td>約6,000億円（2024年3月期）</td></tr>
                <tr><td><b>従業員数</b></td><td>約20,000名（グループ全体）</td></tr>
                <tr><td><b>事業内容</b></td><td>光学機器、カメラ、半導体製造装置、医療機器の製造・販売</td></tr>
            </table>

            <hr>

            <!-- 製品情報 -->
            <a name="products"></a>
            <div class="section-title">📷 製品情報</div>
            <br>
            <p>各カテゴリをクリックすると詳細が表示されます。</p>

            <!-- カメラ -->
            <div class="product-header" onclick="toggleProduct('cameras')">
                📷 デジタルカメラ HK-D シリーズ <span class="new-icon">NEW!</span>
            </div>
            <div class="product-detail" id="cameras">
                <table width="100%" border="0" cellpadding="5">
                    <tr>
                        <td width="50%">
                            <b>HK-D850</b> — プロフェッショナル一眼レフ<br>
                            <font size="2">
                                ・4575万画素 フルサイズCMOSセンサー<br>
                                ・ISO 64〜25600（拡張: ISO 32〜102400）<br>
                                ・153点AFシステム<br>
                                ・4K UHD動画撮影対応<br>
                                ・ボディ重量: 約1005g<br>
                                <font color="#FF0000"><b>価格: ¥398,000（税込）</b></font>
                            </font>
                        </td>
                        <td width="50%">
                            <b>HK-Z50</b> — ミラーレスカメラ<br>
                            <font size="2">
                                ・2088万画素 APS-C CMOSセンサー<br>
                                ・209点ハイブリッドAF<br>
                                ・ISO 100〜51200<br>
                                ・4K UHD 30p 動画<br>
                                ・ボディ重量: 約395g<br>
                                <font color="#FF0000"><b>価格: ¥148,000（税込）</b></font>
                            </font>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- レンズ・光学機器 -->
            <div class="product-header" onclick="toggleProduct('optics')">
                🔭 レンズ・光学機器
            </div>
            <div class="product-detail" id="optics">
                <b>交換レンズ（Hマウント）</b><br>
                <font size="2">
                    1959年に開発されたHマウントは、60年以上の歴史を持つ伝統のレンズマウントです。<br>
                    現在、70本以上の交換レンズをラインナップしています。
                </font>
                <br><br>
                <table class="info-table">
                    <tr><th>製品名</th><th>焦点距離</th><th>開放F値</th><th>価格</th></tr>
                    <tr><td>HK NIKORA 24-70mm</td><td>24-70mm</td><td>f/2.8</td><td>¥268,000</td></tr>
                    <tr><td>HK NIKORA 70-200mm</td><td>70-200mm</td><td>f/2.8</td><td>¥298,000</td></tr>
                    <tr><td>HK NIKORA 50mm</td><td>50mm</td><td>f/1.4</td><td>¥72,000</td></tr>
                    <tr><td>HK NIKORA 14-24mm</td><td>14-24mm</td><td>f/2.8</td><td>¥248,000</td></tr>
                </table>
                <br>
                <b>双眼鏡・フィールドスコープ</b><br>
                <font size="2">
                    バードウォッチング、天体観測、スポーツ観戦に最適な光学製品を取り揃えています。<br>
                    ・モナーク HG 10x42 — ¥89,800<br>
                    ・プロスタッフ 7S 8x30 — ¥24,800<br>
                    ・フィールドスコープ EDG 85 — ¥298,000
                </font>
            </div>

            <!-- 医療・産業機器 -->
            <div class="product-header" onclick="toggleProduct('medical')">
                🔬 医療・産業機器
            </div>
            <div class="product-detail" id="medical">
                <b>顕微鏡</b><br>
                <font size="2">
                    生物顕微鏡から工業用測定顕微鏡まで、研究・医療・産業のあらゆるニーズに対応します。<br><br>
                    ・ECLIPSE Ei — 教育用生物顕微鏡（¥198,000〜）<br>
                    ・ECLIPSE Ti2 — 倒立型研究用顕微鏡（¥3,500,000〜）<br>
                    ・ECLIPSE LV150N — 工業用金属顕微鏡（¥1,200,000〜）
                </font>
                <br><br>
                <b>測定器</b><br>
                <font size="2">
                    ・iNEXIV VMA-4540 — CNC画像測定システム<br>
                    ・NEXIV VMZ-R3020 — 高精度3D測定<br>
                    ・オートコリメーター 6D — 角度測定器
                </font>
            </div>

            <!-- 半導体製造装置 -->
            <div class="product-header" onclick="toggleProduct('semiconductor')">
                ⚙️ 半導体製造装置
            </div>
            <div class="product-detail" id="semiconductor">
                <font size="2">
                    ヒカリの半導体リソグラフィ装置は、世界中の半導体メーカーで使用されています。<br>
                    ナノメートル単位の精密な回路パターン転写を実現する、最先端のステッパー・スキャナー技術を提供しています。
                </font>
                <br><br>
                <table class="info-table">
                    <tr><th>製品名</th><th>タイプ</th><th>解像力</th><th>用途</th></tr>
                    <tr><td>NSR-S635E</td><td>ArF液浸スキャナー</td><td>38nm</td><td>先端ロジック・メモリ</td></tr>
                    <tr><td>NSR-S322F</td><td>ArFドライスキャナー</td><td>65nm</td><td>汎用半導体</td></tr>
                    <tr><td>NSR-S210D</td><td>KrFスキャナー</td><td>110nm</td><td>パワーデバイス</td></tr>
                </table>
            </div>

            <hr>

            <!-- お問い合わせ -->
            <a name="contact"></a>
            <div class="section-title">📞 お問い合わせ</div>
            <br>
            <table class="info-table">
                <tr><th colspan="2">カスタマーサポート窓口</th></tr>
                <tr>
                    <td width="35%"><b>電話番号</b></td>
                    <td><font size="4" color="#FF0000"><b>0120-XXX-XXX</b></font><br><font size="1">（フリーダイヤル・通話料無料）</font></td>
                </tr>
                <tr>
                    <td><b>受付時間</b></td>
                    <td>月〜金: 9:00〜18:30<br>土: 9:00〜17:30<br><font size="1" color="#FF0000">※ 日曜・祝日: 休業</font></td>
                </tr>
                <tr>
                    <td><b>メール</b></td>
                    <td><a href="mailto:support@hikari-optical.co.jp">support@hikari-optical.co.jp</a></td>
                </tr>
                <tr>
                    <td><b>FAX</b></td>
                    <td>03-XXXX-XXXX</td>
                </tr>
            </table>

            <hr>

            <!-- よくあるご質問 -->
            <a name="faq"></a>
            <div class="section-title">❓ よくあるご質問</div>
            <br>

            <p class="faq-q">Q: ヒカリ光学工業の従業員数はどのくらいですか？</p>
            <p class="faq-a">A: グループ全体で約20,000名が在籍しています。世界30カ国以上の拠点で活躍しています。</p>

            <p class="faq-q">Q: 本社はどこにありますか？</p>
            <p class="faq-a">A: 東京都港区に本社を置いています。主要な製造拠点は栃木県、宮城県、タイ、中国にあります。</p>

            <p class="faq-q">Q: 年間の売上高はどのくらいですか？</p>
            <p class="faq-a">A: 2024年3月期の連結売上高は約6,000億円です。映像事業、精機事業、ヘルスケア事業が主な柱です。</p>

            <p class="faq-q">Q: 最初に作られた製品は何ですか？</p>
            <p class="faq-a">A: 1917年の創業時は光学ガラスの研究・製造から始まりました。その後、1948年に初のカメラ「ヒカリ I 型」を発売しました。</p>

            <p class="faq-q">Q: 宇宙での使用実績はありますか？</p>
            <p class="faq-a">A: はい、NASAのアポロ計画において当社のカメラが採用され、月面撮影に使用されました。現在も国際宇宙ステーション（ISS）で当社製カメラが活躍しています。</p>

            <p class="faq-q">Q: Hマウントとは何ですか？</p>
            <p class="faq-a">A: 1959年に開発された当社独自のレンズマウント規格です。60年以上の互換性を維持しており、最新のミラーレスカメラでもアダプターを通じて使用できます。</p>

        </td>

        <!-- サイドバー -->
        <td class="sidebar">
            <h3>📊 アクセスカウンター</h3>
            <center>
                <font size="1">あなたは</font><br>
                <span class="counter"><?php echo str_pad($visitor_count, 6, "0", STR_PAD_LEFT); ?></span>
                <br><font size="1">番目のお客様です</font>
                <br><br>
                <img src="images/under_construction.gif" alt="工事中" width="100">
                <br><font size="1" color="#FF0000"><b>サイト改善中！</b></font>
            </center>

            <h3>🕐 お問い合わせ受付</h3>
            <font size="2">
                月〜金: 9:00〜18:30<br>
                土: 9:00〜17:30<br>
                日祝: <font color="red">休業</font>
            </font>

            <br><br>
            <center>
                <img src="images/email_anim.gif" alt="メール" width="50"><br>
                <a href="#contact"><font size="2">お問い合わせはこちら！</font></a>
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
            <font size="2"><b>フォローしてね！</b></font><br><br>
            <a href="https://twitter.com/NikonJP">🐦 Twitter</a> &nbsp;|&nbsp;
            <a href="https://www.instagram.com/nikonjp/">📸 Instagram</a> &nbsp;|&nbsp;
            <a href="https://www.youtube.com/@Nikon">🎬 YouTube</a> &nbsp;|&nbsp;
            <a href="https://www.facebook.com/NikonJP/">📘 Facebook</a>
            <br><br>
            <font size="1">
                Copyright &copy; 2005-2006 ヒカリ光学工業株式会社 All Rights Reserved.<br>
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
