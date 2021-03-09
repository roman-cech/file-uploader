<?php
$target_dir = "../files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$newFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$newFileName = $target_dir .basename($_FILES['fileToUpload']["name"],".".$newFileType).time();


/** @var $renameInput */
$renameInput = $_POST['getNewName'];


/** @var $editedName */
$editedName = $target_dir . $_POST['getNewName']. ":".time();

/** @IF_STATEMENT
 * UPLOAD FILES
 */
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $editedName)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}


header("Location:index.php");