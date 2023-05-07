<?php
$idade = 17;
#echo($idade);
#$nome = "alex noia";
#echo($nome);
$salario_2021 = 50000;
$salario_2022 = 45000;
$calculo = ($salario_2021 + $salario_2022) / 2;
#echo $calculo;
$nome = "alex";
$sobrenome = "noia";
#echo $nome . ' ' . $sobrenome;
$maior_de_idade = (17 <= 18);
#var_dump($maior_de_idade);
$idade = 17;
if ($idade >= 18) {
	#echo "maior de idade";
} else {
	#echo "menor de idade";
}
$idade = 17;
$ano = 2023;
while ($idade < 60) {
	#echo "em" . $ano . "voce tera" . $idade . "anos!" . '<br>';
	$idade++;
	$ano++;
}
for ($x = 0; $x <= 100; $x++) {
	if ($x % 10 == 0) {
		#echo $x . '<br>';
	}
}
echo '<table>';
for($a = 0; $a <= 10; $a++){
	for($b = 0; $b < 10; $b++){
		echo '<td style="border:1px solid red">';
		echo $b;
		echo '</td>';
	}
	echo '</tr>';
}
echo '</table>';