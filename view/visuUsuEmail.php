<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Nome do usuario</label>
    <div class="input-group">
      <div class="input-group-text">Email</div>
      <input type="text" name="emailUsu" class="form-control" id="inlineFormInputGroupUsername" placeholder="E-mail do usuario">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pesquisar</button>
  </div>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">codigo</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Fone</th>
      <th scope="col">Alterar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  <?php
$emailusu = isset ($_POST["emailUsu"])? $_POST["emailUsu"]:"" ;

if($emailusu){


$dado = visuUsuarioEmail($conn, $emailusu);

foreach($dado as $emailUsuarios): 
?>
    <tr>
      <th scope="row"><?=$emailUsuarios["idusu"] ?></th>
      <td><?=$emailUsuarios["nomeusu"] ?></td>
      <td><?=$emailUsuarios["emailusu"] ?></td>
      <td><?=$emailUsuarios["foneusu"] ?></td>
      <td>
      <form action="../view/alterarForm.php" method="post">
      
      <input type="hidden" value="<?=$emailUsuarios["idusu"] ?>" name="idusu">
      <button type="submit" class="btn btn-primary">Alterar</button>

      </form>

    </td>
    <td>
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" codigo = "<?=$emailUsuarios["idusu"] ?>" email = "<?=$emailUsuarios["emailusu"] ?>"  data-bs-target="#deleteModal">
    Deletar
    </button>
    </td>
    </tr>
    <?php
      endforeach;
    }
    ?>
  </tbody>
</table>

</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Exclusão de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
      <form action="../controler/deletarUsuario.php" method="GET">
      
      <input type="hidden" class="codigo formcontrol" name="codigousu">
      

      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <button type="button" class="btn btn-primary">Sim</button>
      </div>
    </div>
  </div>
</div>
<script>
  var deletarUsuarioModal = document.getElementbyId('deleteModal');
      deletarUsuarioModal.addEventListener('show.bs.modal',function(event){
        var button = event.relatedTarget;
        var codigo = button.getAttribute('codigo');
        var email = button.getAttribute('email');
        var modalbody = deletarUsuarioModal.querySelector('.modal-body');
        modalbody.textContent = 'Gostaria de excluir o E-mail' + email + '?';
        var Codigo = deletarUsuarioModel.querySelector('.modal-footer .codigo');
        codigo.value = codigo;
      })
  </script>

<?php

include_once("../view/footer.php")

?>