<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 处理文本内容
    if (isset($_POST["textContent"])) {
        $textContent = $_POST["textContent"];
        // 保存文本内容到文件或数据库
        file_put_contents("content.txt", $textContent);

        // 可以在这里添加代码将内容发布到网页上
        // 例如，可以直接写入到一个HTML文件中
        file_put_contents("content.html", $textContent);
    }

    // 处理文件上传
    if (isset($_FILES["fileToUpload"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "文件 ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " 已上传。";
        } else {
            echo "上传文件时出错。";
        }
    }
}
?>
