<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html lang="fr"> 
	<head>
        <meta charset="utf-8" />
		<meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="styles.css" />
		<!-- Import Google Font - Yanone Kaffeesatz  -->	
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css' />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <title>Espace d&eacute;dicace</title>
    </head>

	<!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!--><body><!--<![endif]-->
        <div id="bloc_page">
            <header>                       
            </header>
            
			<?php 
			$error = 'null';
			if (isset($_GET['err']))
			{
				$error = $_GET['err'];
			}
			switch($error)
			{
				case 'ext': // Extension
				echo('<div id="error"><h1>Mauvaise extension !</h1></div>  ');
				include('pages/txt_accueil.php');
				include('pages/formulaire.php');
				break;
				
				case 'sz': // Size
				echo('<div id="error"><h1>Fichier trop volumineux !</h1></div>  ');
				include('pages/txt_accueil.php');
				include('pages/formulaire.php');
				break;
				
				case 'srv': // Serveur free
				echo('<div id="error"><h1>Erreur du serveur !</h1></div>  ');
				include('pages/txt_accueil.php');
				include('pages/formulaire.php');
				break;
				
				case 'mail': // Serveur free
				echo('<div id="error"><h1>Mail incorrect !</h1></div>  ');
				include('pages/txt_accueil.php');
				include('pages/formulaire.php');
				break;
				
				case 'none': 
				echo('<div id="thanks"><h1>Merci pour ta contribution !</h1></div>');
				break;
				
				case 'null': 
				include('pages/txt_accueil.php');
				include('pages/formulaire.php');
				break;
						
				default: // probleme
				echo "Error...";
			}
			?>               
            
            <footer>               
            </footer>

        </div>
    </body>
</html>