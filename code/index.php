<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

$tp = new TampilMahasiswa();

// Handling CRUD operations
if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    
    switch ($aksi) {
        case 'edit':
            // Display form to edit data
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tp->tampilForm($id);
            }
            break;
            
        case 'create':
            // Process form submission to add new data
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $tempat = $_POST['tempat'];
                $tl = $_POST['tl'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                
                $presenter = new ProsesMahasiswa();
                $presenter->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
                
                // Redirect to index page
                header("Location: index.php");
            }
            break;
            
        case 'update':
            // Process form submission to update data
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'];
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $tempat = $_POST['tempat'];
                $tl = $_POST['tl'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                
                $presenter = new ProsesMahasiswa();
                $presenter->updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
                
                // Redirect to index page
                header("Location: index.php");
            }
            break;
            
        case 'delete':
            // Process request to delete data
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                
                $presenter = new ProsesMahasiswa();
                $presenter->deleteMahasiswa($id);
                
                // Redirect to index page
                header("Location: index.php");
            }
            break;
            
        default:
            // Display list of data with default form
            $tp->tampil();
            break;
    }
} else {
    // Display list of data with default form
    $tp->tampil();
}