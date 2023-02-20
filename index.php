<?php
//$apiKey = "AIzaSyDzwySvKRx5a9SVZGHO91ag7k7o-JQaWqE";
$apiKey = "AIzaSyCe-ASsKq_qnxzHwNEb-6cBsqWYs8OnAcQ";
//$cx = "53ad2738ccbb1402b";
$cx = "82f16a1af7a2f42b6";
$search = "chatgpt";

if (isset($_GET['search'])){
    $search = $_GET['search'];

}
$url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";
$ch = curl_init ( ) ; // відкрити сеанс cURL
curl_setopt ($ch, CURLOPT_URL, $url); // встановити параметр $ url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Повернути відповідь в рядок
$resultJson = curl_exec ($ch); // Виконати запит
curl_close ($ch);
$arr = json_decode($resultJson, true);
//var_dump($resultJson);
//die();
// var_dump($arr);
// die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</ form >
<?php
foreach ($arr['items'] as $item) {
    echo '<p>'.$item['title'] . '</p>';
    echo "<a href='{$item['link']}'>".$item['link'] . '</a>';
}
?>
<!--<script async src="https://cse.google.com/cse.js?cx=53ad2738ccbb1402b">-->
<!--</script>-->
<!--<div class="gcse-search"></div>-->
</body>
</html>
