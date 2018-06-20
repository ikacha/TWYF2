<?php
//echo $_POST["braille"];
$str = $_POST["braille"];
$chars = preg_split('#[\s]#', $str, -1, PREG_SPLIT_NO_EMPTY);
print_r($chars);
foreach ($chars as $key => $value)
{
	if (ctype_alpha($value))
	{
		if (ctype_upper($value))
		{
			//echo "majuscules";
		}
		elseif (ctype_lower($value))
		{
			//echo "minuscule";
		}
		else
		{
			$str = preg_replace('#^([A-Z]+)#', '$1-', $value); //Remplacez d'abord les nombres au début de la chaîne avec les chiffres suivis d'un -
			$str = preg_replace('#([A-Z]+)$#', '-$1', $str); //Ensuite, remplacez tous les chiffres à la fin de la chaîne par un - puis les chiffres
			$str = preg_replace('#([^[A-Z]]+)([A-Z]+)([^[A-Z]]+)#', '$1-$2-$3', $str);//Enfin, remplacez les nombres dans la chaîne par - (nombres) -
			$text = preg_split('#[-]#', $str, -1, PREG_SPLIT_NO_EMPTY);
			print_r($text); // string(22) "123-site-123-point-123"
		}
	}
	else
	{
		//$str = '123site123point123';
		$str = preg_replace('#^(\d+)#', '$1-', $value); //Remplacez d'abord les nombres au début de la chaîne avec les chiffres suivis d'un -
		$str = preg_replace('#(\d+)$#', '-$1', $str); //Ensuite, remplacez tous les chiffres à la fin de la chaîne par un - puis les chiffres
		$str = preg_replace('#([^\d]+)(\d+)([^\d]+)#', '$1-$2-$3', $str);//Enfin, remplacez les nombres dans la chaîne par - (nombres) -
		$text = preg_split('#[-]#', $str, -1, PREG_SPLIT_NO_EMPTY);
		//print_r($text); // string(22) "123-site-123-point-123"
	}
    /*if (ctype_lower($value))
    {
    	echo "minuscule";
    }*/
}
$alpha = array(
	' ' => '&#10240;',
	'a' => '&#10241;',
	'b' => '&#10243;',
	'c' => '&#10249;',
	'd' => '&#10265;',
	'e' => '&#10257;',
	'f' => '&#10251;',
	'g' => '&#10267;',
	'h' => '&#10259;',
	'i' => '&#10250;',
	'j' => '&#10266;',
	'k' => '&#10245;',
	'l' => '&#10247;',
	'm' => '&#10253;',
	'n' => '&#10269;',
	'o' => '&#10261;',
	'p' => '&#10255;',
	'q' => '&#10271;',
	'r' => '&#10263;',
	's' => '&#10254;',
	't' => '&#10270;',
	'u' => '&#10277;',
	'v' => '&#10279;',
	'w' => '&#10298;',
	'x' => '&#10285;',
	'y' => '&#10301;',
	'z' => '&#10293;',
	/*&#10242; => ,
	&#10244; => '
	&#10246; => ;
	&#10252; => /
	&#10258; => :
	&#10262; => !
	&#10270; => t
	&#10273; => Â
	&#10275; => Ê
	&#10276; => -
	&#10278; => ?
	&#10280; => MAJ
	&#10281; => Î
	&#10282; => Œ
	&#10283; => Ë
	&#10286; => È
	&#10287; => Ç
	&#10289; => Û
	&#10290; => .
	&#10291; => Ü
	&#10295; => À
	&#10297; => Ô
	&#10299; => Ï
	&#10302; => Ù
	&#10303; => É*/
);
/*$alpha = array(
  'a'=>'&#10241;',
  'b'=>'&#10243;',
  'c'=>'&#10249;',
  'd'=>'&#10265;',
  'e'=>'&#10257;',
  'f'=>'&#10251;',
  'g'=>'&#10267;',
  'h'=>'&#10259;',
  'i'=>'&#10250;',
  'j'=>'&#10266;',
  'k'=>'&#10245;',
  'l'=>'&#10247;',
  'm'=>'&#10253;',
  'n'=>'&#10269;',
  'o'=>'&#10261;',
  'p'=>'&#10255;',
  'q'=>'&#10271;',
  'r'=>'&#10263;',
  's'=>'&#10254;',
  't'=>'&#10270;',
  'u'=>'&#10277;',
  'v'=>'&#10279;',
  'w'=>'&#10298;',
  'x'=>'&#10285;',
  'y'=>'&#10301;',
  'z'=>'&#10293;',
  '0'=>'',
  '1'=>'',
  '2'=>'',
  '3'=>'',
  '4'=>'',
  '5'=>'',
  '6'=>'',
  '7'=>'',
  '8'=>'',
  '9'=>'',
  ' '=>'&#10240;',
  '.'=>'&#10290;',
  ':'=>'&#10258;',
  '/'=>'&#;',
  ''=>'&#;',
  ''=>'&#;',
  );
  
  $txt = $_POST["braille"];
  
  $tmp = str_split($txt);
  $res = '';
  foreach($tmp as $value)
  {
  
    $res .= $alpha[$value];
  }
  
  echo "<h1>$res</h1>";
  echo $txt;*/
?>