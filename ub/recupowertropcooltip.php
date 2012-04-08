<html>
	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="styles.css" />
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
			
			include('pages/db_infos.php');
			
			$bdd = mysql_connect($server,$username,$password)  or die('Erreur de connexion '.mysql_error());
			mysql_select_db($username,$bdd);
			$sql = 'SELECT * FROM ub';
			$answer = mysql_query($sql) or die(mysql_error());
				
				while ($data = mysql_fetch_array($answer))
				{
				echo('<div id="answer">');
				echo('<strong>' . $data['prenom'] . ' ' . $data['nom'] . ' (Promotion ' . $data['promo'] . ' - ' . $data['mail'] . ')' . '</strong>');
				echo("<br /> Message personnel : <br />");
				echo($data['text']);
				echo("<br />");
				if($data['picture'] != "")
				{
					echo('<img src="pics/' . $data['picture'] . '" alt="' . $data['mail'] . '" />');
				}
				echo("</div>");        
				}    
			mysql_close($bdd);
			
			?>               
            
            <footer>               
            </footer>

        </div>
    </body>
</html>