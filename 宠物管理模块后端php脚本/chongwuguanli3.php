<!DOCTYPE html> 
<html> 
<body> 

<h1>My first PHP page</h1> 

<?php
//连接数据库
include("connection.php");
$id=;//自增id等于多少？
$type=;//0配对、1领养、2转让、3寄养


$sql = "SELECT himg,P_class,breed,nickname,age,sex,supplement FROM notice where type="$type" AND id="$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    //echo "0 结果";
}

if(mysqli_num_rows($result)>0)
{
    $code=1;
}
else{
    $code=0;
}

$json = json_encode(array(
    "code"=>$code,
    "data"=>$data
),JSON_UNESCAPED_UNICODE);

//转换成字符串JSON
echo($json);

$conn->close();
?>


</body> 
</html>