<?php

// Hàm kết nối CSDL qua PDO
function connectDB() {
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch (PDOException $e) {
        echo "Kết nối thất bại: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        exit;
    }
}

function uploadFile($file, $folderUpload) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        return null;
    }

    if ($file['size'] > 5 * 1024 * 1024) { 
        return null; 
    }

    $pathStorage = $folderUpload . time() . '_' . basename($file['name']);
    $from = $file['tmp_name']; 
    $to = PATH_ROOT . $pathStorage; 

    if (move_uploaded_file($from, $to)) {
        return $pathStorage; 
    }

    return null; 
}

function deleteFile($fileName)
{
    $filePath = './uploads/' . $fileName;
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}



function deleteSessionError() {
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
}

        function uploadFileAlbum($file, $folderUpload, $key) {
            if ($file['error'][$key] !== UPLOAD_ERR_OK) {
                return null; 
            }

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = pathinfo($file['name'][$key], PATHINFO_EXTENSION);
            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                return null; 
            }

            if ($file['size'][$key] > 5 * 1024 * 1024) {
                return null; 
            }

            $pathStorage = $folderUpload . time() . '_' . basename($file['name'][$key]);
            $from = $file['tmp_name'][$key]; 
            $to = PATH_ROOT . $pathStorage;

            if (move_uploaded_file($from, $to)) {
                return $pathStorage; 
            }

            return null; 
        }


?>
