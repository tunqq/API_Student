<?php
require_once('connection.php');

if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['age']) || !isset($_POST['sdt'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['age'];
$phone = $_POST['sdt'];

$sql = 'UPDATE student set name = ?, age = ?, sdt = ? where id = ?';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($name, $email, $phone, $id));

    $count = $stmt->rowCount();

    if ($count == 1) {
        echo json_encode(array('status' => true, 'data' => 'Cap nhat thanh cong'));
    } else {
        die(json_encode(array('status' => false, 'data' => 'Cap nhat that bai')));
    }
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
