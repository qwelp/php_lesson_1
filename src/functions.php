<?php
function task1($file)
{
    $xml = simplexml_load_file($file);

    $html = "";
    $html .= "<h2>Адреса</h2>";

    $PurchaseOrderNumber = $xml->attributes()->PurchaseOrderNumber->__toString();
    $OrderDate = $xml->attributes()->OrderDate->__toString();

    $html .= "<div>PurchaseOrderNumber: $PurchaseOrderNumber</div>";
    $html .= "<div>PurchaseOrder: $OrderDate</div>";

    $i = 0;
    foreach ($xml->Address as $item) {
        $html .= "<ul>";
        $type = $xml->Address[$i++]->attributes()->Type->__toString();
        $html .= "<li>Type: $type</li>";
        $html .= "<li>Имя: $item->Name</li>";
        $html .= "<li>Улица: $item->Street</li>";
        $html .= "<li>Город: $item->City</li>";
        $html .= "<li>Штат: $item->State</li>";
        $html .= "<li>Код: $item->Zip</li>";
        $html .= "<li>Страна: $item->Country</li>";
        $html .= "</ul>";
    }
    $html .= "<div>DeliveryNotes: $xml->DeliveryNotes</div>";

    $html .= "<h2>Товары</h2>";

    $i = 0;
    foreach ($xml->Items->Item as $item) {
        $PartNumber = $xml->Items->Item[$i++]->attributes()->PartNumber->__toString();
        $html .= "<ul>";
        $html .= "<li>PartNumber: $PartNumber</li>";
        $html .= "<li>Название: $item->ProductName</li>";
        $html .= "<li>Кол-во: $item->Quantity</li>";
        $html .= "<li>Цена: $item->USPrice</li>";
        $html .= "<li>Комментарий: $item->Comment</li>";
        $html .= "</ul>";
    }
    echo $html;
}

function task2()
{
    $array = [
        "0" => [
            "SECTION" => "РАЗДЕЛ",
            "ITEMS" => [
                ["NAME" => "Название 1"],
                ["NAME" => "Название 2"],
                ["NAME" => "Название 3"],
            ]
        ]
    ];
    $arJson = json_encode($array, JSON_UNESCAPED_UNICODE);
    $filename = 'output.json';
    $filename2 = 'output2.json';

    if (file_exists($filename)) {
        unlink($filename);
    }

    if (file_exists($filename2)) {
        unlink($filename2);
    }

    file_put_contents($filename, $arJson);
    $data = file_get_contents($filename);
    $decoded = json_decode($data, true);

    $array2 = [
        "1" => [
            "SECTION" => "РАЗДЕЛ 2",
            "ITEMS" => [
                ["NAME" => "Название 1"],
                ["NAME" => "Название 2"],
                ["NAME" => "Название 3"],
            ]
        ]
    ];

    if(rand(1,10) > 5){
        $newData = array_merge($decoded, $array2);
        file_put_contents($filename2, json_encode($newData, JSON_UNESCAPED_UNICODE));
    }
}

function task3()
{
    $arData = [];
    for ($i = 0; $i <= 50; $i++){
        $arData[] = rand(1,100);
    }
    $data[] = $arData;

    $fp = fopen('./test.csv', 'w');
    foreach ($data as $fields) {
        fputcsv($fp, $fields, ';');
    }
    fclose($fp);

    $csvFile = fopen('./test.csv', "r");
    if ($csvFile) {
        $res = [];
        while (($csvData = fgetcsv($csvFile, 300, ";")) !== false) {
            $res[] = $csvData;
        }
    }
    fclose($csvFile);

    $count = 0;
    foreach ($res[0] as $int){
        $count = $count + $int;
    }
    echo "Сумма всех чисел: $count";
}

function task4()
{
    $pageUrl = file_get_contents("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
    $pageJson = json_decode($pageUrl, true);

    echo "title: {$pageJson['query']['pages']['15580374']['title']}<br>";
    echo "pageid: {$pageJson['query']['pages']['15580374']['pageid']}<br>";
}



























