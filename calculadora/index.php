<html> 
<head>         
<title>CALCULADORA</title> 
</head>
<?php 
	print("texto para commit GitHub");	
	// Valores iniciales 
	if (!isset ($_POST[estado]) ) {
		$estado = 1;	$op = '';	$op1 = 0;	$op2 = 0; $resultado = 0; 		$coma = false;
	}
	else {
		// Recuperamos los valores del formulario 
		$estado = $_POST[estado]; 
		$operador = $_POST[operador];
		$op = $_POST[op];       
		$resultado = $_POST[resultado];	
		$op1 = $_POST[op1];	    
		$op2 = $_POST[op2]; 		
		$aux = $_POST[num];	    
		if ($estado==1)  {			 
			if ($op=='') { $resultado = $resultado*10 + $aux ; }
			if ($op=='C') { 
				$resultado = 0; 			}
			if ($op=='CE') { 
				$resultado = 0; 	$operador = ''; 			}
			if (($op=='+') || ($op=='-') || ($op=='*') || ($op=='/') ) {
				$estado = 2;
				$op1 = $resultado; $operador = $op;
				
				$resultado = 0; 
			}
		}
		if ($estado==2) {
			if ($op=='') { 	$resultado = $resultado*10 + $aux ; 	}
			if ($op=='C') {	$resultado = 0; $coma = false; 		}
			if ($op=='CE') { 
				$resultado = 0; $operador = ''; $estado = 1; $coma = false;
			}
			if ($op=='=') { 
				$op2 = $resultado; $estado = 1; 
				switch ($operador) {
					case '+': $resultado = $op1 + $op2; break;
					case '-': $resultado = $op1 - $op2; break;
					case '*': $resultado = $op1 * $op2; break;
					case '/': $resultado = $op1 / $op2; break;
				}
			}
		}
	}
?>

<body >
<form name="Calculadora" method = 'POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table align="center" border="1" >
                <tr><td colspan="5" align=CENTER>
	           <input name="visor" type="text" size='25' readonly value="<?php echo $resultado ?>"></td></tr>
                <tr>
                        <td><button type="submit" name="num" value="1" tabindex="1" >1</button></td>
                        <td><button type="submit" name="num" value="2" tabindex="2" >2</button></td>
                        <td><button type="submit" name="num" value="3" tabindex="3" >3</button></td>
                        <td><button type="submit" name="op" value="+" tabindex="12" >+</button></td>
                        <td align=center><button type="submit" name="op" value="C" tabindex="17">C</button></td>
                </tr>
                <tr>
                        <td><button type="submit" name="num" value="4" tabindex="4" >4</button></td>
                        <td><button type="submit" name="num" value="5" tabindex="5" >5</button></td>
                        <td><button type="submit" name="num" value="6" tabindex="6" >6</button></td>
                        <td><button type="submit" name="op" value="-"  tabindex="13" >-</button></td>
                        <td><button type="submit" name="op" value="CE" tabindex="18" >CE</button></td>
                </tr>
                <tr>
                        <td><button type="submit" name="num" value="7" tabindex="7" >7</button></td>
                        <td><button type="submit" name="num" value="8" tabindex="8" >8</button></td>
                        <td><button type="submit" name="num" value="9" tabindex="9" >9</button></td>
                        <td><button type="submit" name="op" value="*" tabindex="14" >*</button></td>
                        <td rowspan="2" align=center><button type="submit" name="op" value="=" 
							tabindex="16" STYLE="height:1.5cm" >=</button></td>
                </tr>
                <tr>
                        <td colspan="3"><button type="submit" name="num" value="0" 
							tabindex="10" style="width:100%;" >0</button></td>
                        <td><button type="submit" name="op" value="/" tabindex="15" >/</button></td>
                </tr>
                <tr> <td align=center colspan="5">Calculadora PHP</tr>
        </table>
	   <input type="text" name="op1" value="<?php echo $op1 ?>" >
	   <input type="text" name="op2" value="<?php echo $op2 ?>" >
	   <input type="text" name="operador" value="<?php echo $operador ?>" >
	   <input type="text" name="resultado" value="<?php echo $resultado ?>" >
	   <input type="text" name="estado" value="<?php echo $estado ?>" >
	</form>
</body>
</html>

