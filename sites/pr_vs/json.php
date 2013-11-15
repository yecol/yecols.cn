<?php
	if(!headers_sent())
   header('Content-Type: application/json; charset=utf-8', true,200);
?>

<?php
    $imageBytes = file_get_contents("php://input");
	
	echo "hello".strlen($imageBytes)."hello";
	
	var_dump($imageBytes);

?>
{
    "ret": 0,
    "count": 1,
    "results": [
        {
            "count": 3,
            "result": [
                {
                    "shopId": "shopid123441",
                    "productId": "32131231231",
                    "class1": "衣服类",
                    "class2": "女装",
                    "class3": "裙子",
                    "original": "assets/img/snap.jpg",
                    "snap": "assets/img/snap.jpg",
                    "name": "衣服1",
                    "price": 29.9,
                    "url": "http://auction1.paipai.com/search/0/24CB3F90000000000401000000D8FC69-194F.html"
                },
                {
                    "shopId": "shopid123442",
                    "productId": "32131231232",
                    "class1": "衣服类",
                    "class2": "女装",
                    "class3": "裙子",
                    "original": "assets/img/snap.jpg",
                    "snap": "assets/img/snap.jpg",
                    "name": "衣服2",
                    "price": 29.9,
                    "url": "http://auction1.paipai.com/search/0/24CB3F90000000000401000000D8FC69-194F.html"
                },
                {
                    "shopId": "shopid123443",
                    "productId": "32131231233",
                    "class1": "衣服类",
                    "class2": "女装",
                    "class3": "裙子",
                    "original": "assets/img/snap.jpg",
                    "snap": "assets/img/snap.jpg",
                    "name": "衣服3",
                    "price": 29.9,
                    "url": "http://auction1.paipai.com/search/0/24CB3F90000000000401000000D8FC69-194F.html"
                }
            ]
        }
    ]
}