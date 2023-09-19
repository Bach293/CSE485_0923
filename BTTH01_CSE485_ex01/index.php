<?php
//bài 1

echo "Bài 1<br>";
$arrs = [2, 5, 6, 9, 2, 5, 6, 12, 5];
function tinhTong($arr)
{
    return array_sum($arr);
}

function tinhTich($arr)
{
    return array_product($arr);
}

function tinhHieu($arr)
{
    $result = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $result -= $arr[$i];
    }
    return $result;
}

function tinhThuong($arr)
{
    $result = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] != 0) {
            $result /= $arr[$i];
        } else {
            return "Không thể chia cho 0";
        }
    }
    return $result;
}

$tong = tinhTong($arrs);
$tich = tinhTich($arrs);
$hieu = tinhHieu($arrs);
$thuong = tinhThuong($arrs);

echo "Tổng các phần tử = " . implode(' + ', $arrs) . " = $tong<br><br>";
echo "Tích các phần tử = " . implode(' * ', $arrs) . " = $tich<br><br>";
echo "Hiệu các phần tử = " . implode(' - ', $arrs) . " = $hieu<br><br>";
echo "Thương các phần tử = " . implode(' / ', $arrs) . " = $thuong<br><br><br>";
//bài 2
echo "Bài 2<br>";
$arrs = ['đỏ', 'xanh', 'cam', 'trắng'];

$names = ['Anh', 'Sơn', 'Thắng', 'tôi'];

$count = min(count($arrs), count($names));

$result = "";
for ($i = 0; $i < $count; $i++) {
    if ($i == 1) {
        $result .= "\"Màu <span style='color: red; font-weight: bold;'>" . $arrs[3] . " </span>là màu yêu thích của " . $names[$i] . "\"";
    } else {
        $result .= "\"Màu <span style='color: red; font-weight: bold;'>" . $arrs[$i] . " </span>là màu yêu thích của " . $names[$i] . "\"";
    }

    if ($i < $count - 1) {
        $result .= ", ";
    } else {
        $result .= ".";
    }
}

echo "<em>" . $result . "</em><br><br><br>";

//bài 3
echo "Bài 3<br>";
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];

echo "<table style=\"border-collapse: collapse;\">";
echo "<tr><th style=\"border: 3px solid black;\">Tên khóa học</th></tr>";

$i = 1;
foreach ($arrs as $subject) {
    echo "<tr>";
    echo "<td style=\"border: 3px solid black;\">" . $subject . "</td>";
    echo "</tr>";
    $i++;
}

echo "</table><br><br><br>";
//bài 4
echo "Bài 4<br>";
$arrs = array(
    "Italy" => "Rome",
    "Luxembourg" => "Luxembourg",
    "Belgium" => "Brussels",
    "Denmark" => "Copenhagen",
    "Finland" => "Helsinki",
    "France" => "Paris",
    "Slovakia" => "Bratislava",
    "Slovenia" => "Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland" => "Dublin",
    "Netherlands" => "Amsterdam",
    "Portugal" => "Lisbon",
    "Spain" => "Madrid",
    "Sweden" => "Stockholm",
    "United Kingdom" => "London",
    "Cyprus" => "Nicosia",
    "Lithuania" => "Vilnius",
    "Czech Republic" => "Prague",
    "Estonia" => "Tallin",
    "Hungary" => "Budapest",
    "Latvia" => "Riga",
    "Malta" => "Valetta",
    "Austria" => "Vienna",
    "Poland" => "Warsaw"
);

foreach ($arrs as $country => $capital) {
    echo "Thủ đô của $country là $capital<br>";
}
echo "<br><br>";
//bài 5
echo "Bài 5<br>";
$a = [
    'a' => [
        'b' => 0,
        'c' => 1
    ],
    'b' => [
        'e' => 2,
        'o' => [
            'b' => 3
        ]
    ]
];

$valueB = $a['b']['o']['b'];
$valueC = $a['a']['c'];
$infoA = $a['a'];

echo "Giá trị = $valueB với key là 'b'<br>";
echo "Giá trị = $valueC với key là 'c'<br>";
echo "Thông tin của phần tử có key là 'a':<br>";
print_r($infoA);
echo "<br><br><br>";
//bài 6
echo "Bài 6<br>";
$keys = array(
    "field1" => "first",
    "field2" => "second",
    "field3" => "third"
);

$values = array(
    "field1value" => "dinosaur",
    "field2value" => "pig",
    "field3value" => "platypus"
);

$keysAndValues = array_combine($keys, $values);

print_r($keysAndValues);
echo "<br><br>";
//bài 7
echo "Bài 7<br>";
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100, -125, 0];

$result = [];

foreach ($array as $number) {
    if ($number >= 100 && $number <= 200 && $number % 5 === 0) {
        $result[] = $number;
    }
}
echo "Các số từ 100 đến 200 chia hết cho 5 trong mảng: ";
foreach ($result as $number) {
    echo $number . " ";
}
echo "<br><br>";

