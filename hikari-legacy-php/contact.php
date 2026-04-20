<?php
// ヒカリ カスタマーサポート - お問い合わせフォーム

require_once("config.php");

$message_sent = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // フォーム送信のデモ（実際にはメール送信しない）
    $message_sent = true;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ヒカリ カスタマーサポート - お問い合わせ</title>
    <style>
        body { background-color: #C0C0C0; font-family: 'Comic Sans MS', cursive; color: #000080; background-image: url('images/bg_tile.gif'); }
        .main-table { width: 780px; margin: 0 auto; background-color: #FFFFFF; border: 3px ridge #808080; }
        .header-cell { background: linear-gradient(to bottom, #000080, #0000CD); color: #FFFF00; text-align: center; padding: 10px; }
        .nav-bar { background-color: #000080; padding: 5px; text-align: center; }
        .nav-bar a { color: #00FFFF; text-decoration: none; font-weight: bold; padding: 5px 15px; font-size: 14px; }
        .nav-bar a:hover { color: #FFFF00; }
        .content-cell { padding: 15px; font-size: 13px; }
        .form-table { width: 100%; border-collapse: collapse; }
        .form-table td { padding: 8px; }
        .form-label { font-weight: bold; width: 150px; text-align: right; vertical-align: top; }
        .form-input input, .form-input textarea, .form-input select { 
            font-family: 'MS Gothic', monospace; font-size: 14px; border: 2px inset #808080; padding: 3px;
        }
        .submit-btn { background-color: #000080; color: #FFFFFF; font-size: 16px; padding: 8px 30px; border: 2px outset #808080; cursor: pointer; font-weight: bold; }
        .submit-btn:hover { background-color: #0000CD; }
        .required { color: #FF0000; font-size: 10px; }
        .success-msg { background-color: #90EE90; border: 2px solid #006400; padding: 15px; text-align: center; margin: 20px; }
        .error-msg { background-color: #FFB6C1; border: 2px solid #8B0000; padding: 15px; text-align: center; margin: 20px; }
        .footer-cell { background-color: #000080; color: #C0C0C0; text-align: center; padding: 10px; font-size: 10px; }
    </style>
</head>
<body>

<table class="main-table" cellpadding="0" cellspacing="0">
    <tr>
        <td class="header-cell">
            <img src="images/hikari_logo.gif" alt="ヒカリ" width="150" height="50"><br>
            <h1>✉️ お問い合わせ</h1>
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

            <?php if ($message_sent): ?>
                <div class="success-msg">
                    <img src="images/check.gif" alt="OK" width="30"><br>
                    <font size="4" color="#006400"><b>メッセージが正常に送信されました。</b></font><br>
                    2営業日以内にご返信いたします。<br><br>
                    <a href="index.php">ホームに戻る</a>
                </div>
            <?php endif; ?>

            <center>
                <img src="images/email_anim.gif" alt="お問い合わせ" width="60"><br>
                <font size="2">以下のフォームにご記入ください。担当者より迅速にご回答いたします。</font>
            </center>

            <br>

            <form method="POST" action="contact.php" name="contactForm" onsubmit="return validateForm()">
                <table class="form-table">
                    <tr>
                        <td class="form-label">お名前 <span class="required">※必須</span></td>
                        <td class="form-input">
                            <input type="text" name="name" size="40" maxlength="100">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">メールアドレス <span class="required">※必須</span></td>
                        <td class="form-input">
                            <input type="text" name="email" size="40" maxlength="100">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">電話番号</td>
                        <td class="form-input">
                            <input type="text" name="phone" size="20" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">製品型番</td>
                        <td class="form-input">
                            <input type="text" name="product_ref" size="30" maxlength="50">
                            <br><font size="1" color="#808080">例: LM-32X600, IP-Y30, HK-D500, DR-100</font>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">お問い合わせ種別 <span class="required">※必須</span></td>
                        <td class="form-input">
                            <select name="subject">
                                <option value="">-- 選択してください --</option>
                                <option value="repair">修理依頼</option>
                                <option value="parts">部品注文</option>
                                <option value="warranty">保証について</option>
                                <option value="info">製品情報</option>
                                <option value="complaint">クレーム</option>
                                <option value="other">その他</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">メッセージ <span class="required">※必須</span></td>
                        <td class="form-input">
                            <textarea name="message" rows="8" cols="50"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br>
                            <input type="submit" value="📨 送信する" class="submit-btn">
                            &nbsp;&nbsp;
                            <input type="reset" value="🗑️ リセット" style="font-size: 14px; padding: 8px 20px;">
                        </td>
                    </tr>
                </table>
            </form>
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

<script language="JavaScript">
<!--
function validateForm() {
    var form = document.contactForm;
    if (form.name.value == "") {
        alert("お名前を入力してください");
        form.name.focus();
        return false;
    }
    if (form.email.value == "") {
        alert("メールアドレスを入力してください");
        form.email.focus();
        return false;
    }
    // メールアドレスの簡易チェック — このバリデーションで十分なはず…
    if (form.email.value.indexOf("@") == -1) {
        alert("正しいメールアドレスを入力してください");
        form.email.focus();
        return false;
    }
    if (form.subject.value == "") {
        alert("お問い合わせ種別を選択してください");
        form.subject.focus();
        return false;
    }
    if (form.message.value == "") {
        alert("メッセージを入力してください");
        form.message.focus();
        return false;
    }
    return true;
}
//-->
</script>

</body>
</html>
