<?php
require_once("config.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ヒカリ光学工業 — 光学技術で未来を創る</title>
    <style>
        body {
            background-color: #C0C0C0;
            font-family: 'Comic Sans MS', 'MS Gothic', cursive;
            color: #000080;
            margin: 0;
        }
        .main-table { width: 780px; margin: 0 auto; background-color: #FFFFFF; border: 3px ridge #808080; }
        .header-cell { background: linear-gradient(to bottom, #000080, #0000CD); color: #FFFF00; text-align: center; padding: 15px; }
        .header-cell h1 { font-size: 28px; text-shadow: 2px 2px #000000; margin: 5px; }
        .nav-bar { background-color: #000080; padding: 8px; text-align: center; }
        .nav-bar a { color: #00FFFF; text-decoration: none; font-weight: bold; padding: 5px 20px; font-size: 14px; }
        .nav-bar a:hover { color: #FFFF00; text-decoration: underline; }
        .content { padding: 20px; font-size: 13px; }
        .section-title { background-color: #000080; color: #FFFFFF; padding: 8px 12px; font-size: 16px; font-weight: bold; margin-top: 25px; }
        .info-table { border: 2px solid #000080; border-collapse: collapse; width: 100%; margin: 10px 0; }
        .info-table td, .info-table th { border: 1px solid #000080; padding: 8px; }
        .info-table th { background-color: #000080; color: #FFFFFF; }
        .product-header { background-color: #336699; color: #FFFFFF; padding: 10px; cursor: pointer; font-size: 14px; font-weight: bold; margin: 5px 0 0 0; border: 1px solid #000080; }
        .product-header:hover { background-color: #4477AA; }
        .product-detail { display: none; padding: 15px; border: 1px solid #000080; border-top: none; background-color: #F0F0FF; font-size: 12px; }
        .footer-cell { background-color: #000080; color: #C0C0C0; text-align: center; padding: 15px; font-size: 11px; }
        .footer-cell a { color: #00FFFF; }
        .faq-q { font-weight: bold; color: #000080; margin-top: 12px; }
        .faq-a { margin-left: 20px; margin-bottom: 10px; color: #333; }
        hr { border: none; height: 1px; background-color: #000080; margin: 20px 0; }
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
    <tr>
        <td class="header-cell">
            <h1>ヒカリ光学工業</h1>
            <font size="3">光学技術で未来を創る — Since 1917</font>
        </td>
    </tr>

    <tr>
        <td class="nav-bar">
            <a href="#about">会社紹介</a> | 
            <a href="#products">製品情報</a> | 
            <a href="#contact">お問い合わせ</a> | 
            <a href="#faq">よくあるご質問</a>
        </td>
    </tr>

    <tr>
        <td class="content">

            <!-- 会社紹介 -->
            <a name="about"></a>
            <div class="section-title">会社紹介</div>
            <p>
                <b>ヒカリ光学工業株式会社</b>は、<font color="#FF0000">1917年</font>に東京で創業した光学機器メーカーです。
                創業以来100年以上にわたり、世界最高水準の光学技術を追求し続けています。
            </p>
            <p>
                光学ガラスの研究からスタートし、カメラ、レンズ、双眼鏡、顕微鏡、測定器、そして半導体製造装置へと
                事業領域を拡大。現在では<b>世界30カ国以上</b>に拠点を持ち、<b>約20,000名</b>の社員が活躍しています。
            </p>

            <table class="info-table">
                <tr><th colspan="2">会社概要</th></tr>
                <tr><td width="35%"><b>社名</b></td><td>ヒカリ光学工業株式会社</td></tr>
                <tr><td><b>創業</b></td><td>1917年（大正6年）</td></tr>
                <tr><td><b>本社</b></td><td>東京都港区</td></tr>
                <tr><td><b>売上高</b></td><td>約6,000億円（2024年3月期）</td></tr>
                <tr><td><b>従業員数</b></td><td>約20,000名（グループ全体）</td></tr>
            </table>

            <hr>

            <!-- 製品情報 -->
            <a name="products"></a>
            <div class="section-title">製品情報</div>
            <p>各カテゴリをクリックすると詳細が表示されます。</p>

            <div class="product-header" onclick="toggleProduct('cameras')">
                📷 デジタルカメラ HK-D シリーズ
            </div>
            <div class="product-detail" id="cameras">
                <table width="100%" border="0" cellpadding="5">
                    <tr>
                        <td width="50%" valign="top">
                            <b>HK-D850</b> — プロフェッショナル一眼レフ<br>
                            <font size="2">
                                ・4575万画素フルサイズセンサー<br>
                                ・153点AFシステム<br>
                                ・4K動画対応<br>
                                <font color="#FF0000"><b>¥398,000（税込）</b></font>
                            </font>
                        </td>
                        <td width="50%" valign="top">
                            <b>HK-Z50</b> — ミラーレスカメラ<br>
                            <font size="2">
                                ・2088万画素APS-Cセンサー<br>
                                ・209点ハイブリッドAF<br>
                                ・軽量395g<br>
                                <font color="#FF0000"><b>¥148,000（税込）</b></font>
                            </font>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="product-header" onclick="toggleProduct('optics')">
                🔭 レンズ・光学機器
            </div>
            <div class="product-detail" id="optics">
                <table class="info-table">
                    <tr><th>製品名</th><th>焦点距離</th><th>F値</th><th>価格</th></tr>
                    <tr><td>HK NIKORA 24-70mm</td><td>24-70mm</td><td>f/2.8</td><td>¥268,000</td></tr>
                    <tr><td>HK NIKORA 70-200mm</td><td>70-200mm</td><td>f/2.8</td><td>¥298,000</td></tr>
                    <tr><td>HK NIKORA 50mm</td><td>50mm</td><td>f/1.4</td><td>¥72,000</td></tr>
                </table>
            </div>

            <div class="product-header" onclick="toggleProduct('medical')">
                🔬 医療・産業機器
            </div>
            <div class="product-detail" id="medical">
                <font size="2">
                    ・ECLIPSE Ei — 教育用生物顕微鏡（¥198,000〜）<br>
                    ・ECLIPSE Ti2 — 研究用顕微鏡（¥3,500,000〜）<br>
                    ・iNEXIV VMA-4540 — CNC画像測定システム
                </font>
            </div>

            <div class="product-header" onclick="toggleProduct('semiconductor')">
                ⚙️ 半導体製造装置
            </div>
            <div class="product-detail" id="semiconductor">
                <table class="info-table">
                    <tr><th>製品名</th><th>タイプ</th><th>解像力</th></tr>
                    <tr><td>NSR-S635E</td><td>ArF液浸スキャナー</td><td>38nm</td></tr>
                    <tr><td>NSR-S322F</td><td>ArFドライスキャナー</td><td>65nm</td></tr>
                </table>
            </div>

            <hr>

            <!-- お問い合わせ -->
            <a name="contact"></a>
            <div class="section-title">お問い合わせ</div>
            <table class="info-table">
                <tr><th colspan="2">カスタマーサポート窓口</th></tr>
                <tr><td width="35%"><b>電話番号</b></td><td><font size="4" color="#FF0000"><b>0120-XXX-XXX</b></font></td></tr>
                <tr><td><b>受付時間</b></td><td>月〜金: 9:00〜18:30 / 土: 9:00〜17:30</td></tr>
                <tr><td><b>メール</b></td><td><a href="mailto:support@hikari-optical.co.jp">support@hikari-optical.co.jp</a></td></tr>
            </table>

            <hr>

            <!-- FAQ -->
            <a name="faq"></a>
            <div class="section-title">よくあるご質問</div>

            <p class="faq-q">Q: 従業員数はどのくらいですか？</p>
            <p class="faq-a">A: グループ全体で約20,000名です。世界30カ国以上で活躍しています。</p>

            <p class="faq-q">Q: 最初に作られた製品は何ですか？</p>
            <p class="faq-a">A: 1917年に光学ガラスの研究から始まり、1948年に初のカメラ「ヒカリ I 型」を発売しました。</p>

            <p class="faq-q">Q: 宇宙での使用実績はありますか？</p>
            <p class="faq-a">A: はい。NASAのアポロ計画で当社のカメラが月面撮影に使用されました。</p>

            <p class="faq-q">Q: Hマウントとは何ですか？</p>
            <p class="faq-a">A: 1959年開発の当社独自レンズマウント。60年以上の互換性を維持しています。</p>

        </td>
    </tr>

    <tr>
        <td class="footer-cell">
            <a href="https://twitter.com/NikonJP">Twitter</a> &nbsp;|&nbsp;
            <a href="https://www.instagram.com/nikonjp/">Instagram</a> &nbsp;|&nbsp;
            <a href="https://www.youtube.com/@Nikon">YouTube</a>
            <br><br>
            <font size="1">
                Copyright &copy; 2005 ヒカリ光学工業株式会社<br>
                Best viewed with Internet Explorer 6.0
            </font>
        </td>
    </tr>
</table>

</body>
</html>
