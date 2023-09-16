<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cpf = $_POST["cpf"];
            $data_nasc = $_POST["data_nasc"];
            $sql = "INSERT INTO usuario (nome, email, cpf, data_nasc) 
            VALUES ('{$nome}', '{$email}', '{$cpf}', '{$data_nasc}')";
            $res = $conn -> query ($sql);
                if ($res==true) {
                    print "<script>alert('Cadastro realizado com sucesso!');</script>";
                    print "<script>location.href='?page=mensagem';</script>";
                }else{
                    print "<script>alert('Não foi possível cadastrar');</script>";
                }
                break;
    }
?>