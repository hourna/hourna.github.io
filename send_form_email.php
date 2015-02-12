<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@pinarkoksal.com.tr";
    $email_subject = "İletişim Formu";
     


     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  
if(($first_name=="") or ($last_name =="") or ($email_from=="") or ($comments=="")){
 
echo "Lutfen Ad, Soyad, E-Mail ve Mesaj alanlarini bos birakmayiniz.<br><a href=iletisim.html>Geri don</a>";

}
else
{
if(!preg_match($email_exp,$email_from)) {
echo "Lutfen gecerli bir E-Mail adresi giriniz.<br><a href=iletisim.html>Geri don</a>";;
  }
else
{

    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Tesekkurler. Mesajiniz iletildi. En kisa surede sizinle iletisime gecilecektir.<br><a href=iletisim.html>Geri don</a><br><a href=index.html>Anasayfa</a>
 
<?php
}
}
}
?>