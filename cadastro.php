
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" sizes="16x16" href="img/favicon.png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>cadatrar</title>
<style>
  #img{
    margin-top: 1%;
  }
</style>
</head>
<body>
  <center>
  <img src="img/cadastro.png" width="150px" id="img"><br><br>
  </center>
  <div class="mx-auto p-4 col-md-9">
 <form class="row g-3" method="POST" action="acao/criar.php" enctype="multipart/form-data">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Nome</label>
    <input type="text" class="form-control" id="validationDefault01" required name="nome">
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Telefone</label>
    <input type="number" class="form-control" id="validationDefault02" required name="telefone" placeholder="DDD + telefone">
  </div>
  <div class="col-md-4">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">
      <span class="input-group-text" id="inputGroupPrepend2">@</span>
      <input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required name="email" placeholder="exemplo@gmail.com">
    </div>
  </div>
  <div class="col-md-8">
    <label for="validationDefault03" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="validationDefault03" required name="endereco">
  </div>
   <div class="col-md-4 position-relative">
    <label for="validationTooltip05" class="form-label">Senha</label>
    <input type="password" class="form-control" id="validationTooltip05" required name="senha">
    <div class="invalid-tooltip">
      Tente novamente.
    </div>
  </div>
  <div class="input-group mb-3" >
  <input type="file" class="form-control" id="inputGroupFile02" name="foto" accept='image/jpg'>
  <label class="input-group-text" for="inputGroupFile02">Foto</label>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Profissão</span>
  </div>
  <input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default" name="profissao" placeholder="Caso não possua, escreva 'nenhuma'">
</div>

<div class="p4">
Tipo de Conta
<div class="form-check">
  <input class="form-check-input" type="radio" id="flexRadioDefault1" value="0" name="prestador">
  <label class="form-check-label" for="flexRadioDefault1">
    Cliente
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" id="flexRadioDefault2" value="1" name="prestador">
  <label class="form-check-label" for="flexRadioDefault2">
    Prestador de Serviços
  </label>
  </div>
</div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Concorde com os termos
      </label>
    </div>
  </div>
  </div>
  <center>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="btn_cadastrar" value="btn_cadastrar">cadastrar</button>
  </div>
  </center>
</form>
</body>
</html>