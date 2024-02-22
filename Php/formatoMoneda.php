<?php

$fmoneda=$_GET['Moneda'];

$numeroFormateado = number_format($fmoneda, 2);
echo "Formateado es: \n";
echo '$' . $numeroFormateado;

return ('Moneda');