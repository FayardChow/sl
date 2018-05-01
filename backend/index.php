<?php
include('../config.php');

$sql = "SELECT * FROM user_list";
$result = $conn->query($sql);
$numrows = $result->num_rows;


?>

<!DOCTYPE>
<html lang="en">
<head>
    <meta chase="utf-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
    .layui-layer {
        left: 500px!important;
        top: 200px!important;
    }
    </style>
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">后台</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">申请列表<span class="sr-only">(current)</span></a></li>
        <!-- <li><a href="#">Link</a></li> -->
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<table class="table table-hover">
<thead>
<tr>
	<th>
		id
	</th>
	<th>
		用户名
	</th>
	<th>
		提交时间
    </th>
	<th>
		通过(是/否)
    </th>     
	<th>
		拒绝原因
    </th>
	<th>
		操作
	</th>      
</tr>
</thead>
<tbody>
<?php

$sql = 1;

$pagesize = 30;
$pages = intval($numrows/$pagesize);
if ($numrows%$pagesize) {
    $pages++;
}
if (isset($_GET['page'])) {
    $page=intval($_GET['page']);
}
else {
    $page=1;
}
$offset=$pagesize*($page - 1);

$rs=$conn->query("SELECT * FROM user_list WHERE{$sql} order by id desc limit $offset,$pagesize");
while($row = $rs->fetch_assoc()) {
    $pass = $row['pass']?'是':'否';
    echo '<tr';
    if(!$row['checked']) {
        echo ' class="info"';
    } elseif($row['pass']) {
        echo ' class="success"';
    }
    echo '><th scope="row">'.$row['id'].'</th><td>'.$row['name'].'</td><td>'.$row['time'].'</td><td>'.$pass.'</td><td>'.$row['reason'].'</td><td><button type="button" class="btn btn-success pass" data-id="'.$row['id'].'">通过</button><button type="button" class="btn btn-danger deny" data-id="'.$row['id'].'">拒绝</button></td></tr>';
}
?>
</tbody>
</table>

<nav aria-label="Page navigation pagination-lg">
<?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)    {
    echo '<li><a href="index.php?page='.$first.'">首页</a></li>';
    echo '<li><a href="index.php?page='.$prev.'">&laquo;</a></li>';
} else {
    echo '<li class="disabled"><a>首页</a></li>';
    echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++) {
    echo '<li><a href="index.php?page='.$i.'">'.$i .'</a></li>';
    echo '<li class="disabled"><a>'.$page.'</a></li>';
}
if ($page<$pages)   {
    echo '<li><a href="index.php?page='.$next.'">&raquo;</a></li>';
    echo '<li><a href="index.php?page='.$last.'">尾页</a></li>';
} else {
    echo '<li class="disabled"><a>&raquo;</a></li>';
    echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
?>
</nav>

</div>
<audio id="new">
    <source = src="/images/new.mp3" type="audio/mp3" loop="loop">
</audio>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="../layer/layer.js"></script>
<script>
    $(function() {
        $('.pass').click(function() {

            $.post('./edit.php', {id: $(this).attr('data-id'), type: 'pass'}, function(data) {
                if(data.indexOf('1') >= 0) {
                    layer.alert('操作成功！存款50元以上请记得添加彩金');
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                    
                } else {
                    layer.alert('操作失败！');
                }
            })
        })

        $('.deny').click(function() {
            var editId = $(this).attr('data-id');
            layer.confirm('请选择拒绝的原因', {
                btn: ['未注册','未存款'] //按钮
                }, function(){
                    var msg = '抱歉您的申请未通过<br>您提交的账号，尚未在中福彩票(50032.com)注册并成功充值10元以上，请<a href="http://zf8859.com" target="_blank" style="color:blue;">点击这里</a>前往注册存款</span>';
                    edit(msg, editId, '未注册');
                }, function(){
                    var msg = '抱歉您的申请未通过<br>您提交的账号在中福彩票中存款未达到10元以上，成人视频网站带宽费用昂贵，还请多多支持哟, 请<a href="http://zf8859.com" target="_blank" style="color: blue">点击这里</a>前往存款10元以上';
                    edit(msg, editId, '未存款');
            });
            function edit(msg, id, reason) {
                $.post('./edit.php', {id: id, type: 'deny', msg: msg, reason: reason}, function(data) {
                    if(data.indexOf('1') >= 0) {
                        layer.msg('操作成功！');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        layer.alert('操作失败！');
                    }                
                })
            }

        })

        var timer = setInterval(() => {
            $.post('./edit.php', {type: 'new'}, function(data) {
                if(data.indexOf('1') >= 0) {
                    var audio = document.getElementById("new");
                    audio.play();
                    if(!getCookie('reload')) {
                        setCookie60('reload', 1);
                        location.reload();
                    }
                } else {
                    delCookie('reload');
                }
            })
        }, 5000)

    })


    // 获取cookie
    function getCookie(name) {
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        if (arr = document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    } 
    // 设置60分钟cookie
    function setCookie60(name, value) {
        var exp = new Date();
        exp.setTime(exp.getTime() + 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();			
    }    

    // 删除cookie
    function delCookie(name) {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval = getCookie(name);
        if (cval != null)
            document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
    }  

</script>
</body>
</html>
