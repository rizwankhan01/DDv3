<?php
$to = "samervj@gmail.com, rizwankhanphotography@gmail.com";
$subject = "DigitalOcean Test Mail";
$txt = "Heyooo!!!! Mail is working from DigitalOcean.";
$headers = "From: admin@doctordisplay.co.in";


if(mail($to,$subject,$txt, $headers)){
echo "success";
}else{
echo "failure";
}
?>
