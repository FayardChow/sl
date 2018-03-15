<?php
include('config.php');

if(!isset($_COOKIE['user'])) {
    exit();
}

$user = $_COOKIE['user'];
$data = new stdClass();

// 检查名称合法
if(!preg_match('/^[0-9a-zA-z]{3,15}$/', $user)) {   
    exit('用户名不合法');
}

$sql = "SELECT * FROM user_list WHERE name='$user' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);


if ($row = $result->fetch_assoc()) {
    

    // 已经审核
    if($row['checked']) {

        // 审核通过
        if($row['pass']) {
            $data->flag = '1';
            $data->url = 'http://xn--rgvz9ywnec40c.com';
        // 审核不通过
        } else {
            $data->flag = '-1';
            $msg = $row['msg'] ? $row['msg'] : '抱歉您的申请未通过<br>';
            $data->msg = $msg;
        }

    // 未审核
    } else {
        $data->flag = '0';
        $data->msg = '系统正在审核，请稍候';
    }



}



$json = json_encode($data);
echo $json;