<?php
include_once "./config/conexao.php";
include_once "./config/constante.php";
include_once "./func/func.php";

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($Dados);


$nome = isset($Dados['nome_adm']) ? addslashes($Dados['nome_adm']) : '';
$senha = isset($Dados['senha_adm']) ? addslashes($Dados['senha_adm']) : '';
$email = isset($Dados['email_adm']) ? addslashes($Dados['email_adm']) : '';
$cpf = isset($Dados['cpf_adm']) ? addslashes($Dados['cpf_adm']) : '';

$senhaHash = criarSenhaHash($senha);
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $fotoTmpName = $_FILES['foto']['tmp_name'];
    $fotoName = $_FILES['foto']['name'];
    $uploadDir = 'img';
    $fotoPath = uniqid() . '_' . $fotoName;

    if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {

        $retornoInsert = addAdm($nome, $senhaHash, $email, $cpf, $fotoPath);


        if ($retornoInsert > 0) {
            echo json_encode(['success' => true, 'message' => "Deu Certo!"], JSON_THROW_ON_ERROR);
            header('location: dashboard.php');
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
