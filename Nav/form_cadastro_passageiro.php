    <h2>Cadastro de passageiro</h2>
</div><!-- Banner -->
<div id="Container">
    <div id="Centraliza_form">
        <div id="Area_form">
            
            <?php 
                if(isset($_POST['cadastro']) && $_POST['cadastro'] == 'ok'){
                    $nome = $_POST['nome'];
                    $data_nasc = $_POST['data_nasc'];
                    $cpf = $_POST['cpf'];
                    $sexo = $_POST['sexo'];

                    if(($nome == '')||($data_nasc == '')||($cpf == '')){
                        ?>
                            <script language="javascript" type="text/javascript">
                                alert('Todos os campos são Obrigatórios');
                            </script>
                        <?php
                    }
                    else{
                        $valida =  mysqli_query($mysqli, "SELECT CPF_PAS FROM TB_PASSAGEIRO WHERE CPF_PAS = '$cpf'");

                        if(@mysqli_num_rows($valida) >= '1'){
                            ?>
                                <script language="javascript" type="text/javascript">
                                    alert('Este cpf ja foi cadastrado!');
                                </script>
                            <?php
                        }
                        else{
                            $sql = mysqli_query($mysqli, "INSERT INTO TB_PASSAGEIRO(NOME_PAS,DATA_NASC_PAS,CPF_PAS,SEXO_PAS)
                            VALUES('$nome','$data_nasc','$cpf','$sexo')");
                            if($sql >= '1'){
                                ?>
                                    <script language="javascript" type="text/javascript">
                                        alert('Passageiro cadastrado com sucesso!');
                                    </script>
                                   
                                <?php
                            }
                            else{
                                ?>
                                    <script language="javascript" type="text/javascript">
                                        alert('Erro ao cadastrar o passageiro!');
                                    </script>  
                                <?php 
                            }
                        }
                    }
                }
            ?>
            
            <form name="cadastro" action="" method="POST" enctype="multipart/form-data">
                    <label>Nome:</label>	
                    <input type="text" name="nome" value="" placeholder="Nome do passageiro" class="Txt_destino">
                    <label>CPF:</label>	
                    <input type="text" name="cpf" value="" placeholder="CPF do passageiro" class="Txt_destino">
                    <label>Sexo: </label>
                    <select name="sexo" class="Txt_destino">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="N">Não Declarado</option>
                    </select>				
                    <label>Data de nascimento:</label>	
                    <input type="text" name="data_nasc" value="" placeholder="Data de nascimento" class="Txt_destino">	
                    <input type="hidden" name="cadastro" value="ok">  
                    <input type="submit" name="enviar" value="Cadastrar" class="Btn_destino">      
            </form>
        </div>
    </div>
</div><!-- Container -->