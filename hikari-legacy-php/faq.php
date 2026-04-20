<?php
// ヒカリ電機 カスタマーサポート - よくあるご質問
// 警告: 変更禁止 — 最終動作確認済みバージョン 鈴木 2005/08/12
// TODO: いつかデータベース化する…

require_once("config.php");

// FAQデータ — データベース移行が結局実現しなかったためハードコード
$faqs = array(
    array(
        "category" => "📷 デジタルカメラ",
        "question" => "デジタルカメラ HK-D500 のピントが合わないのですが？",
        "answer" => "オートフォーカスモードが正しく設定されているかご確認ください。AF/MF切替スイッチがAF側になっているか確認し、レンズの接点を柔らかい布で清掃してください。それでも改善しない場合は、0120-XXX-XXX（フリーダイヤル）までお電話ください。"
    ),
    array(
        "category" => "📷 デジタルカメラ",
        "question" => "交換レンズの互換性を教えてください",
        "answer" => "ヒカリ電機 Hマウント対応レンズはすべてのHK-Dシリーズボディに装着可能です。他社製レンズをご使用の場合はマウントアダプターが必要です。対応アダプター一覧は製品マニュアルをご参照ください。"
    ),
    array(
        "category" => "📷 デジタルカメラ",
        "question" => "バッテリーの持ちが悪くなりました",
        "answer" => "充電式バッテリーは約500回の充放電で性能が低下します。交換用バッテリーパック（型番: BATT-HKD500）を部品カタログからご注文いただけます。純正バッテリーのご使用を推奨します。"
    ),
    array(
        "category" => "📺 液晶テレビ",
        "question" => "テレビ LUMINA の電源が入りません。どうすればいいですか？",
        "answer" => "まず電源ケーブルが正しく接続されているかご確認ください。テレビのコンセントを抜いて30秒待ってから、再度接続してみてください。それでも改善しない場合は、0120-XXX-XXX（フリーダイヤル）までお電話ください。"
    ),
    array(
        "category" => "📺 液晶テレビ",
        "question" => "LUMINA の解像度の変更方法を教えてください",
        "answer" => "リモコンのMENUボタンを押して、設定 ＞ 表示 ＞ 解像度 の順に選択してください。お使いのモデルに推奨の解像度を選択してください（LM-32/40/46 モデルは1080p推奨）。"
    ),
    array(
        "category" => "📺 液晶テレビ",
        "question" => "LUMINA に「信号なし」と表示されます",
        "answer" => "HDMIケーブルが正しく接続されているかご確認ください。リモコンの入力切替ボタン（INPUT）で正しい入力ソースが選択されていることをご確認ください。可能であれば別のケーブルでもお試しください。"
    ),
    array(
        "category" => "🌬️ 空気清浄機",
        "question" => "IonPure のフィルター交換時期はいつですか？",
        "answer" => "HEPAフィルターは通常使用（1日約8時間）で約2年ごとに交換が必要です。脱臭フィルターは水洗いして最大5回まで再利用できます。交換用フィルターの型番: FZ-Y30SFE"
    ),
    array(
        "category" => "🌬️ 空気清浄機",
        "question" => "空気清浄機から異音がします",
        "answer" => "異音はフィルターの目詰まりが原因の可能性があります。フィルターを取り外して清掃してください。それでも異音が続く場合は、吸気口に障害物がないかご確認ください。問題が解消しない場合はカスタマーサポートにご連絡ください。"
    ),
    array(
        "category" => "🍳 電子レンジ",
        "question" => "ヒカリ電機の電子レンジが温まりません",
        "answer" => "【警告】電子レンジをご自身で修理しようとしないでください！コンデンサーには致死量の電荷が蓄積されている場合があります。直ちに 0120-XXX-XXX（フリーダイヤル）までご連絡ください。"
    ),
    array(
        "category" => "🍳 電子レンジ",
        "question" => "電子レンジのターンテーブルが回転しません",
        "answer" => "ターンテーブルが回転ガイドの上に正しくセットされているかご確認ください。ガイドと回転リングを清掃してください。交換部品（ターンテーブル＋回転リング）は部品カタログからご注文いただけます。"
    ),
    array(
        "category" => "🖨️ コピー機",
        "question" => "ヒカリ電機のコピー機で紙詰まりが頻発します",
        "answer" => "1) 用紙トレイからすべての用紙を取り出してください。2) 用紙の切れ端が詰まっていないか確認してください。3) 用紙をセットする前によくさばいてください。4) 用紙の坪量が適切か確認してください（60〜90g/m²）。5) 給紙ローラーを湿らせた布で清掃してください。"
    ),
    array(
        "category" => "🚗 車載機器",
        "question" => "ドライブレコーダー DR-100 の映像が記録されません",
        "answer" => "SDカードが正しく挿入されているか、容量に空きがあるかご確認ください。SDカードのフォーマット（FAT32）が必要な場合があります。本体設定メニューから「SDカードフォーマット」を実行してください。推奨: Class10 以上のSDHCカード（最大32GB）。"
    ),
    array(
        "category" => "🚗 車載機器",
        "question" => "駐車センサーが反応しなくなりました",
        "answer" => "センサー表面に泥や雪が付着していないかご確認ください。柔らかい布で清掃してから動作確認してください。配線の緩みも考えられますので、改善しない場合はお近くのヒカリ電機サービスセンターへご相談ください。保証期間は3年です。"
    ),
    array(
        "category" => "🔬 医療機器",
        "question" => "内視鏡の光源ユニットの交換サイクルはどのくらいですか？",
        "answer" => "光源ランプの寿命は約500時間です。交換はヒカリ電機認定サービスエンジニアが行います。保守契約をご利用のお客様は、定期メンテナンス時に交換いたします。詳細は医療機器サポート専用窓口（03-XXXX-XXXX）までお問い合わせください。"
    ),
    array(
        "category" => "🔬 医療機器",
        "question" => "顕微鏡のレンズにカビが生えてしまいました",
        "answer" => "レンズのカビ除去は専門技術が必要です。ご自身での分解・清掃はお控えください。ヒカリ電機サービスセンターにお持ち込みいただくか、出張修理をご依頼ください。保管時は防湿庫での保管を推奨します。"
    ),
    array(
        "category" => "⚙️ 一般",
        "question" => "ヒカリ電機製品の型番はどこで確認できますか？",
        "answer" => "製品の型番は本体の背面または底面のラベルに記載されています。型番は通常、アルファベット2〜3文字＋数字の組み合わせです（例: LM-32X600, IP-Y30, HK-D500, R-642BK, DR-100）。"
    ),
    array(
        "category" => "⚙️ 一般",
        "question" => "保証期間はまだ有効ですか？",
        "answer" => "ヒカリ電機の標準保証は、ご購入日から製品により1〜3年です。ご購入時のレシートまたは領収書をご用意の上、お問い合わせください。消耗品（フィルター、ランプ等）の保証期間は6ヶ月です。保証確認ページからシリアル番号で確認することもできます。"
    )
);

