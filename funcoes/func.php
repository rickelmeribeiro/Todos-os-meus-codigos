<?php

function listarTabela($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela WHERE ativo = 'A'");
        //$sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaSemAtivo($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela");
        //$sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarItemExpecifico($campos, $tabela, $campoExpecifico, $valorCampo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoExpecifico like ?");
//        $sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(2, $tabela, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(1, $campoExpecifico, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(1, "%$valorCampo%", PDO::PARAM_STR);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return False;
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function listarTabelaOrdenada($campos, $tabela, $campoOrdem, $ASCouDESC)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem $ASCouDESC");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaInnerJoinOrdenada($campos, $tabela1, $tabela2, $id1, $id2, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela1 a INNER JOIN $tabela2 b ON a.$id1 = b.$id2 ORDER BY $ordem $tipoOrdem");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaTurmaGrafico($id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT count(*) as soma FROM aluno where idturma = $id and ativo = 'A' ");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}


function listarTabelaInnerJoinTriploOrdenada($campos, $tabelaA1, $tabelaB2, $tabelaD3, $idA1, $idB2, $idA3, $idD4, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabelaA1 a INNER JOIN $tabelaB2 b ON a.$idA1 = b.$idB2 INNER JOIN $tabelaD3 d ON a.$idA3 = d.$idD4 ORDER BY $ordem $tipoOrdem");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaInnerJoinTriploWhere($campos, $tabelaA1, $tabelaB2, $tabelaD3, $idA1, $idB2, $idA3, $idD4, $quando, $idquando, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabelaA1 a INNER JOIN $tabelaB2 b ON a.$idA1 = b.$idB2 INNER JOIN $tabelaD3 d ON a.$idA3 = d.$idD4 WHERE $quando = $idquando ORDER BY $ordem $tipoOrdem");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function insert1Item($tabela, $dados, $novosDados1)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES ('$novosDados1')");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insert2Item($tabela, $dados, $novosDados1, $novosDados2)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES ('$novosDados1','$novosDados2')");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insert3Item($tabela, $dados, $novosDados1, $novosDados2, $novosDados3)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insert4Item($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);

        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insert5Item($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4, $novosDados5)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $novosDados5, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;
    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insert6Item($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4, $novosDados5, $novosDados6)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $novosDados5, PDO::PARAM_STR);
        $sqlLista->bindValue(6, $novosDados6, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;
    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insert7Item($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4, $novosDados5, $novosDados6, $novosDados7)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $novosDados5, PDO::PARAM_STR);
        $sqlLista->bindValue(6, $novosDados6, PDO::PARAM_STR);
        $sqlLista->bindValue(7, $novosDados7, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;
    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}


function insert8Item($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4, $novosDados5, $novosDados6, $novosDados7, $novosDados8)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?,?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $novosDados5, PDO::PARAM_STR);
        $sqlLista->bindValue(6, $novosDados6, PDO::PARAM_STR);
        $sqlLista->bindValue(7, $novosDados7, PDO::PARAM_STR);
        $sqlLista->bindValue(8, $novosDados8, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;
    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}


