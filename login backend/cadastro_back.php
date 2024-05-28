<?php
include_once "./config/conexao.php";
include_once "./config/constante.php";
include_once "./func/func.php";

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($Dados);

if (isset($Dados) && !empty($Dados)) {

    $nome = isset($Dados['nome']) ? addslashes($Dados['nome']) : '';
    $email = isset($Dados['email']) ? addslashes($Dados['email']) : '';
    $senha = isset($Dados['senha']) ? addslashes($Dados['senha']) : '';
    $cpf = isset($Dados['cpf']) ? addslashes($Dados['cpf']) : '';

    $senhaHash = criarSenhaHash($senha);

    $retornoInsert = addCliente($nome, $email, $senhaHash, $cpf);


    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Deu Certo!"], JSON_THROW_ON_ERROR);
        header('location: index.php');
    } else {
        echo json_encode(['success' => false, 'message' => "Deu Erro! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Deu Erro! Error Variável"], JSON_THROW_ON_ERROR);
}
?>