// 検索機能 — 単純な文字列マッチング
$search_query = "";
$filtered_faqs = $faqs;
if (isset($_GET['q']) && $_GET['q'] != "") {
    $search_query = $_GET['q'];
    $filtered_faqs = array();
    foreach ($faqs as $faq) {
        // 単純検索 — サニタイズは不要…だよね？ただの検索だし…
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
    <title>ヒカリ電機 カスタマーサポート - よくあるご質問（FAQ）</title>
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
            <img src="images/hikari_logo.gif" alt="ヒカリ電機" width="150" height="50"><br>
            <h1>❓ よくあるご質問（FAQ）</h1>
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
            <!-- 検索ボックス -->
            <div class="search-box">
                <form method="GET" action="faq.php">
                    <img src="images/search_icon.gif" alt="検索" width="20" height="20">
                    <font size="3"><b>FAQを検索：</b></font><br><br>
                    <input type="text" name="q" value="<?php echo $search_query; ?>" placeholder="キーワードを入力...">
                    <input type="submit" value="🔍 検索">
                </form>
            </div>

            <?php if ($search_query != ""): ?>
                <p><font color="#808080">
                    「<b><?php echo $search_query; ?></b>」の検索結果: 
                    <?php echo count($filtered_faqs); ?>件
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
                    <img src="images/sad_face.gif" alt="見つかりません" width="50">
                    <p><font size="3" color="#FF0000">該当する質問が見つかりませんでした</font></p>
                    <p>カスタマーサポートにお電話ください: <b>0120-XXX-XXX</b>（フリーダイヤル）</p>
                    <br><br>
                </center>
            <?php endif; ?>

            <br>
            <center>
                <font size="2" color="#808080">
                    このFAQで解決しない場合は、お気軽に<a href="contact.php">お問い合わせ</a>ください。
                </font>
            </center>
        </td>
    </tr>
    <tr>
        <td class="footer-cell">
            <font size="1">
                Copyright &copy; 2005-2006 ヒカリ電機株式会社 All Rights Reserved.<br>
                Best viewed with Internet Explorer 6.0 | 推奨解像度: 800x600
            </font>
        </td>
    </tr>
</table>

<script language="JavaScript">
<!--
// FAQ回答の表示・非表示切替 — IE5.5以上で動作確認済み
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
