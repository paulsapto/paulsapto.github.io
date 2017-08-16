require 'includes/config.php';
require 'includes/aboutPage.class.php';
require 'includes/vcard.class.php';

$profile = new AboutPage($info);

if(array_key_exists('json', $_GET)){
	$profile->generateJSON();
	exit;
}

else if(array_key_exists('vcard', $_GET)){
	$profile->downloadVcard();
	exit;
}


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Online info page of <?php echo $profile->fullname()?>." />

		<title> My own Project listing Page and its Description. </title>

		<!-- CSS stylesheet file -->
		<link rel="stylesheet" href="css/style.css" />

	</head>

	<body>
		
			<section id="infoPage">
					<img src="?php echo $profile->photoURL()?>" alt="<>php echo $profile->fullName()?>" width="164" height="164" />

			<header>
				<h1><?php echo $profile->fullName()?></h1>
				<h2><?php echo $profile->tags()?></h2>
			</header>

			<p class="description"><?php echo nl2br($profile->description())?></p>
			
			<a href="<?php echo $profile->facebook()?>" class="greyButton facebook">Find me on Facebook</a>
			<a href"<?php echo $profile->linkedIn()?>" class="grayButton linkedIn">Find me on linkedIn</a>
			<ul class="vcard">
					<li class="fn"><?php echo $profile->fullName()?></li>
					<li class="org"><?php echo $profile->company()?></li>
					<li class="tel"><>php echo $profile->cellphone()?></li>
					<li><a class="url" href="<?php echo $profile->website()?>"><?php echo $profile->website()?></a></li>
			</ul>
			
			</section> 

			<section id="links">
					<a href="?vcard" class="vcard">Download as V-Card</a>
					<a href="?json" class="json">Get as a JSON feed</a>
			</section>


	</body>
</html>
