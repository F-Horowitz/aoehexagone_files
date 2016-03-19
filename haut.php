<?php
/*
Page haut.php
Funkumo Horowitz

Page incluse créant le doctype, la session etc etc. */

session_start(); // Démarrage de la session avant TOUT

// On inclut les fichiers header nécéssaires
	include('../motor/config.php');
	include('../motor/constantes.php');
	include('../motor/fonctions.php');
	
	//Même si il s'est connecté sur le forum, la variable session subsiste
	if (isset($_COOKIE['pseudo']) && empty($id))
	{
		$_SESSION['pseudo'] = $_COOKIE['pseudo'];
		/* On créé la variable de session à partir du cookie pour ne pas
		avoir à vérifier 2 fois sur les pages qu'un membre est connecté. */
	}

	if (isset($_COOKIE['pseudo']) && !empty($id))
	{
		$connecte = true;//si il est connecté, on active le booléen
	}

	if (!isset($_COOKIE['pseudo']) && empty($id))
	{
		$connecte = false;//si il est déconnecté, on désactive le booléen
	}
?>

<!DOCTYPE html>
<html><head>
<meta charset="utf-8" />
<title><?php echo $nom_site; ?>, site communautaire sur la série Age of Empires™</title>
<link rel="stylesheet" type="text/css" href="http://ageofempires-universe.fr/site/design.css" media="screen" /> <!--[if lte IE 7]> <link rel="stylesheet" href="./design_ie7.css" /> <![endif]-->
<link rel="icon" type="image/png" href="http://ageofempires-universe.fr/images/icon/moine.png" /> <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="icon/moine.ico" /><![endif]-->
<?php $balises=(isset($balises))?$balises:0;
	if ($balises_code)
	{?>
	<script>	
		function bbcode(bbdebut, bbfin)
		{
			var input = window.document.formulaire.message; input.focus();
		if(typeof document.selection != 'undefined')
		{
			var range = document.selection.createRange();
			var insText = range.text;
			range.text = bbdebut + insText + bbfin;
			range = document.selection.createRange();
		if (insText.length == 0)
		{
			range.move('character', -bbfin.length);
		}
		else
		{
			range.moveStart('character', bbdebut.length +
			insText.length + bbfin.length);
		}
			range.select();
		}
		else if(typeof input.selectionStart != 'undefined')
		{
			var start = input.selectionStart;
			var end = input.selectionEnd;
			var insText = input.value.substring(start, end);
			input.value = input.value.substr(0, start) + bbdebut + insText +
			bbfin + input.value.substr(end);
			var pos;
			if (insText.length == 0)
			{
				pos = start + bbdebut.length;
			}
			else
			{
				pos = start + bbdebut.length + insText.length + bbfin.length;
			}
			input.selectionStart = pos;
			input.selectionEnd = pos;
		}
		else
		{
			var pos;
			var re = new RegExp('^[0-9]{0,3}$');
			while(!re.test(pos))
			{
				pos = prompt("insertion (0.." + input.value.length + "):", "0");
			}
			if(pos > input.value.length)
			{
				pos = input.value.length;
			}
			var insText = prompt("<em>Tapez votre texte..</em>");
			input.value = input.value.substr(0, pos) + bbdebut + insText + bbfin + input.value.substr(pos);
			}
		}
		
		function smilies(img)
		{cdx
			window.document.formulaire.message.value += '' + img + '';
		}
	</script>
		<?php
		}
		?>
		
</head><body>

    <header>
		<?php echo('<img src="http://ageofempires-universe.fr/images/banniere_site.png" alt="Logo du site"/>'); // On affiche le logo du site dans une bannière
		?>
		
			<nav><ul>
				<li><a title="Page d'accueil" href="http://ageofempires-universe.fr/site/index.php">Accueil</a></li>
				<li><a title="À ne pas manquer" href="http://ageofempires-universe.fr/site/indispensables.php">Essentiels</a></li>
				<li><a title="Articles et tutoriaux de jeu" href="http://ageofempires-universe.fr/site/articles_tutos.php">Articles et tutoriaux</a></li>
				<li><a title="Forums" href="http://ageofempires-universe.fr/forums/index.php">Communautés</a></li>
				<li><a title="A propos" href="http://ageofempires-universe.fr/site/about.php">A propos du site</a></li>
			</ul></nav>
	</header>
<div id="site">
		<?php include_once('cadre_membre.php'); ?>
