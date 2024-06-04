<?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الحجز للمرافق الرياضية</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css.css">
    <script src="java.js"></script>
</head>
<body>
<header >
      <img src="qeemwhihout.png" alt="شعار الشركة" ltr>
    <h1><i class="fas fa-book"></i> تأكيد الحجز للمرافق الرياضية</h1> 
  
    
</header>

<div class="container">
    <div class="form-container">
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="class_name"><i class="fas fa-users"></i> اسم القسم:</label>
                <input type="text" id="class_name" name="name" required placeholder="ادخل اسم القسم">
            </div>
            <div class="form-group">
                <label for="facility"><i class="fas fa-dumbbell"></i>الصالة:</label>
                <select id="faility" name="place">
                    <option value="ملعب البادل">ملعب البادل</option>
                    <option value="ملعب كرة القدم">ملعب كرة القدم</option>
                    <option value="المسبح">المسبح</option>
                    <option value="ملعب التنس">ملعب التنس</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time"><i class="far fa-clock"></i> الوقت:</label>
                <select id="time" name="time">
                    <option value="حصة 1">حصة الأولى</option>
                    <option value="حصة 2">حصة الثانية</option>
                    <option value="حصة 3">حصة الثالثة</option>
                    <option value="حصة 4">حصة الرابعة</option>
                    <option value="حصة 5">حصة الخامسة</option>
                    <option value="حصة 6">حصة السادسة</option>
                    <option value="حصة 7">حصة السابعة</option>
                </select>
            </div>
            <div class="form-group">
                <label for="day"><i class="far fa-calendar"></i> اليوم:</label>
                <select id="day" name="day">
                    <option value="الأحد">الأحد</option>
                    <option value="الاثنين">الاثنين</option>
                    <option value="الثلاثاء">الثلاثاء</option>
                    <option value="الأربعاء">الأربعاء</option>
                    <option value="الخميس">الخميس</option>
                </select>
            </div>    
            

    
            <button type="submit" name="sub" class="bu1">إضافة الحجز</button>
      </form> 
    
        <?php
if(isset($_POST['sub'])){
    $class_name = $_POST['name'];
    $place = $_POST['place'];
    $time = $_POST['time'];
    $day = $_POST['day'];

    // التحقق من التعارض
    $check_query = "SELECT * FROM form WHERE place='$place' AND time='$time' AND day='$day'";
    $check_result = mysqli_query($con, $check_query);

    if(mysqli_num_rows($check_result) > 0){
        echo "<script>showPopup('حدث تعارض في الحجز! حاول وقتًا آخر.');</script>";
    } else {
        $queryy = "INSERT INTO form (name, place, time, day) VALUES ('$class_name', '$place', '$time', '$day')";
        if (mysqli_query($con, $queryy)) {
            echo "<script>showPopup('تمت الإضافة بنجاح');</script>";
        } else {
            echo "<script>showPopup('يوجد خطأ: " . mysqli_error($con) . "');</script>";
        }
    }
 


}
?>
    <form method="POST">
        <br>
            <caption>حذف الحجز</caption>
            <input type="text" id="delete_id" name="delete_id" required  placeholder="للحذف ادخل رقم الحجز">
            <input type="submit" name="delete_btn" value="حذف" class="bu1">
        </form>
        <?php
        if(isset($_POST['delete_btn'])){
            $delete_id = $_POST['delete_id'];
            // استعلام حذف البيانات
            
            $sql = "DELETE FROM form WHERE no ='$delete_id'";
            if ($con->query($sql) === TRUE) {
                echo "<script>showPopup('تم الحذف بنجاح');</script>";
                echo '<script>window.location.href = "index.php";</script>';
            } else {
                echo "<script>showPopup('خطأ في الحذف: " . $con->error . "');</script>";
            }
            $con->close();
        }
?>

    </div>
    <div class="table-container">
        <table id="reservationTable">
            <caption>جدول الأوقات المحجوزة لمرافق المدرسة</caption>
            <thead>
                <tr>
                    <th>رقم</th>
                    <th>اسم القسم</th>
                    <th>مرافق</th>
                    <th>الوقت</th>
                    <th>اليوم</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM form";
            $result = mysqli_query($con, $query);
            if($result){
                while($row = mysqli_fetch_array($result)){
                    echo "<tr><td>" . $row['no'] . "</td><td>" . $row['name'] . 
                    "</td><td>" . $row['place'] . "</td><td>" . $row['time'] . 
                    "</td><td>" . $row['day'] . "</td></tr>";
                }
            } else {
                echo "يوجد خطأ";
            }
            ?>
            </tbody>
        </table>
     
    </div>
</div>
<footer>
    <br>
    <a class="bu2" href="pag12.html"><i class="fas fa-home"></i> الرجوع إلى الصفحة الرئيسية</a>
</footer>



</body>
</html>