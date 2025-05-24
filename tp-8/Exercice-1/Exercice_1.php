<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1</title>
</head>
<body>
    <form method="post"> 
    <label>Ajouter nombre 1</label><br>
    <input type="number" name="n1"><br>
    <label>Ajouter nombre 2</label><br>
    <input type="number"  name="n2"><br>
<label>choisir une opération</label><br>
<button  name="addition">addition</button>
<button name="soustraction">soustraction</button>
<button name="multiplication">multiplication</button>
<button name="division">division</button>
</form>
<?php

if (isset($_POST['addition'])) {
   $number1=$_POST['n1'] ;
   $number2=$_POST['n2'] ;
 echo "le résultat de l'opération est ", $som=$number1 + $number2;
}
if (isset($_POST['soustraction'])) {
   $number1=$_POST['n1'] ;
   $number2=$_POST['n2'] ;
 echo "le résultat de l'opération est ", $som=$number1 - $number2;
}
if (isset($_POST['division'])) {
   $number1=$_POST['n1'] ;
   $number2=$_POST['n2'] ;
 echo "le résultat de l'opération est ", $som=$number1/$number2;
}
if (isset($_POST['multiplication'])) {
   $number1=$_POST['n1'] ;
   $number2=$_POST['n2'] ;
 echo "le résultat de l'opération est ", $som=$number1*$number2;
}

?>
</body>
</html>