function deletarCadastro($tabela, $NomeDoCampoId, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("DELETE FROM $tabela WHERE $NomeDoCampoId = ? ");
        $sqlLista->bindValue(1, $id, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return true;
        }
        return null;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function alterar1Item($tabela, $campo, $valor, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo = ? WHERE  $identificar = $id ;");
        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterar2Item($tabela, $campo, $campo2, $valor, $valor2, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo = ? ,$campo2 = ? WHERE  $identificar = $id ;");
        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterar3Item($tabela, $campo1, $campo2, $campo3, $valor, $valor2, $valor3, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo1 = ?, $campo2 = ?, $campo3 = ? WHERE  $identificar = $id ;");

        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valor3, PDO::PARAM_STR);

        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}


function alterar4Item($tabela, $campo1, $campo2, $campo3, $campo4, $valor, $valor2, $valor3, $valor4, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo1 = ?, $campo2 = ?, $campo3 = ?,$campo4 = ? WHERE  $identificar = $id ;");
        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valor3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $valor4, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterar5Item($tabela, $campo1, $campo2, $campo3, $campo4, $campo5, $valor, $valor2, $valor3, $valor4, $valor5, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo1 = ?, $campo2 = ?, $campo3 = ?,$campo4 = ?,$campo5 = ? WHERE  $identificar = $id ;");

        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valor3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $valor4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $valor5, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterar7Item($tabela, $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $valor, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo1 = ?, $campo2 = ?, $campo3 = ?,$campo4 = ?,$campo5 = ?, $campo6 = ?, $campo7 = ? WHERE  $identificar = $id ;");

        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valor3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $valor4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $valor5, PDO::PARAM_STR);
        $sqlLista->bindValue(6, $valor6, PDO::PARAM_STR);
        $sqlLista->bindValue(7, $valor7, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return False;

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}


function verificarSenhaCriptografada($campos, $tabela, $campoBdEmail, $campoEmail, $campoBdSenha, $campoSenha, $campoBdAtivo, $campoAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoBdEmail = ? AND $campoBdAtivo = ?");
        $sqlverificar->bindValue(1, $campoEmail, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $campoAtivo, PDO::PARAM_STR);
        $sqlverificar->execute();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            $retornoSql = $sqlverificar->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql->$campoBdSenha;
            if (password_verify($campoSenha, $senha_hash)) {
                return $retornoSql;
            }
            return 'senha';
        }
        return 'usuario';

    } catch (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function verificarSenhaAutomatica($valorIdAdm, $valorSenha)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("SELECT * FROM adm WHERE idadm = ?");
        $sqlverificar->bindValue(1, $valorIdAdm, PDO::PARAM_STR);
//        $sqlverificar->bindValue(2, $valorSenha, PDO::PARAM_STR);
        $sqlverificar->execute();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            $retornoSql = $sqlverificar->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql->senha;
            if (password_verify($valorSenha, $senha_hash)) {
                return 'deBOA';
            }
            return 'invasor';

        } else {
            return 'Vazio';
        }
    } catch (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function dataHoraGlobal($data, $hora = 'S', $pais = 'BR')
{
    $data = new DateTime($data);
    if ($pais === 'BR') {
        if ($hora === 'S') {
            echo $data->format('Y-m-d H:i:s');
        } else {
            echo $data->format('Y-m-d');
        }
    } else if ($pais === 'US') {
        if ($hora === 'S') {
            echo $data->format('d-m-Y H:i:s');
        } else {
            echo $data->format('d-m-Y');
        }
    }
    return $data;
}

function dataHoraGlobalGAMBIARRA($data)
{
    $data = new DateTime($data);

    return $data->format('Y-m-d H:i:00');


}

function converterNumComVirgula($numm)
{
    $numero = $numm;
    $numero = number_format($numero, 2, ',', '');
    return $numero;
}

function converterNumComPonto($numm)
{
    $numero = $numm;
    return number_format($numero, 2, '.', '');
}

function converterAcentuacao($str)
{
    $trMap = ['Á' => 'á', 'É' => 'é', 'Í' => 'í', 'Ó' => 'ó', 'Ú' => 'ú', 'Ã' => 'ã', 'Õ' => 'õ', 'Â' => 'â', 'Ê' => 'ê', 'Î' => 'î', 'Ô' => 'ô', 'Û' => 'û', 'À' => 'à', 'È' => 'è', 'Ì' => 'ì', 'Ò' => 'ò', 'Ù' => 'ù'];
    $str = mb_strtolower(strtr($str, $trMap));
    $first = mb_substr($str, 0, 1);
    $first = strtr($first, array_flip($trMap));
    $first = mb_strtoupper($first);
    return $first . mb_substr($str, 1);
}

function criarSenhaHash($senha, $valorCost = '12')
{
    $options = [
        'cost' => $valorCost,
    ];
    return password_hash($senha, PASSWORD_BCRYPT, $options);
}

function validaCPF($cpf)
{

    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function listarGeral($campos, $tabela)
{
    $conn = conectar();
    try {
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela");
        $sqlLista->execute();

        if ($sqlLista->rowCount() > 0) {
            $results = $sqlLista->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $results;
        } else {
            $conn = null;
            return array();
        }
    } catch (PDOException $e) {
        $conn = null;
        echo 'Exception -> ' . $e->getMessage();
        return false;
    }
}

function addAdm($nome, $senha, $email, $cpf, $foto)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $stmt = $conn->prepare("INSERT INTO adm (nome, senha, email, cpf, foto) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $senha, $email, $cpf, $foto]);
        $conn->commit();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch (PDOException $e) {
        echo 'Exception -> ' . $e->getMessage();
        $conn->rollback();
        return $e->getMessage();
    } finally {
        $conn = null;
    }
}

function addContato($nome, $numero)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $stmt = $conn->prepare("INSERT INTO contato (nome, numero) VALUES (?, ?)");
        $stmt->execute([$nome, $numero]);
        $conn->commit();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch (PDOException $e) {
        echo 'Exception -> ' . $e->getMessage();
        $conn->rollback();
        return $e->getMessage();
    } finally {
        $conn = null;
    }
}

function addProduto($nome, $valor, $fotoName, $descricao)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $stmt = $conn->prepare("INSERT INTO produto (nome, valor, foto, descricao) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $valor, $fotoName, $descricao]);
        $conn->commit();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch (PDOException $e) {
        echo 'Exception -> ' . $e->getMessage();
        $conn->rollback();
        return $e->getMessage();
    } finally {
        $conn = null;
    }
}
function addContatoMenu($nome, $numero)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $stmt = $conn->prepare("INSERT INTO contato (nome, numero) VALUES (?, ?)");
        $stmt->execute([$nome, $numero]);
        $conn->commit();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch (PDOException $e) {
        echo 'Exception -> ' . $e->getMessage();
        $conn->rollback();
        return $e->getMessage();
    } finally {
        $conn = null;
    }
}

function editAdm($nome, $senha, $email, $cpf, $idadm, $foto)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $sql = "UPDATE adm SET nome = :nome, senha = :senha, email = :email, cpf = :cpf, foto = :foto WHERE idadm = :idadm";
        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':foto', $foto);
        $stmt->bindParam(':idadm', $idadm);

        $stmt->execute();
        $conn->commit();

        return $stmt->rowCount();

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function editContato($nome, $numero, $idcontato)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $sql = "UPDATE contato SET nome = :nome, numero = :numero WHERE idcontato = :idcontato";
        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':idcontato', $idcontato);

        $stmt->execute();
        $conn->commit();

        return $stmt->rowCount();

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function editProduto($nome, $valor, $fotoName, $idproduto, $descricao)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $sql = "UPDATE produto SET nome = :nome, valor = :valor, foto = :foto, descricao = :descricao WHERE idproduto = :idproduto";
        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':foto', $fotoName);
        $stmt->bindParam(':idproduto', $idproduto);
        $stmt->bindParam(':descricao', $descricao);

        $stmt->execute();
        $conn->commit();

        return $stmt->rowCount();

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function excAdm($id)
{
    $conn = conectar();
    try {

        $conn->beginTransaction();

        $stmt = $conn->prepare("DELETE FROM adm WHERE idadm = :idadm");
        $stmt->bindParam(':idadm', $id);
        $stmt->execute();
        $conn->commit();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}
function excProduto($id)
{
    $conn = conectar();
    try {

        $conn->beginTransaction();

        $stmt = $conn->prepare("DELETE FROM produto WHERE idproduto = :idproduto");
        $stmt->bindParam(':idproduto', $id);
        $stmt->execute();
        $conn->commit();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function editBanner($foto1, $foto2, $foto3, $idbanner)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();


        $sql = "UPDATE banner SET foto1 = :foto1, foto2 = :foto2, foto3 = :foto3 WHERE idbanner = :idbanner";
        $stmt = $conn->prepare($sql);


        $stmt->bindParam(':foto1', $foto1);
        $stmt->bindParam(':foto2', $foto2);
        $stmt->bindParam(':foto3', $foto3);
        $stmt->bindParam(':idbanner', $idbanner);

        $stmt->execute();
        $conn->commit();

        return $stmt->rowCount();

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}






function excContato($id)
{
    $conn = conectar();
    try {

        $conn->beginTransaction();

        $stmt = $conn->prepare("DELETE FROM contato WHERE idcontato = :idcontato");
        $stmt->bindParam(':idcontato', $id);
        $stmt->execute();
        $conn->commit();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}







