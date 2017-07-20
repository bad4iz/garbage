<?
echo 'dddd';
if (isset( $_FILES['file'])){
    echo 'test';
    print_r($_FILES);
    //$string = join('', file($_FILES['file']['tmp_name']));
    //echo htmlspecialchars($string); - Содержимое файла

    move_uploaded_file($_FILES['file']['tmp_name'], $_FILES["file"]["name"] );
    echo $_FILES["file"]["name"] ;
//move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)
}
//
//if(true) {
//    rename($_SERVER['DOCUMENT_ROOT'].'/core/core/upload/model/' .$fileName , $_SERVER['DOCUMENT_ROOT'].'/core/core/upload/model/error/'.$fileError) ;
//}