<?php

$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');
$nome = $_POST['name'];
$email = $_POST['email'];

function pegaValor($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function enviaEmail($de, $assunto, $mensagem, $para) {
    $headers = "From: $de\r\n" .
               "Reply-To: $para\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
  mail($para, $assunto, nl2br($mensagem), $headers);
}

$para = "nicollesleto@gmail.com";
$de = pegaValor("email");
$mensagem = "Hello, you have a message from ".$_POST['name']."\n\n"."Tel: ".$_POST['phone']."\n\n\n".pegaValor("msg")."\n\n"."Date: ".$data_envio."\n"."Time: ".$hora_envio;
$assunto = "Contact - NSL";

if ($nome && validaEmail($de) && $mensagem) {
    enviaEmail($de, $assunto, $mensagem, $para);
    $pagina = "mail_ok.php";
    $resposta = '
    
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
 xmlns:v="urn:schemas-microsoft-com:vml"
 xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <!--[if gte mso 9]><xml>
   <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
   </o:OfficeDocumentSettings>
  </xml><![endif]-->
  <!-- fix outlook zooming on 120 DPI windows devices -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
  <meta name="format-detection" content="date=no"> <!-- disable auto date linking in iOS 7-9 -->
  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS 7-9 -->
  <title>Single Column</title>
  <style>
        .header,
.title,
.subtitle,
.footer-text {
  font-family: Helvetica, Arial, sans-serif;
}

.header {
  font-size: 24px;
  font-weight: bold;
  padding-bottom: 12px;
  color: #DF4726;
}

.footer-text {
  font-size: 12px;
  line-height: 16px;
  color: #aaaaaa;
}
.footer-text a {
  color: #aaaaaa;
}

.container {
  width: 600px;
  max-width: 600px;
}

.container-padding {
  padding-left: 24px;
  padding-right: 24px;
}

.content {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #ffffff;
}

code {
  background-color: #eee;
  padding: 0 4px;
  font-family: Menlo, Courier, monospace;
  font-size: 12px;
}

hr {
  border: 0;
  border-bottom: 1px solid #cccccc;
}

.hr {
  height: 1px;
  border-bottom: 1px solid #cccccc;
}

.title {
  font-size: 18px;
  font-weight: 600;
  color: #374550;
}

.subtitle {
  font-size: 16px;
  font-weight: 600;
  color: #2469A0;
}
.subtitle span {
  font-weight: 400;
  color: #999999;
}

.body-text {
  font-family: Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 20px;
  text-align: left;
  color: #333333;
}

a[href^="x-apple-data-detectors:"],
a[x-apple-data-detectors] {
  color: inherit !important;
  text-decoration: none !important;
  font-size: inherit !important;
  font-family: inherit !important;
  font-weight: inherit !important;
  line-height: inherit !important;
}
    </style>
</head>
<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
  <tr>
    <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

      <br>

      <!-- 600px container (white background) -->
      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container">
        <tr>
          <td class="container-padding header" align="left">
            Contact NSL
          </td>
        </tr>
        <tr>
          <td class="container-padding content" align="left">
            <br>

<div class="title">I have received your email</div>
<br>

<div class="body-text">
    Hello!
  <br><br>
    Thank you for your attention!
  <br><br>
    Soon you will receive your answer.
  <br><br>
</div>

          </td>
        </tr>
        <tr>
          <td class="container-padding footer-text" align="left">
            <br><br>
            &copy; Nicolle Leto
            <br><br>

            You are receiving this email because you opted in my page, if you believe that is an error, please ignore that.
              
            <br><br>

            <strong>Acme, Inc.</strong><br>
            <a href="https://nicolleleto.github.io">nicolleleto.github.io</a><br>

            <br><br>

          </td>
        </tr>
      </table><!--/600px container -->


    </td>
  </tr>
</table><!--/100% background wrapper-->

</body>
</html>
    
    
    ';
    $resp_assunto   = "Confirmation - NSL";

    $headers2 = "From: $para\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($email, $resp_assunto, $resposta,$headers2);
} else {
    $pagina = "mail_error.php";
}

header("location:$pagina");

?>