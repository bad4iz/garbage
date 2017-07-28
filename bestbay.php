<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 25.07.2017
 * Time: 7:57
 */

require_once 'vendor/autoload.php';
$pages = 1;
if (!empty($_GET['pages'])) {
    $pages = $_GET['pages'];
}


//$url = "https://api.bestbuy.com/v1/products((categoryPath.id=abcat0502000))?apiKey=jseFUuQ6dvbKAk5SgDsKFJgY&show=accessories.sku,addToCartUrl,bestSellingRank,categoryPath.id,categoryPath.name,color,condition,customerReviewAverage,customerReviewCount,description,details.name,details.value,dollarSavings,features.feature,freeShipping,frequentlyPurchasedWith.sku,image,includedItemList.includedItem,inStoreAvailability,inStoreAvailabilityText,longDescription,manufacturer,mobileUrl,modelNumber,name,onlineAvailability,onlineAvailabilityText,onSale,percentSavings,preowned,regularPrice,relatedProducts.sku,salePrice,shipping,shippingCost,shortDescription,sku,thumbnailImage,type,upc,url&pageSize=100&page={$pages}&format=json";
$url = "https://api.bestbuy.com/beta/products/openBox(categoryId=abcat0502000)?apiKey=jseFUuQ6dvbKAk5SgDsKFJgY&pageSize=100&page={$pages}";
//$url = "https://api.bestbuy.com/beta/products/openBox?apiKey=jseFUuQ6dvbKAk5SgDsKFJgY";


//$url = 'https://api.bestbuy.com/v1/products((categoryPath.id=abcat0502000))?apiKey=jseFUuQ6dvbKAk5SgDsKFJgY&show=accessories.sku,addToCartUrl,bestSellingRank,categoryPath.id,categoryPath.name,color,condition,customerReviewAverage,customerReviewCount,description,details.name,details.value,dollarSavings,features.feature,freeShipping,frequentlyPurchasedWith.sku,image,includedItemList.includedItem,inStoreAvailability,inStoreAvailabilityText,longDescription,manufacturer,mobileUrl,modelNumber,name,onlineAvailability,onlineAvailabilityText,onSale,percentSavings,preowned,regularPrice,relatedProducts.sku,salePrice,shipping,shippingCost,shortDescription,sku,thumbnailImage,type,upc,url&pageSize=10&page=4&format=json';
//$response = json_decode(file_get_contents($url));


$ch = curl_init();
// GET запрос указывается в строке URL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
$response = json_decode(curl_exec($ch));
curl_close($ch);


function mySortCondition($f1,$f2)
{
    if($f1->condition < $f2->condition) return -1;
    elseif($f1->condition > $f2->condition) return 1;
    else return 0;
}



//
//d($response);
//d($response->metadata);
//d($response->results);
//d(6666);

$string = '';

?>


<h1>Страница №<?= $response->metadata->page->current ?> из <?= $response->metadata->page->total ?></h1>
<h2>на странице <?= $response->metadata->page->size ?></h2>

<a href="?pages=<?= $pages - 1 ?>">предыдущая</a>
<a href="?pages=<?= $pages + 1 ?>">следующая</a>

    <form  method="get" action="?">
        <input type="text" name="save" placeholder="название файла" >
        <input type="submit" value="save">
    </form>

<style>
    div {
        margin: 20px;
    }

    tr {
        border-bottom: 1px solid #1d1e1e;
    }
</style>
<table>
    <tr>
        <th>sku</th>
        <th>img</th>
        <th>names</th>
        <th>prices regular</th>
        <th>certified </th>
        <th>excellent </th>


    </tr>
    <?
    foreach ($response->results as $product) {
        ?>
        <tr style="bo">
            <td><?= $product->sku ?></td> <?$string.=$product->sku.';'?>
            <td><img style="width: 100px;" src="<?= $product->images->standard ?>" alt=""></td><?$string.= $product->images->standard .";"?>
            <td><?= $product->names->title ?></td><?$string.=$product->names->title.';'?>
            <td><?= $product->prices->regular ?></td><?$string.=$product->prices->regular.';'?>
            <?
                uasort($product->offers,"mySortCondition");
            foreach ($product->offers as $value) {
                ?>

                <td><?= $value->prices->current ?></td>
                <?$string.= $value->prices->current.';'?>
                <?
            } ?>
        </tr>
        <? $string.="\r\n ";
    }
    ?>
</table>


<?
if (!empty($_GET['save'])) {
    file_put_contents($_GET['save'].".csv", $string);
}