//bài 8
echo "Bài 8<br>";
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];

$maxLength = 0;
$minLength = PHP_INT_MAX;
$longestString = '';
$shortestString = '';

foreach ($array as $string) {
    $length = strlen($string);

    if ($length > $maxLength) {
        $maxLength = $length;
        $longestString = $string;
    }

    if ($length < $minLength) {
        $minLength = $length;
        $shortestString = $string;
    }
}

echo "Chuỗi lớn nhất là $longestString, độ dài = $maxLength<br>";
echo "Chuỗi nhỏ nhất là $shortestString, độ dài = $minLength<br><br><br>";

//Bài 9
echo "Bài 9<br>";
function convertToLowercase($array)
{
    $result = [];

    foreach ($array as $element) {
        if (is_string($element)) {
            $convertedElement = strtolower($element);
            $result[] = $convertedElement;
        } else {
            $result[] = $element;
        }
    }

    return $result;
}
$arr1 = ['a', 'b', 'ABC'];
$arr2 = ['1', 'B', 'C', 'E'];
$arr3 = ['a', 0, null, false];

$convertedArr1 = convertToLowercase($arr1);
$convertedArr2 = convertToLowercase($arr2);
$convertedArr3 = convertToLowercase($arr3);

print_r($convertedArr1);
print_r($convertedArr2);
print_r($convertedArr3);
echo "<br><br>";

//Bài 10
echo "Bài 10<br>";
function convertToUppercase($array)
{
    $result = [];

    foreach ($array as $element) {
        if (is_string($element)) {
            $convertedElement = strtoupper($element);
            $result[] = $convertedElement;
        } else {
            $result[] = $element;
        }
    }

    return $result;
}
$convertedArr4 = convertToUppercase($arr1);
$convertedArr5 = convertToUppercase($arr2);
$convertedArr6 = convertToUppercase($arr3);

print_r($convertedArr4);
print_r($convertedArr5);
print_r($convertedArr6);
echo "<br><br>";

//Bài 11
echo "Bài 11<br>";
$array = array(1, 2, 3, 4, 5);

array_splice($array, 2, 1);

print_r($array);
echo "<br><br>";

//Bài 12
echo "Bài 12<br>";
$numbers = [
    'key1' => 12,
    'key2' => 30,
    'key3' => 4,
    'key4' => -123,
    'key5' => 1234,
    'key6' => -12565,
];

$firstElement = reset($numbers);
$lastElement = end($numbers);

$maximum = max($numbers);
$minimum = min($numbers);
$sum = array_sum($numbers);

$ascendingValues = $numbers;
asort($ascendingValues);

$descendingValues = $numbers;
arsort($descendingValues);

$ascendingKeys = $numbers;
ksort($ascendingKeys);

$descendingKeys = $numbers;
krsort($descendingKeys);

echo "Phần tử đầu tiên: $firstElement<br>";
echo "Phần tử cuối cùng: $lastElement<br>";
echo "Số lớn nhất: $maximum<br>";
echo "Số nhỏ nhất: $minimum<br>";
echo "Tổng các giá trị: $sum<br>";

echo "Mảng sắp xếp theo chiều tăng giá trị:<br>";
print_r($ascendingValues);
echo "<br>";

echo "Mảng sắp xếp theo chiều giảm giá trị:<br>";
print_r($descendingValues);
echo "<br>";

echo "Mảng sắp xếp theo chiều tăng key:<br>";
print_r($ascendingKeys);
echo "<br>";

echo "Mảng sắp xếp theo chiều giảm key:<br>";
print_r($descendingKeys);
echo "<br><br>";

//Bài 13
echo "Bài 13<br>";
$numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];

$average = array_sum($numbers) / count($numbers);

$greaterThanAverage = [];
foreach ($numbers as $number) {
    if ($number > $average) {
        $greaterThanAverage[] = $number;
    }
}

$lessThanOrEqualAverage = [];
foreach ($numbers as $number) {
    if ($number <= $average) {
        $lessThanOrEqualAverage[] = $number;
    }
}

echo "Giá trị trung bình của mảng: $average<br>";

echo "Các số lớn hơn giá trị trung bình: ";
foreach ($greaterThanAverage as $number) {
    echo "$number ";
}
echo "<br>";

echo "Các số nhỏ hơn hoặc bằng giá trị trung bình: ";
foreach ($lessThanOrEqualAverage as $number) {
    echo "$number ";
}
echo "<br><br>";

//Bài 14
echo "Bài 14<br>";
$array1 = [
    [77, 87],
    [23, 45]
];
$array2 = [
    'giá trị 1', 'giá trị 2'
];

$result = [];

for ($i = 0; $i < count($array1); $i++) {
    $result[$i] = array_merge([$array2[$i]], $array1[$i]);
}

print_r($result);
?>
