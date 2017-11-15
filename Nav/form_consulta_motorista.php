    <h2>Consultar motoristas</h2>
</div><!-- Banner -->
<div id="Container">
<!--    <div id="Campo_pesquisa">
        <input type="text" name="txt_pesquisa" value="" placeholder="O que esta procurando?" class="txt_pesquisa">
        <input type="submit" name="pesquisar" value="Pesquisar" class="btn_pesquisa">
    </div>-->
    <?php
         $sql =  mysqli_query($mysqli, "SELECT * FROM TB_MOTORISTA"); 
        echo 
        "<table>"
        . "<tr>"
        . "<td class=Top_table>NOME DO MOTORISTA</td>"
        . "<td class=Top_table>CPF DO MOTORISTA</td>"
        . "<td class=Top_table>SEXO DO MOTORISTA</td>"
        . "<td class=Top_table>DATA NASC.</td>"                
        . "<td class=Top_table>SITUAÇÂO</td>"              
        . "</tr>";
        
        $color = 0;
        while($res = $sql->fetch_array()){
            $status = 'INATIVO'; 
            $sexo = 'Não declarado';

            if($res['STATUS_MOT'] == '1'){
                $status = 'ATIVO';
            }
            if($res['SEXO_MOT'] == 'M'){
                $sexo = 'Masculino';
            }
            elseif($res['SEXO_MOT'] == 'F'){
                $sexo = 'Feminino';
            }
            if($color==0){ 
                echo "<tr><td>" . $res['NOME_MOT'] . "</td><td>" . $res['CPF_MOT'] . "</td><td>" . $sexo . "</td><td>" . $res['DATA_NASC_MOT'] . "</td><td>" . $status . "</td></tr></a>";
                $color = 1;
            }else{
                echo "<tr class=dif><td>" . $res['NOME_MOT'] . "</td><td>" . $res['CPF_MOT'] . "</td><td>" . $sexo . "</td><td>" . $res['DATA_NASC_MOT'] . "</td><td>" . $status . "</td></tr>";
                $color = 0;
            }
        }
        echo"</table>";
    ?>
</div><!-- Container -->