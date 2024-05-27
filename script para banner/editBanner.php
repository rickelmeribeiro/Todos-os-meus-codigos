<?php
include_once "./config/conexao.php";
include_once "./config/constante.php";
include_once "./func/func.php";

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($Dados);

if (isset($Dados) && !empty($Dados)) {

//    $idbanner = isset($Dados['id']) ? addslashes($Dados['id']) : '';


    $num = 0;
    while ($num < 3) {
        $num = $num + 1;

        if (isset($_FILES["banner_foto$num"]) && $_FILES["banner_foto$num"]['error'] === UPLOAD_ERR_OK) {
            $fotoTmpName = $_FILES["banner_foto$num"]['tmp_name'];
            $fotoName = $_FILES["banner_foto$num"]['name'];
            $uploadDir = './img/';
            $fotoPath = uniqid() . '_' . $fotoName;
            if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
                $retornoInsert = alterar1Item('banner', "foto$num", $fotoPath, 'idbanner', '1');

            }

        }

    }
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Banner alterado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Banner não alterado!"]);
    }


}


