<?php
require_once('connection.php');

if (!isset($_GET['id'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$id = $_GET['id'];

$sql = 'SELECT * FROM student where id = ?';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($id));
    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
    echo json_encode(array('status' => true, 'data' => $data));
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
