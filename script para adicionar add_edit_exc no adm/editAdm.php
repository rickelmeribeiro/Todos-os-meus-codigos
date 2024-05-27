<?php
include_once "./config/conexao.php";
include_once "./config/constante.php";
include_once "./func/func.php";

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($Dados);

$nome = isset($Dados['nome_adm_edit']) ? addslashes($Dados['nome_adm_edit']) : '';
$senha = isset($Dados['senha_adm_edit']) ? addslashes($Dados['senha_adm_edit']) : '';
$email = isset($Dados['email_adm_edit']) ? addslashes($Dados['email_adm_edit']) : '';
$cpf = isset($Dados['cpf_adm_edit']) ? addslashes($Dados['cpf_adm_edit']) : '';
$id = isset($Dados['id']) ? addslashes($Dados['id']) : '';

$senhaHash = criarSenhaHash($senha);

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $fotoTmpName = $_FILES['foto']['tmp_name'];
    $fotoName = $_FILES['foto']['name'];
    $uploadDir = 'img';
    $fotoPath = uniqid() . '_' . $fotoName;

    if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {


        $retornoInsert = editAdm($nome, $senhaHash, $email, $cpf, $id, $fotoPath);


        if ($retornoInsert > 0) {
            echo json_encode(['success' => true, 'message' => "Deu Certo!"], JSON_THROW_ON_ERROR);
        } else {
            echo json_encode(['success' => false, 'message' => "Deu Erro! Error Bd"], JSON_THROW_ON_ERROR);
        }
    } else {
            echo json_encode(['success' => false, 'message' => "Deu Erro! Error Variável"], JSON_THROW_ON_ERROR);
        }
    } else {
    echo json_encode(['success' => false, 'message' => "Deu ERRO NA FOTO"], JSON_THROW_ON_ERROR);
}

?>
