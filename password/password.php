<?php

//! PROBLEMA

//! Deve validare la password solo per le seguenti condizioni:

    // Deve contenere almeno 8 caratteri
    
    // Deve contenere almeno 1 lettera maiuscola
    
    // Deve contenere almeno un numero
    
    // Deve contenere almeno un carattere speciale
    
    

//? SOLUZIONE

//? Leggere dalla console la password

// $password = readline("prego, inserire la password:"); // simile alla funzione prompt in JS

//? Deve contenere almeno 8 caratteri

//Utilizziamo strlen e creo una condizione if (se questa condizione viene rispettata allora true)
// $checkLenght = false;

// if (strlen($password)>=8) { //strlen restituisce un intero e fa si di non avere un loop infinito
//     $checkLenght = true;
// }

// var_dump($checkLenght);

//? Deve contenere almeno 1 lettera maiuscola

// $checkUpper = false;

// for ($i = 0; $i < strlen($password); $i++) {
//     if (ctype_upper($password[$i])) {
//         $checkUpper = true;
//     }
// }

// var_dump($checkUpper);

//? Deve contenere almeno un numero

//per i numeri utilizziamo is_numeric

// $checkNumber = false;
// for ($i = 0; $i < strlen($password); $i++) {
//     if(is_numeric($password[$i])) {
//         $checkNumber = true;
//     }
// }

// var_dump($checkNumber);

//? Deve contenere almeno un carattere speciale

// Carattere speciale - all'interno del for metto un foreach
// $checkSpecial = false;
// $specialChars = ["!","@","#","$","%", "^", "°", "#", "§", "-", "_", ":", ".", ",", "*", "=", "+", "£", "(", ")", "'", ];

// for ($i=0; $i < strlen($password) ; $i++) { 
//     foreach ($specialChars as $specialChar) {
//         if($password[$i] == $specialChar){
//             $checkSpecial = true; 
//         }     
//     }
// }
                
// var_dump($checkSpecial);
    
    
?>
<!-- ---------------------------------------------------------------------------------------------------------------- -->
<?php

//! EXTRA 2: 
   //? Implementare un metodo che faccia reinserire la password, qualora le regole non fossero rispettate e che interrompa.
        //? il programma in caso di password accettata.

//! EXTRA 3: 

//? Visualizzare eventualmente quale campo non e’ stato inserito.


function checkPassword($password)
{
    $errors = array();

    // Verifica lunghezza
    if (strlen($password) < 8) {
        $errors[] = "La password deve contenere almeno 8 caratteri.";
    }

    // Verifica lettera maiuscola, utilizzo funzione preg_match
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "La password deve contenere almeno una lettera maiuscola.";
    }

    // Verifica numero
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "La password deve contenere almeno un numero.";
    }

    // Verifica carattere speciale
    if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        $errors[] = "La password deve contenere almeno un carattere speciale.";
    }

    return $errors;
}

$passwordAccepted = false;

while (!$passwordAccepted) {
    $password = readline("Inserire la password: ");

    $passwordErrors = checkPassword($password);

    if (count($passwordErrors) > 0) {
        echo "La password inserita non è valida. Sono stati rilevati i seguenti errori:\n";
        foreach ($passwordErrors as $error) {
            echo "- " . $error . "\n";
        }
    } else {
        echo "La password ha superato l'esame! Congratulazioni!\n";
        $passwordAccepted = true;
    }
}

?>
