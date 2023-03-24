<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload file or image</title>
        <?php
            if(isset($_POST['but_upload'])){
                $filename=$_FILES['file']['name'];


                $target_dir="upload/";
                if($filename !=''){

                    $target_file=$target_dir . basename($_FILES['file']['name']);
                    

                    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $extensions_arr=array("pdf","jpeg","png");


                    if(in_array($extension,$extensions_arr)){
                        $file_base64=base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                        $file="data::file/".$extension.";base64,".$file_base64;

            

                        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                            $query="INSERT INTO file(name,file) VALUES ('".$filename."', '".$file."')";
                            mysqli_query($connection,$query);
                        }
                    }
                }
            }

        ?>
    </head>

    <body>
        <form method='post' action='' enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="but_upload" value="Upload">
        </form>
    </body>
</html>