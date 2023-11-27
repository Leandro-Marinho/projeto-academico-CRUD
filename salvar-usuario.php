<h1>Selecionar usuário pelo nº do CPF</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="selecionar-usuario">
        <div class="mb-3"> 
        <label>Insira o número do CPF</label>
            <input type="number" name="cpf" class="form-control">  <!--  mudei para CPF   -->
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Selecionar</button>
        </div>
</form>
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

        case 'selecionar-usuario':
            $nome = $_POST["cpf"];
            $sql = "SELECT * FROM usuario WHERE cpf= '{$nome}'";
            $res = $conn->query($sql);
            $qtd = $res->num_rows;
                if($qtd > 0) {
                    print "<table class='table table-hover table-striped table-bordered'>";
                    print "<tr>";
                    print "<th>#</th>";
                    print "<th>Nome</th>";
                    print "<th>E-mail</th>";
                    print "<th>CPF</th>";
                    print "<th>Data de nascimento</th>";
                    print "</tr>";
                    while($row = $res->fetch_object()) {
                        print "<tr>";
                        print "<td>".$row->id."</td>";
                        print "<td>".$row->nome."</td>";
                        print "<td>".$row->email."</td>";
                        print "<td>".$row->cpf."</td>";
                        print "<td>".$row->data_nasc."</td>";
                        print "</tr>";
                    }
                    print "</table>";
                }else{
                    print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
                }
        break;

        case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cpf = $_POST["cpf"];
            $data_nasc = $_POST["data_nasc"];
            $sql = "UPDATE usuario SET
                        nome='{$nome}',
                        email='{$email}',
                        cpf='{$cpf}',
                        data_nasc='{$data_nasc}'
                    WHERE
                        id=".$_REQUEST["id"];
            $res = $conn -> query ($sql);
                if ($res==true) {
                    print "<script>alert('Editado com sucesso!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }else{
                    print "<script>alert('Não foi possível editar');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
        break;
        
        case 'excluir':
            $sql = "DELETE FROM usuario WHERE id=" .$_REQUEST["id"];
            $res = $conn -> query ($sql);
                if ($res==true) {
                    print "<script>alert('Excluído com sucesso!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }else{
                    print "<script>alert('Não foi possível excluir');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
        break;
    }
?>