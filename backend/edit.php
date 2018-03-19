<?php
include('../config.php');

// 通过/拒绝 操作
if(isset($_POST['id']) && isset($_POST['type'])) {
    $sql = "UPDATE user_list SET CHECKED=1 WHERE id='".$_POST['id']."'";
    $result1 = $conn->query($sql);

    if($_POST['type'] == 'pass') {
        $sql = "UPDATE user_list SET pass=1, reason='' WHERE id='".$_POST['id']."'";
        $result2 = $conn->query($sql);        
    } else {
        $sql = "UPDATE user_list SET pass=0, msg='".$_POST['msg']."', reason='".$_POST['reason']."' WHERE id='".$_POST['id']."'";
        $result2 = $conn->query($sql);         
    }

    if($result1 && $result2) {
        exit('1');
    } else {
        exit('0');
    }
}

// 确认新的提交
if(isset($_POST['type'])) {
    if($_POST['type'] == 'new') {
        $sql = "SELECT id FROM user_list WHERE checked is null LIMIT 1";
        $result = $conn->query($sql);           
        if ($row = $result->fetch_assoc()) {
            exit('1');
        } else {
            exit('0');
        }
    }
}


