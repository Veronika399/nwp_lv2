<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name="radovi";

$dir = "C:/xampp/htdocs/Labos2_1zadnwp/$db_name";
if (!is_dir($dir)) {
    if (!@mkdir($dir)) {
        die("<p>Ne možemo stvoriti direktorij $dir.</p></body></html>");
    }
}

$time = time();

$connection = mysqli_connect($server_name, $user_name, $password, $db_name);
if (!$connection) {
  die("Fail". mysqli_connect_error());
}
echo "Connected";

$r=mysqli_query($connection,'SHOW TABLES');

if(mysqli_num_rows($r)>0){
    echo "<p>Backup za bazu podataka '$db_name'. </p> ";
    while(list($table)=mysqli_fetch_array($r, MYSQLI_NUM)){
        $q="SELECT * FROM $table";
        $r2=mysqli_query($connection, $q);

        if(mysqli_num_rows($r2)>0){
            if($fp=fopen("$dir/{$table}_{$time}.txt",'w9')){

                while($row=mysqli_fetch_array($r2, MYSQLI_NUM)){
                    fwrite($fp, "INSERT INTO $db_name (id,naziv_rada,tekst_rada, link_rada, oib_tvrtke) VALUES ");
                    foreach($row as $value){
                        $value=addslashes($value);
                        fwrite($fp,"'$value'");
                        if ($value != end($row)) {
                            fwrite($fp, ", ");
                        } else {
                            fwrite($fp, ")\";");
                        }
                    }

                    fwrite($fp, "\n");
                }

                fclose($fp);
                echo "<p>Tablica '$table' je pohranjena.</p>";
            }
        }
    }
} else{
    echo "<p>Baza $db_name ne sadrži tablice.</p>";
}

?>