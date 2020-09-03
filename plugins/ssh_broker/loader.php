<?php


$loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

//PreCheck that the IP Is Not Authorized
$whitelist="/var/www/html/whitelist.conf";
$file=file_get_contents($whitelist);
$file=str_replace("allow ","",$file);
$sfile=explode("/32;",$file);

$ip=$_SERVER['REMOTE_ADDR'];


if(in_array($ip,$sfile)){
  echo "Your IP ($ip) is already Authorized, there is nothing you need to do.</br></br>";
}else{

  if($_POST["password"]==$atts['auth_code']){
    echo "Thank you your IP ($ip) is now Authorized, please wait 5 minutes before trying to connect again...</br></br>";
    $fh = fopen($whitelist, 'a') or die("can't open file");
    $stringData = "allow ".$ip."/32;\n";
    echo $stringData."</br>";
    fwrite($fh, $stringData);
    fclose($fh);
  }else{
    echo $twig->render('main.twig', $atts);
  }


}





?>
