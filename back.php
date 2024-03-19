<?php
// تأسيس اتصال بقاعدة البيانات
$servername = "localhost";
$username = "اسم_مستخدم";
$password = "كلمة_المرور";
$dbname = "اسم_قاعدة_البيانات";

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استلام بيانات النموذج
$product_name = $_POST['product_name'];
$price = $_POST['price'];

// استعلام SQL لإدخال المنتج في جدول السلة
$sql = "INSERT INTO shopping_cart (product_name, price) VALUES ('$product_name', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "تمت إضافة المنتج بنجاح إلى سلة التسوق.";
} else {
    echo "حدث خطأ أثناء إضافة المنتج: " . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>