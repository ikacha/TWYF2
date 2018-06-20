<?php

$fichier = basename($_FILES["file"]["name"]);

$target_file = "fichier/" . $fichier;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
{
	echo 'Le fichier <strong>'. $fichier . '</strong> à été importer';
} 
else 
{
	echo "Une erreur s\'est produite lors de l\'importation du fichier";
}

?>