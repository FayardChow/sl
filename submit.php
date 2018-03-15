<?php

include('config.php');

if(!isset($_POST['user'])) {
    exit();
}

$user = $_POST['user'];
$data = new stdClass();

// 检查名称合法
if(!preg_match('/^[0-9a-zA-z]{3,15}$/', $user)) {
    $data->flag = '-1';
    $json = json_encode($data);    
    exit($json);
}


// 检查重复的提交
$sql = "SELECT * FROM `user_list` WHERE name='$user' ORDER BY id DESC LIMIT 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if(!$row['checked'] && !$row['pass']) {
        $data->flag = '0';
        $json = json_encode($data);    
        exit($json);              
    } 
}

// 检查是否已经通过
$sql = "SELECT * FROM `user_list` WHERE name='$user' AND pass=1 LIMIT 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data->flag = '1';
    $data->url = 'http://xn--rgvz9ywnec40c.com';
    $json = json_encode($data);
    exit($json);
}


// 插入新的提交
$sql = "INSERT INTO user_list (name) values ('$user')";
$result = $conn->query($sql);

if($result) {
    $data->flag = '1';
    $json = json_encode($data);
    exit($json);
}

