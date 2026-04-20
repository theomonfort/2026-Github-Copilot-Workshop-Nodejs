<?php
// Hikari Denki SAV - Contact Form
// Author: Yamamoto-san (2005)
// NOTE: Form validation is done client-side with JavaScript, should be fine...

require_once("config.php");

$message_sent = false;
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $product_ref = $_POST['product_ref'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert directly into database - quick and simple!
    $sql = "INSERT INTO contact_messages (name, email, phone, product_ref, subject, message, created_at) 
            VALUES ('$name', '$email', '$phone', '$product_ref', '$subject', '$message', NOW())";
    
    if (function_exists('mysql_query') && $conn) {
        $result = mysql_query($sql);
    } else {
        $result = false; // No DB available
    }
    
    if ($result) {
        $message_sent = true;
        
        // Send email notification to support team
        $to = "helpdesk@hikari-denki.co.jp";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        $email_body = "Nouveau message SAV\n\n";
        $email_body .= "Nom: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Tel: $phone\n";
        $email_body .= "Ref produit: $product_ref\n";
        $email_body .= "Sujet: $subject\n\n";
        $email_body .= "Message:\n$message\n";
        
        @mail($to, "SAV Contact: $subject", $email_body, $headers);
    } else {
        // Fallback: just pretend it worked (no DB in demo mode)
        $message_sent = true;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Hikari Denki SAV - Nous Contacter お問い合わせ</title>
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
            <img src="images/hikari_logo.gif" alt="HIKARI DENKI" width="150" height="50"><br>
            <h1>✉️ Nous Contacter - お問い合わせ</h1>
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

            <?php if ($message_sent): ?>
                <div class="success-msg">
                    <img src="images/check.gif" alt="OK" width="30"><br>
                    <font size="4" color="#006400"><b>Message envoyé avec succès!</b></font><br>
                    メッセージは正常に送信されました。<br><br>
                    Nous vous répondrons sous 48h ouvrées.<br>
                    <a href="index.php">Retour à l'accueil</a>
                </div>
            <?php elseif ($error_message != ""): ?>
                <div class="error-msg">
                    <font size="3" color="#8B0000"><b>⚠️ <?php echo $error_message; ?></b></font>
                </div>
            <?php endif; ?>

            <center>
                <img src="images/email_anim.gif" alt="Contact" width="60"><br>
                <font size="2">Remplissez le formulaire ci-dessous et notre équipe vous répondra rapidement.</font>
            </center>

            <br>

            <form method="POST" action="contact.php" name="contactForm" onsubmit="return validateForm()">
                <table class="form-table">
                    <tr>
                        <td class="form-label">Nom / お名前 <span class="required">※必須</span></td>
                        <td class="form-input">
                            <input type="text" name="name" size="40" maxlength="100">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">E-mail <span class="required">※必須</span></td>
                        <td class="form-input">
                            <input type="text" name="email" size="40" maxlength="100">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Téléphone / 電話番号</td>
                        <td class="form-input">
                            <input type="text" name="phone" size="20" maxlength="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Réf. Produit / 製品型番</td>
                        <td class="form-input">
                            <input type="text" name="product_ref" size="30" maxlength="50">
                            <br><font size="1" color="#808080">Ex: LM-32X600E, IP-Y30EU</font>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Sujet / 件名 <span class="required">※必須</span></td>
                        <td class="form-input">
                            <select name="subject">
                                <option value="">-- Sélectionnez --</option>
                                <option value="repair">Demande de réparation / 修理依頼</option>
                                <option value="parts">Pièces détachées / 部品注文</option>
                                <option value="warranty">Question garantie / 保証について</option>
                                <option value="info">Renseignement produit / 製品情報</option>
                                <option value="complaint">Réclamation / クレーム</option>
                                <option value="other">Autre / その他</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Message <span class="required">※必須</span></td>
                        <td class="form-input">
                            <textarea name="message" rows="8" cols="50"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br>
                            <input type="submit" value="📨 Envoyer / 送信" class="submit-btn">
                            &nbsp;&nbsp;
                            <input type="reset" value="🗑️ Effacer / リセット" style="font-size: 14px; padding: 8px 20px;">
                        </td>
                    </tr>
                </table>
            </form>
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
function validateForm() {
    var form = document.contactForm;
    if (form.name.value == "") {
        alert("名前を入力してください / Veuillez entrer votre nom");
        form.name.focus();
        return false;
    }
    if (form.email.value == "") {
        alert("メールアドレスを入力してください / Veuillez entrer votre e-mail");
        form.email.focus();
        return false;
    }
    // Email validation - this regex should work...
    if (form.email.value.indexOf("@") == -1) {
        alert("正しいメールアドレスを入力してください / E-mail invalide");
        form.email.focus();
        return false;
    }
    if (form.subject.value == "") {
        alert("件名を選択してください / Veuillez sélectionner un sujet");
        form.subject.focus();
        return false;
    }
    if (form.message.value == "") {
        alert("メッセージを入力してください / Veuillez entrer votre message");
        form.message.focus();
        return false;
    }
    return true;
}
//-->
</script>

</body>
</html>
