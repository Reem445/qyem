
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد لحجز المرافق الرياضية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       

        body {
            background: linear-gradient(135deg, #003366, #006699, #0099CC);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        header {
            background-color: #006699;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            width: 80%;
            max-width: 900px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
            position: relative;
        }

        .form-container {
            flex-grow: 1;
            padding-right: 20px;
        }

        .table-container {
            flex-grow: 1;
            padding-left: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select,
        table {
            width: 100%;
            padding: 10px;
            border: 2px solid #006699;
            border-radius: 5px;
            background-color: transparent;
            color: #003366;
        }

        input[type="submit"] {
            background-color: #006699;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0099CC;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #006699;
            color: white;
        }

        footer {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            animation: fadeInOut 2s ease-in-out;
            font-size: 20px; /* زيادة حجم الخط */
            width: 300px; /* زيادة عرض النافذة */
            text-align: center; /* محاذاة النص في وسط النافذة */
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1><i class="fas fa-book"></i> تأكيد لحجز المرافق الرياضية</h1>
    </header>
    <div class="container">
        <!-- نموذج إضافة الحجز -->
        <div class="form-container">
            <form action="p1.php" method="POST" id="reservationForm">
                <div class="form-group">
                    <label for="class_name"><i class="fas fa-users"></i> اسم القسم:</label>
                    <input type="text" id="class_name" name="class_name" required>
                </div>
                <div class="form-group">
                    <label for="facility"><i class="fas fa-dumbbell"></i>الصالة:</label>
                    <select id="facility" name="facility">
                        <option value="صالة البادل">صالة البادل</option>
                        <option value="صالة كرة القدم">صالة كرة القدم</option>
                        <option value="المسبح">المسبح</option>
                        <option value="المسبح الاولاد">المسبح الاولاد</option>
                        <option value="البادل">البادل</option>
                        <option value="صالة كرة القدم">صالة كرة القدم</option>
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
                        <option value="الجمعة">الجمعة</option>
                        <option value="السبت">السبت</option>
                    </select>
                </div>
                <input type="button" value="إضافة الحجز" onclick="sendDataAndShowPopup()">
            </form>
        </div>
        <!-- جدول عرض الحجوزات -->
        <div class="table-container">
            <table id="reservationTable">
                <caption>جدول الأوقات المحجوزة لمرافق المدرسة</caption>
                <thead>
                    <tr>
                        <th>الصالة</th>
                        <th>الوقت</th>
                        <th>اليوم</th>
                        <th>اسم القسم</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- الصفوف ستتم إضافتها هنا -->
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <button onclick="window.location.href = 'pag12.html';"><i class="fas fa-home"></i> الصفحة الرئيسية</button>
    </footer>
    <script>
        // تعريف دالة لإظهار النافذة المنبثقة
        function showPopup(message) {
            // إنشاء عنصر div لعرض الرسالة
            var popup = document.createElement('div');
            popup.className = 'popup';
            popup.innerHTML = '<p>' + message + '</p>';

            // إضافة العنصر إلى الصفحة
            document.body.appendChild(popup);

            // إعداد تأثير التحويل البصري
            setTimeout(function () {
                popup.style.opacity = '1';
            }, 100);

            // إزالة النافذة بعد فترة زمنية معينة
            setTimeout(function () {
                popup.style.opacity = '0';
                setTimeout(function () {
                    document.body.removeChild(popup);
                }, 1000);
            }, 6000); // يظهر النافذة لمدة 6 ثواني ثم يتم إزالتها
        }

        // تعريف دالة لإرسال البيانات إلى قاعدة البيانات وإظهار النافذة
        function sendDataAndShowPopup() {
            var formData = new FormData(document.getElementById('reservationForm'));

            fetch('p1.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        showPopup('تم الحجز، شكرًا لك!');
                    } else {
                        showPopup('حدث خطأ أثناء الحجز!');
                    }
                })
                .catch(error => {
                    showPopup('حدث خطأ أثناء الحجز!');
                });
        }
    </script>
</body>

</html>

<?php

include ("conn.php");
if(isset($_POST['send'])){
$fn=$_POST['class_name'];
$ln=$_POST['facility'];
$em=$_POST['time'];
$pa=$_POST['day'];
$sql="insert into form values('$fn','$ln','$em','$pa')";


// تنفيذ الاستعلام
if (mysqli_query($con, $sql)) {
    echo "تم الحجز";
} else {
    // إذا حدث خطأ في الاستعلام، فحاول إدراج قيمة مكررة
    if (mysqli_errno($con) == 1062) {
        echo "خطأ: قيمة مكررة، يرجى إدخال قيمة مختلفة";
    } else {
        echo "خطأ: " . mysqli_error($con);
    }
}
}
// إغلاق الاتصال
mysqli_close($con);

?>