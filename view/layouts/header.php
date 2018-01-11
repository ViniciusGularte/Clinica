<nav>
    <div id="logo"><img id="icone_menu" src="../img/iconeMenu.png"/></div>
    <a href="" title="Home">
        <span class="fa fa-home"></span>
        <span class="label">Home</span>
    </a>


    <?php  if($_SESSION['acesso'] == 'paciente'){
        echo('<a href="paciente/paciente_editar.php" title="Editar">');
    }
    elseif($_SESSION['acesso'] == 'medico'){
        echo('<a href="medico/medico_editar.php" title="Editar">');

    }?>
      <span class="fa fa-pencil"></span>
      <span class="label">Editar conta</span>
    </a>
    <?php  if($_SESSION['acesso'] == 'paciente'){
        echo('<a  name="paciente" onclick="showDeletarConta(name)"  title="Deletar Conta">');
    }
    elseif($_SESSION['acesso'] == 'medico'){
        echo('<a name="medico"  onclick="showDeletarConta(name)"  title="Deletar Conta">');

    }?>
        <span class="fa fa-trash"></span>
        <span class="label">Deletar Conta</span>
    </a>
    <a href="../controller/session.php" title="Sair">
        <span class="fa fa-sign-out "></span>
        <span class="label">Sair</span>
    </a>
</nav>