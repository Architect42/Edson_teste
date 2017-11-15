    <h2>Cadastro de motorista</h2>
</div><!-- Banner -->
<div id="Container">
    <div id="Centraliza_form">
        <div id="Area_form">
            
            <?php 
                if(isset($_POST['cadastro']) && $_POST['cadastro'] == 'ok'){
                    $nome = $_POST['nome'];
                    $data_nasc = $_POST['data_nasc'];
                    $cpf = $_POST['cpf'];
                    $modelo_car = $_POST['modelo'];
                    $status = $_POST['status'];
                    $sexo = $_POST['sexo'];

                    if(($nome == '')||($data_nasc == '')||($cpf == '')||($modelo_car == '')){
                        ?>
                            <script language="javascript" type="text/javascript">
                                alert('Todos os campos são Obrigatórios');
                            </script>
                        <?php
                    }
                    else{
                        $valida =  mysqli_query($mysqli, "SELECT CPF_MOT FROM TB_MOTORISTA WHERE CPF_MOT = '$cpf'");

                        if(@mysqli_num_rows($valida) >= '1'){
                        ?>
                            <script language="javascript" type="text/javascript">
                                alert('Esse CPF já foi cadastrado');
                            </script>
                        <?php 
                        }
                        else{
                            $sql = mysqli_query($mysqli, "INSERT INTO TB_MOTORISTA(NOME_MOT,DATA_NASC_MOT,CPF_MOT,MODELO_CAR_MOT,STATUS_MOT,SEXO_MOT)
                            VALUES('$nome','$data_nasc','$cpf','$modelo_car',$status,'$sexo')");

                            if($sql >= '1'){    
                                ?>
                                    <script language="javascript" type="text/javascript">
                                        alert('Motorista cadastrado com sucesso!');
                                    </script>
                                <?php
                            }
                            else{
                                ?>
                                    <script language="javascript" type="text/javascript">
                                        alert('Erro ao cadastrado o motorista!');
                                    </script>
                                <?php
                            }
                        }
                    }
                }
            ?>
            
            <form name="cadastro" action="" method="POST" enctype="multipart/form-data">
                    <label>Nome:</label>	
                    <input type="text" name="nome" value="" placeholder="Nome do motorista" class="Txt_destino">
                    <label>CPF:</label>	
                    <input type="text" name="cpf" value="" placeholder="CPF do motorista" class="Txt_destino">
                    <label>Modelo do carro:</label>	
                    <input type="text" name="modelo" value="" placeholder="Modelo do carro" class="Txt_destino">
                    <label>Sexo: </label>
                    <select name="sexo" class="Txt_destino">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="N">Não Declarado</option>
                    </select>	
                    <label>Status:</label>	
                    <select name="status" class="Txt_destino">
                        <option value="1">ATIVO</option>
                        <option value="0">INATIVO</option>
                    </select>				
                    <label>Data de nascimento:</label>	
                    <input type="text" name="data_nasc" value="" placeholder="Data de nascimento" class="Txt_destino">	
                    <input type="hidden" name="cadastro" value="ok">  
                    <input type="submit" name="enviar" value="Cadastrar" class="Btn_destino">      
                </form>
        </div>
    </div>
</div><!-- Container -->