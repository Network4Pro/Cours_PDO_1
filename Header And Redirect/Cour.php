<?php 

// echo "<a href='test.php'>Test</a>";

// header("Location:test.php");

header("Refresh:5; url=test.php");

/* 
 * Envoi une en-tete HTTP brut 
 * header(string $header, bool $replace = true, int $response_code = 0): void
 * permet de spécifier l'en-tete HTTP string lors de l'envoi des fichiers HTML 

*/