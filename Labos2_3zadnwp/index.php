<!-- 
Napraviti skriptu koja će parsirati XML datoteku LV2.xml. U XML datoteci se nalazi popis
od 100 osoba sa podacima (id,ime,prezime,email,spol,slika,zivotopis). 
Od dobivenih podataka napraviti profil osobe sa prikazom slike, imena, 
prezimena, email-a i životopisa.
-->

<?php
$xml = file_get_contents('LV2.xml');
$xml = preg_replace('#&(?=[a-z_0-9]+=)#', '&amp;', $xml);
$sxe = simplexml_load_string($xml);

foreach($sxe->record as $record){
    foreach($record->slika as $slika){
        echo '<div><img src="' . $slika . '"/></div>';
    }
    echo "<p>Ime: $record->ime </p> <br>";
    echo "<p>Prezime: $record->prezime </p> <br>";
    echo "<p>E-mail: $record->email</p><br>";
    echo "<p>Životopis: $record->zivotopis</p><br>";
    echo "-----------------------------------------";
}


?>