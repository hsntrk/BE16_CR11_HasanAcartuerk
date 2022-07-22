<?php
require_once "db_connect.php";

function file_upload($image)
{
    $result = new stdClass();
    $result->fileName = 'product.png';
    $result->error = 1;
    $fileName = $image["name"];
    $fileType = $image["type"];
    $fileTmpName = $image["tmp_name"];
    $fileError = $image["error"];
    $fileSize = $image["size"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $filesAllowed = ["png", "jpg", "jpeg"];
    if ($fileError == 4) {
        $result->ErrorMessage = "No picture was chosen";
        return $result;
    } else {
        if (in_array($fileExtension, $filesAllowed)) {
            if ($fileError == 0) {
                if ($fileSize < 5000000) {
                    $fileNewName = uniqid('') . "." . $fileExtension;
                    $destination = "../pictures/$fileNewName";
                    if (move_uploaded_file($fileTmpName, $destination)) {
                        $result->error = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                    } else {
                        $result->ErrorMessage = "There was an error";
                        return $result;
                    }
                } else {
                    $result->ErrorMessage = "Exceeded file size";
                    return $result;
                }
            } else {
                $result->ErrorMessage = "There was a problem uploading the file";
                return $result;
            }
        } else {
            $result->ErrorMessage = "File type not allowed";
            return $result;
        }
    }
}