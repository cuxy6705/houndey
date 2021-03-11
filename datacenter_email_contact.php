<script type="text/javascript">


// function MM_goToURL() { //v3.0

//   var i, args=MM_goToURL.arguments; document.MM_returnValue = false;

//   for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");

// }

//-->

</script>

<?php

        $email;$comment;$captcha;

        if(isset($_POST['email'])){

          $email=$_POST['email'];

        }if(isset($_POST['message'])){

          $email=$_POST['message'];

        }

        if(isset($_POST['g-recaptcha-response'])){

          $captcha=$_POST['g-recaptcha-response'];

        }

        if(!$captcha){

          echo '<div align=center><br>Please check the verification code form.<br><br>請檢查驗證碼<br><br>確認コードを確認してください</div>';

          exit;

        }

        $secretKey = "6LdhIroZAAAAAH-uGVLuP7etuzsI_M9_BZpTtg3g";

        $ip = $_SERVER['REMOTE_ADDR'];

        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);

        $responseKeys = json_decode($response,true);

        if(intval($responseKeys["success"]) !== 1) {

          echo '<h2>You are spammer ! </h2>';

        } else {

          echo '<div align=center><br>Many thanks indeed, we will contact you shortly.<br><br>感謝您的來信, 我們將盡快與您聯絡. <br><br>お便りありがとうございます。できるだけ早くご連絡いたします。</div>';

        }

?>

<?php

include("class.phpmailer.php"); //匯入PHPMailer類別



$Name=$_POST['name'];

$Email=$_POST['email'];

$Company=$_POST['company'];

$Phone=$_POST['phone'];

$Country=$_POST['country'];

$Message=$_POST['message'];

$mail= new PHPMailer(); //建立新物件

$mail->IsSMTP(); //設定使用SMTP方式寄信

$mail->SMTPAuth = true; //設定SMTP需要驗證

$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線

$mail->Host = "premium49.web-hosting.com"; //Gamil的SMTP主機

$mail->Port = 465;  //Gamil的SMTP主機的埠號(Gmail為465)。

$mail->CharSet = "utf-8"; //郵件編碼

 

$mail->Username = "service@obamboofirst.website"; //Gamil帳號

$mail->Password = "4i5J6AX4HTdE"; //Gmail密碼

 

$mail->From = "service@obamboofirst.website"; //寄件者信箱

$mail->FromName = $Name; //寄件者姓名

 

$mail->Subject ="HOUNDEY - BUSINESS ENQUIRY";  //郵件標題

$mail->Body = "Name: ".$Name."<br>Email: ".$Email."<br>Company: ".$Company."<br>Phone: ".$Phone."<br>Country: ".$Country."<br>Message: ".$Message."<br>"; //郵件內容

$mail->IsHTML(true); //郵件內容為html ( true || false)

$mail->AddAddress("info@obamboo.com"); //收件者郵件及名稱




$mail->AddBCC("anita_test_one@obamboo.com"); //設定 密件副本收件者

$mail->AddBCC("obtrader@gmail.com"); //設定 密件副本收件者

if(!$mail->Send()) {

	echo "Send Error " . $mail->ErrorInfo;

} else {

	echo "<div align=center><br>Many thanks indeed, we will contact you shortly.<br><br>感謝您的來信, 我們將盡快與您聯絡. <br><br>お便りありがとうございます。できるだけ早くご連絡いたします。</div>";

}

?>







<body onLoad="MM_goToURL('self','http://www.houndey.com.tw/');return document.MM_returnValue">

</body>

