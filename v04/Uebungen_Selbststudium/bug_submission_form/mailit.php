<?php
/**
 * Created by PhpStorm.
 * User: cbach_000
 * Date: 16.09.14
 * Time: 21:55
 */
require realpath(dirname(__FILE__)).'/lib/phpmailer/PHPMailerAutoload.php';


function mailbugreport($bugfile,$screenshot){

    $mail = new PHPMailer;


    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "christianbachmann.ch@gmail.com";
    $mail->Password = "password";
    $mail->SetFrom("christianbachmann.ch@gmail.com");
    $mail->CharSet = 'utf-8';

    $mail->addAddress('c.bachmann@inaffect.net', 'Chris');
    $mail->addAttachment($bugfile);
    $mail->addAttachment($screenshot);

    $mail->isHTML(true);

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
              <td align="left" valign="top" width="230"><img src="http://www.cncofficesystems.com/blog/wp-content/uploads/2013/04/Software-Bug.jpg" width="220" ><!-- img-elm-end --></td>
              <td  id="id515823104" style="font: 12px Arial; line-height: 20px; color: #666666;" align="left" valign="top" width="322"><!-- elmHTML --><span class="" style="font-weight: bold;"><span style="font-size: 16px;">Neuer Bug eingetroffen </span></span> <br class="">
    <br class="" />
    <br class="" />
    <!-- /elmHTML -->
    Es ist ein neuer Bug eingetroffen. <br />
    Weitere Informationen finden Sie im Anhang.<!-- /elmHTML --></td>
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

}
?>