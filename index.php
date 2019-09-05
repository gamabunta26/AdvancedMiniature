<html>
	<head>
		<title>Miniature</title>
	</head>
	<body>
		<div>
			<h1 class="titre">Miniature</h1>
		</div>
	<center>
	
	<?php
	//URL + directory onthe current server
	$urlphoto = $_SERVER['HTTP_REFERER'].$_SERVER['PHP_SELF'];
	// nom du répertoire qui contient les images
	$nomRepertoire = "./photos/";
	
	$i = 0;
	$n = 1;
	
	if(is_dir($nomRepertoire))
	{
		$list_dir = glob($nomRepertoire."*", GLOB_ONLYDIR);
	   
		foreach( $list_dir as $key => $value )
		{
			$str = str_replace($nomRepertoire, "", $value );
			echo "<hr>Categorie : $str<hr><br>";
			echo '<table width="100%" align="center"><tr>';
			$list_fic = glob($value."/*.*");
			
			foreach( $list_fic as $key2 => $Fichier )
			{
				echo '<td><a target="_blank" href="', $urlphoto,$Fichier, '">';
				echo '<img src="mini_img.php?img='.$Fichier.'&amp;hauteur=300&amp;svg=2" >';
				echo "</a>";

				$str = str_replace($value."/", "", $Fichier );
				$tmp_nom = explode( ".", $str );
				echo "<span class=\"nom\"> ".$tmp_nom[0]."</span></td>";
				$i++;
			}
			if($i == ($n * 2))
			{
				echo "</tr><tr>";
				$n++;
			}
		echo "</tr></table>";
		}
	}
	else
	{
		echo' Le répertoire spécifié n\'existe pas';
	}
	?>

	</center>
	</body>
</html>