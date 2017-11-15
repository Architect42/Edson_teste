        <h2>Registrar Corrida</h2>
</div><!-- Banner -->
<div id="Container">
    <div id="Centraliza_form">
        <div id="Area_form">
            <?php 
                if(isset($_POST['cadastro']) && $_POST['cadastro'] == 'ok'){
                    $ponto_chegada = $_POST['destino'];
                    $partida_partida = $_POST['local'];
                    $passageiro = $_POST['passageiro'];
                    $motorista = $_POST['motorista'];
                    $preco_corrida = '53.80';
                    
                    if(($ponto_chegada == '')||($partida_partida == '')||($passageiro == '')||($motorista == '')){
                        ?>
                            <script language="javascript" type="text/javascript">
                                alert('Todos os campos são Obrigatórios');
                            </script>
                        <?php
                    }
                    else{
                        $sql = mysqli_query($mysqli, "INSERT INTO TB_CORRIDA(LOCAL_CHEGADA_COR,LOCAL_PARTIDA_COR,VALOR_COR,ID_PAS_COR,ID_MOT_COR)
                        VALUES('$ponto_chegada','$partida_partida','$preco_corrida','$passageiro','$motorista')");

                        if($sql >= '1'){
                            ?>
                                <script language="javascript" type="text/javascript">
                                    alert('Corrida cadastrada com sucesso!');
                                </script>
                            <?php
                        }
                        else{
                            ?>
                                <script language="javascript" type="text/javascript">
                                    alert('Erro ao cadastrar a corrida');
                                </script>
                            <?php  
                        }
                    }
                }
            ?>
            
            <form name="cadastro" action="" method="POST" enctype="multipart/form-data">
                <label>Escolha o destino</label>	
                <input type="text" name="destino" value="" placeholder="Seu destino" class="Txt_destino">
                <label>Ponto de partida</label>		
                <input type="text" name="local" value="" placeholder="Seu local" class="Txt_destino">
                <label>Selecione o passageiro</label>		
                 <select name="passageiro" class="Txt_destino">
                    <?php
                        $lista1 =  mysqli_query($mysqli, "SELECT ID_PAS, NOME_PAS FROM TB_PASSAGEIRO");
                        while($reg = $lista1->fetch_array())
                        {
                            echo '<option value="'.$reg["ID_PAS"].'">'.$reg["NOME_PAS"].'</option>';    
                        }
                    ?>   
                 </select>	
                 <label>Selecione o motorista</label>		
                 <select name="motorista" class="Txt_destino">
                    <?php
                        $lista2 =  mysqli_query($mysqli, "SELECT ID_MOT, NOME_MOT FROM TB_MOTORISTA WHERE STATUS_MOT = TRUE");
                        while($reg = $lista2->fetch_array())
                        {
                            echo '<option value="'.$reg["ID_MOT"].'">'.$reg["NOME_MOT"].'</option>';    
                        }
                    ?>   
                 </select>
                <input type="hidden" name="cadastro" value="ok">  
                <input type="submit" name="enviar" value="Pesquisar" class="Btn_destino">
            </form>
        </div>
    </div>
</div><!-- Container -->

