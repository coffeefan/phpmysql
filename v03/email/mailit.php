<?php
/**
 * Created by PhpStorm.
 * User: cbach_000
 * Date: 16.09.14
 * Time: 21:55
 */
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "christianbachmann.ch@gmail.com";
$mail->Password = "password";
$mail->SetFrom("christianbachmann.ch@gmail.com");
$mail->CharSet = 'utf-8';

$mail->addAddress('c.bachmann@inaffect.net', 'Chris');     // Add a recipient
//$mail->addAddress('xobe@zhaw.ch', 'Jaime');

/*$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'E-Mail Aufgabe Chris';
$mail->Body    = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="format-detection" content="telephone=no"><link rel="stylesheet" href="http://ea.sendcpt.com/_na/e6085264da7e0df546924d40ed27d46f.css" type="text/css" charset="utf-8">

</head>
<title>cb</title>


<body style="background-color:#006fad;">

<table align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody><tr >
    <td style="background:#FFF;" align="right" height="142" valign="top" width="600"> <img src="http://www.zhaw.ch/fileadmin/templates/img/zhaw_logo_de.gif"></td>
  </tr>
  <tr>
    <td style="background:#FFF;" align="left" height="150" valign="top" width="600"><table  id="id703093287" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr >
          <td align="left" valign="top" width="23">&nbsp;</td>
          <td align="left" valign="top" width="230"><img src="http://www.wintech-edv.com/wordpress/wp-content/uploads/2011/06/mysqlPHP.gif" ><!-- img-elm-end --></td>
          <td  id="id515823104" style="font: 12px Arial; line-height: 20px; color: #666666;" align="left" valign="top" width="322"><!-- elmHTML --><span class="" style="font-weight: bold;"><span style="font-size: 16px;">PHP MYSQL wird unterschätzt...</span></span><br class="">
<br class="">
...PHP kann sogar E-Mails über ein google Konto versenden.
<br class="">
<br class="">
Weiteres in meinem Repo: <a href="mailto:https://github.com/coffeefan/phpmysql">https://github.com/coffeefan/phpmysql</a><!-- /elmHTML --></td>
        </tr>
    </tbody></table></td>
  </tr>

  <tr>
    <td style="background:#FFF;" align="left" height="150" valign="top" width="600"><table  id="id703093287" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr >
          <td align="left" valign="top" width="23">&nbsp;</td>
          <td align="left" valign="top" width="230"><img src="http://placehold.it/200x200&text=I%20love%20css" ><br/></td>
          <td  style="font: 12px Arial; line-height: 20px; color: #666666;" align="left" valign="top" width="322"><p><span class="" style="font-weight: bold;"><span style="font-size: 16px;">Tabellen Layout 4 E-Mails</span></span><br class="">
  <br class="">
              Muss man tatsächlich für E-Mails Tabellenlayout verwenden?</p>
            <p><a href="mailto:http://www.sitepoint.com/code-html-email-newsletters/">http://www.sitepoint.com/code-html-email-newsletters/</a><br class="">
              <br class="">
</p></td>
        </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td style="background:#E0E0E0;" align="left" height="77" valign="top" width="600"><table  id="id315407972" border="0" cellpadding="0" cellspacing="0">
      <tbody><tr  id="id403937145">
        <td  id="id962297606" align="left" height="55" valign="middle" width="24">&nbsp;</td>
        <td  id="id794002660" style="font: 11px Arial; line-height: 10px; color: #666;" align="left" height="65" valign="middle" width="552">ZHAW <br />
          Christian Bachmann<br />
          Lagerstrasse 41<br />
          8001 Zürich<br />
          <a href="mailto:bachmch3@students.zhaw.ch">bachmch3@students.zhaw.ch</a></td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr>
    <td height="17" valign="top" width="600">&nbsp;</td>
  </tr>
</tbody></table></body>
</html>
';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>