<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 4px;
        text-align: right;
        border-bottom: 1px solid #ddd;
    }
</style>
<body>
<form method="post" action="">
    Từ: <input id="from" type="date" name="from" placeholder="yyyyy/mm/dd"/>
    Đến: <input id="to" type="date" name="to" placeholder="yyyy/mm/dd"/>
    <input type="submit" id="submit" value="Lọc"/>
    <table border="0">
        <caption><h1>Danh sách khách hàng</h1></caption>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
        </tr>
        <?php
        $customerlist = array(
            "1" => array("name" => "Trịnh Thị Lan", "day_of_birth" => "1990/08/12", "address" => "Hồ Chí Minh", "profile" => "images/1.jpg"),
            "2" => array("name" => "Nguyễn Thị Hoa", "day_of_birth" => "1992/06/13", "address" => "Hà Nội", "profile" => "images/2.jpg"),
            "3" => array("name" => "Vũ Thị Hương", "day_of_birth" => "1991/05/18", "address" => "Đà Nẵng", "profile" => "images/3.jpg"),
            "4" => array("name" => "Lê Thị Trà", "day_of_birth" => "1990/05/04", "address" => "Nghệ An", "profile" => "images/4.jpg"),
            "5" => array("name" => "Hoàng Xuân Nhi", "day_of_birth" => "1993/07/08", "address" => "Huế", "profile" => "images/5.jpg"),
            "6" => array("name" => "Trịnh Cao Cường", "day_of_birth" => "1992/04/06", "address" => "Hồ Chí Minh", "profile" => "images/6.jpg")
        );
        $arr = [];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $totalFrom = strtotime($from);
        $totalTo = strtotime($to);
        if(empty($from)&&empty($to)) {
            $arr = $customerlist;
        }else{
            foreach ($customerlist as $key => $value) {
                $totalIndex = strtotime($value["day_of_birth"]);
                if ($totalIndex >= $totalFrom && $totalIndex <= $totalTo) {
                    $arr[] = $customerlist[$key];
                }
            }
        }
        foreach ($arr as $key => $values) {
            echo "<tr>";
            echo "<td>" . $key . "</td>";
            echo "<td>" . $values['name'] . "</td>";
            echo "<td>" . $values['day_of_birth'] . "</td>";
            echo "<td>" . $values['address'] . "</td>";
            echo "<td><image src ='" . $values['profile'] . "' width = '140px' height ='140px'/></td>";
            echo "</tr>";
        }
        ?>
</form>

</body>
</html>

