<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 25.07.2017
 * Time: 7:57
 */

require_once 'vendor/autoload.php';
$pages = 1;
if (!empty($_GET['pages'])){
    $pages = $_GET['pages'];
}


//$url = "https://api.bestbuy.com/v1/products((categoryPath.id=abcat0502000))?apiKey=jseFUuQ6dvbKAk5SgDsKFJgY&show=accessories.sku,addToCartUrl,bestSellingRank,categoryPath.id,categoryPath.name,color,condition,customerReviewAverage,customerReviewCount,description,details.name,details.value,dollarSavings,features.feature,freeShipping,frequentlyPurchasedWith.sku,image,includedItemList.includedItem,inStoreAvailability,inStoreAvailabilityText,longDescription,manufacturer,mobileUrl,modelNumber,name,onlineAvailability,onlineAvailabilityText,onSale,percentSavings,preowned,regularPrice,relatedProducts.sku,salePrice,shipping,shippingCost,shortDescription,sku,thumbnailImage,type,upc,url&pageSize=100&page={$pages}&format=json";
$url = "https://api.bestbuy.com/beta/products/openBox(categoryPath.id=abcat0502000)?apiKey=jseFUuQ6dvbKAk5SgDsKFJgY";
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


//
//d($response);
$pages +=1;
d($response);

?>
<form  method="get" action="?">
    <input type="text" name="pages" value="<?=$pages?>">
    <input type="submit">
</form>
<a href="./?page=<?=$pages?>">sssssssssssssssssssssssssssssssss ./?page=<?=$pages?></a>
<style>
    div {
        margin: 20px;
    }

    tr {
        border-bottom: 1px solid #1d1e1e;
    }
</style>

<?
foreach ($response->products as $product) {
//    d($product->color);
    if ($product->regularPrice != $product->salePrice ) {
        ?>

        <div>
            <img src="<?= $product->thumbnailImage ?>" alt="">
            <div>shortDescription = <?= $product->shortDescription ?></div>
            <div>color = <?= $product->color ?></div>
            <div>sku = <?= $product->sku ?></div>
            <div>regularPrice = <?= $product->regularPrice ?></div>
            <div>salePrice = <?= $product->salePrice ?></div>
            <div>condition <?= $product->condition ?></div>
        </div>

        <table>
            <?
            foreach ($product->details as $detail) {
                ?>
                <tr>
                    <td><?= $detail->name ?></td>
                    <td><?= $detail->value ?></td>
                </tr>
                <?
            } ?>
        </table>


        <?
    }
}
?>


