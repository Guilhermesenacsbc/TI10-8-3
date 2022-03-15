<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

extract($_REQUEST, EXTR_OVERWRITE);

$informa = visuJogoCodigo($conn, $codigojogo);


?>

<div class="container">

<form class="row g-3" action="../controler/alterarJogo.php" method="Get">
  <input type="hidden" name="codigojogo" value ="<?=$informa["idjogo"] ?>" >
  <div class="col-md-6">
    <label for="inputJogo" class="form-label">Nome do Jogo</label>
    <input type="text" name="nomejogo" value="<?=$informa["nomejogo"] ?>" class="form-control" id="inputJogo" placeholder="XXXXXXXXXX" required>
  </div>
  <div class="col-md-6">
    <label for="inputValor" class="form-label">Valor do jogo</label>
    <input type="text" name="valorjogo" value="<?=$informa["valorjogo"] ?>" class="form-control" id="inputValor" placeholder="XX,XX" required>
  </div>
  <div class="col-md-6">
    <label for="inputGenero" class="form-label">Tipo de usuário</label>
    <select id="inputGenero" name="generojogo" class="form-select">
      <option selected>Escolha...</option>
      <option value="RPG">RPG</option>
      <option value="Aventura">Aventura</option>
      <option value="Puzzle">Puzzle</option>
      <option value="FPS">FPS</option>
      <option value="Corrida">Corrida</option>
    </select>
  </div>
  <div class="col-6">
    <label for="inputQuantidade" class="form-label">Quantidade de Jogos</label>
    <input type="number" name="qtdjogo" value="<?=$informa["qtdjogo"] ?>" class="form-control" id="inputQuantidade" placeholder="XXX" required>
  </div>
  <div class="col-md-4">
    <label for="inputdata" class="form-label">Data De Lançamento</label>
    <input type="date" name="datalancamentojogo" value="<?=$informa["datalancamentojogo"] ?>" class="form-control" id="inputdata" placeholder="XX/XX/XXXX" required>
  </div>
  <div class="col-4">
    <label for="inputstudio" class="form-label">Studio</label>
    <input type="text" name="studiojogo" value="<?=$informa["studiojogo"] ?>" class="form-control" id="inputstudio" placeholder="XXXXXXXXX" required>
  </div>
 
  
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar</button>
  </div>
</form>

</div>

<?php
include_once("footer.php");
?>