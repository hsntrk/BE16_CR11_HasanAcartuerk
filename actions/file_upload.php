<?php
require_once "db_connect.php";

function file_upload($picture, $source = 'user')
{
    $result = new stdClass();
    $result->fileName = 'avatar.png';
    if (isset($_SESSION['adm'])) {
        $result->fileName = 'animal.png';
    }
    $result->error = 1;
    $fileName = $picture["name"];
    $fileType = $picture["type"];
    $fileTmpName = $picture["tmp_name"];
    $fileError = $picture["error"];
    $fileSize = $picture["size"];
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
                    if ($source == 'animal') {
                        $destination = "../../pictures/$fileNewName";
                    } elseif ($source == 'user') {
                        $destination = "pictures/$fileNewName";
                    }
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