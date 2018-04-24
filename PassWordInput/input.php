<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2018/4/23
 * Time: 8:54
 */
echo "开始链接"."<br>";
$conn = new mysqli('localhost:3306','root','123456zaq');
//$link =

if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
echo "数据库连接成功"."<br>";
    session_start();
    $id = $_POST["id"];
    $pwd = $_POST["password"];
    echo "id：".$id."<br>";
    echo "pwd：".$pwd."<br>";
    $_SESSION["userName"] = $id;
    $_SESSION["pwd"] = $pwd;
if($id && $pwd ){

    $sql = "SELECT * FROM `user_list` WHERE `Id` LIKE '$id' AND `password` LIKE '$pwd' ";
    mysqli_select_db($conn,"users");
    $result = mysqli_query( $conn, $sql );
//    print_r($result->num_rows);
    if($result->num_rows == 1)
    {
        echo "登陆成功";
    }else{
        echo "登陆失败";
    }
}else {
    echo "数据传入失败<br>";
}