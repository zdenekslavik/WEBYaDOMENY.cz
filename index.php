<?php
/*
Zde můžete vidět také implementaci WebM API, která získá informace o nabídce jen na základě domény
Více informací o WebM API naleznete zde -> https://webyadomeny.cz/api
Pro správné fungování této stránky potřebujete pouze API klíč, který získáte registrací na -> https://socialweb.cz
*/

$api_url = "https://api.webm.cz";
//api klíč vložte níže
$api_key = "f886167846150a221c5806a0ac2ccfc7";
//nahraďte vašim API klíčem, to je také jediné nastavení, které musíte pro správnou funkčnost této stránky udělat, tento přednastavený API klíč je limitován na 10 dotazů za minutu, přičemž ho může kdokoliv využívat, to znamená, že tato stránka ne-vždy bude na 100% fungovat, naopak váš osobní API klíč může zpracovávat i stovky dotazů za minutu!
$domain = $_SERVER['HTTP_HOST'];
$api_type = "market_url";
$cookie=tempnam("/tmp","CURLCOOKIE");
$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7";
$ch = curl_init();
$data = "api_key=$api_key&domain=$domain&api_type=$api_type";
curl_setopt($ch, CURLOPT_URL,"$api_url");
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch,CURLOPT_ENCODING,"gzip,deflate");
curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded","Accept: */*"));
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"$data");
$urlmarket=curl_exec($ch);
$lastUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$marketdata = json_decode($urlmarket, true);
if(empty($marketdata['url'])) {
header("Location: https://webyadomeny.cz");
die();
}
?>
<html lang="cs" >
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?php echo $marketdata['nazev'] ?></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="description" content="<?php echo substr($marketdata['popis'], 0, 180) . '...'; ?>">
<meta name="author" content="WebM.cz">
<meta name="MobileOptimized" content="320">
<meta name="robots" content="noindex">
<meta property="og:title" content="NA PRODEJ: <?php echo $marketdata['nazev'] ?>"/>
<meta property="og:image" content="https://webyadomeny.cz/uploads/domeny/<?php echo $marketdata['id'] ?>/domena-na-prodej.jpg"/>
<meta property="og:site_name" content="<?php echo $marketdata['url'] ?>"/>
<meta property="og:description" content="<?php echo substr($marketdata['popis'], 0, 320) . '...'; ?>"/>
<link href="https://webyadomeny.cz/assets/main/css/main.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="apple-touch-icon" sizes="57x57" href="https://webyadomeny.cz/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://webyadomeny.cz/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://webyadomeny.cz/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://webyadomeny.cz/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="https://webyadomeny.cz/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://webyadomeny.cz/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://webyadomeny.cz/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://webyadomeny.cz/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="https://webyadomeny.cz/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="https://webyadomeny.cz/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://webyadomeny.cz/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://webyadomeny.cz/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://webyadomeny.cz/icons/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="https://webyadomeny.cz/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<style type="text/css">
.fancybox-margin{margin-right:17px;}
.rs_commingsoon_section {
background-image: url(https://webyadomeny.cz/images/background.jpg); /* Nahraďte vlastním obrázkem pokud chcete */
}
.popis {
line-height: 28px;
font-size: 15px;
padding-top: 25px;
padding-bottom: 25px;
color: #fff;
text-align: center;
}
h4 {
line-height: 35px;
text-align: center;
color: #fe5722;
text-transform: uppercase;
}
.tralala {
text-align:center;
z-index:10000;
}
p {
text-align:center;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<header>
<div class="rs_csoon_topheader rs_toppadder30 rs_bottompadder30">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="rs_csoon_topheader_inner">
<p>Tato prodejní stránka byla vytvořena automaticky přes WEBYaDOMÉNY.cz API. <a href="https://webyadomeny.cz/api">Zjistit jak funguje API</a> </p>
</div>
</div>
</div>
</div>
</div>
</header>
<div class="rs_commingsoon_section rs_toppadder100 rs_bottompadder60">
<div class="rs_overlay"></div>
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="tralala">
<script async src="https://reklama.webm.cz/pagead/ads.js"></script>
<!-- reklama domain landing page -->
<ins class="webm-reklama"
style="display:inline-block;width:728px;height:90px"
data-ad-client="ca-pub-1"
data-ad-slot="47"
data-keyword=""></ins>
</div>
<div style="margin-top:20px" class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="rs_subscribe_section_heading">
<h2 class="rs_bottompadder20">Doména <a href="<?php echo $marketdata['url'] ?>"><?php echo $_SERVER['HTTP_HOST'] ?></a> je na prodej!</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p style="font-size: 18px;" class="popis"><?php echo html_entity_decode($marketdata['popis'], ENT_QUOTES | ENT_COMPAT , 'UTF-8'); ?></p>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h2 style="color:#fff" class="rs_bottompadder40 rs_subscribe_section_heading">Tato doména může být vaše již za <strong style="text-decoration: underline;"><?php echo $marketdata['pocatecni_cena'] ?> Kč</strong></h2>
<h4><i class="fa fa-line-chart" aria-hidden="true"></i> Srank domény je: <?php echo $marketdata['srank'] ?>/100</h4>
<h4><i class="fa fa-pie-chart" aria-hidden="true"></i> MOZ rank domény je: <?php echo $marketdata['rank'] ?></h4>
<h4><i class="fa fa-thermometer-quarter" aria-hidden="true"></i> Autorita domény je: <?php echo $marketdata['autorita'] ?></h4>
<h4><i class="fa fa-random" aria-hidden="true"></i> Počet zpětných odkazů: <?php echo $marketdata['odkazy'] ?></h4>
<h4 class="rs_bottompadder40"><i class="fa fa-eye" aria-hidden="true"></i> Tato stránka byla zobrazena již: <?php echo $marketdata['videni'] ?> krát</h4>
<p><a href="<?php echo $marketdata['url'] ?>" class="rs_button rs_button_orange">Zobrazit více informací o této doméně</a></p>
</div>
</div>
<div style="margin-top:30px" class="tralala">
<script async src="https://reklama.webm.cz/pagead/ads.js"></script>
<!-- reklama domain landing page -->
<ins class="webm-reklama"
style="display:inline-block;width:728px;height:90px"
data-ad-client="ca-pub-1"
data-ad-slot="47"
data-keyword=""></ins>
</div>
</div>
</div>
</div>
</div>

<div class="rs_index2_bootomfooter rs_toppadder30 rs_bottompadder30">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="rs_index2_copyright">
<p style="text-align: center;">© <a href="https://webyadomeny.cz">WEBYaDOMENY.cz</a> Je bezplatné nákupní centrum pro prodej webových stránek, internetových obchodů a doménových jmen.</p>
</div>
</div>

</div>
</div>

</div>

</body>
<script type="text/javascript" src="https://cs.cookiegenerator.eu/cookie.js?position=&amp;skin=cookielaw3&amp;animation=shake2&amp;delay=3&amp;box_radius=37&amp;msg=Tato%20prodejn%C3%AD%20str%C3%A1nka%20pou%C5%BE%C3%ADv%C3%A1%20k%20personalizaci%20reklam%20a%20anal%C3%BDze%20n%C3%A1v%C5%A1t%C4%9Bvnosti%20soubory%20%5Bb%5Dcookie%5B%2Fb%5D.%20Informace%20o%20tom%2C%20jak%20tyto%20webov%C3%A9%20str%C3%A1nky%20pou%C5%BE%C3%ADv%C3%A1te%2C%20jsou%20sd%C3%ADleny%20se%20spole%C4%8Dnost%C3%AD%20%5Burl%3Dhttps%3A%2F%2Fwebm.cz%5DWebM.cz%5B%2Furl%5D.%20Pou%C5%BE%C3%ADv%C3%A1n%C3%ADm%20t%C4%9Bchto%20webov%C3%BDch%20str%C3%A1nek%20souhlas%C3%ADte%20s%20pou%C5%BEit%C3%ADm%20soubor%C5%AF%20cookie.%20V%C3%ADce%20informac%C3%AD%20si%20m%C5%AF%C5%BEete%20tak%C3%A9%20p%C5%99e%C4%8D%C3%ADst%20na%20str%C3%A1nce%20o%20%5Burl%3Dhttps%3A%2F%2Fwebyadomeny.cz%2Fhome%2Fprivacy%5Dochran%C4%9B%20osobn%C3%ADch%20%C3%BAdaj%C5%AF%5B%2Furl%5D.&amp;link_color=f64400"></script>
</html>

