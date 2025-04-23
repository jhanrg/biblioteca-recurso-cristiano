<?php
$target_dir = "uploads/";
$allowed = ['pdf', 'epub', 'txt', 'pptx', 'docx'];

if (isset($_FILES["archivo"])) {
    $file = $_FILES["archivo"];
    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Tipo de archivo no permitido.");
    }

    $unique_name = uniqid("file_", true) . "." . $ext;
    $target_file = $target_dir . $unique_name;

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        header("Location: index.html?url=" . urlencode($unique_name));
        exit();
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
