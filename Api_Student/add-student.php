<?php
require_once('connection.php');

if (!isset($_POST['name']) || !isset($_POST['age']) || !isset($_POST['sdt'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$name = $_POST['name'];
$email = $_POST['age'];
$phone = $_POST['sdt'];

$sql = 'INSERT INTO student(name,age,sdt) VALUES(?,?,?)';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($name, $email, $phone));

    echo json_encode(array('status' => true, 'data' => 'Them sinh vien thanh cong'));
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
