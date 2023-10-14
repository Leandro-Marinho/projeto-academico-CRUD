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