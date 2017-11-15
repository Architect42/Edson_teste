    <h2>Consultar passageiros</h2>
</div><!-- Banner -->
<div id="Container">
<!--    <div id="Campo_pesquisa">
        <input type="text" name="txt_pesquisa" value="" placeholder="O que esta procurando?" class="txt_pesquisa">
        <input type="submit" name="pesquisar" value="Pesquisar" class="btn_pesquisa">
    </div>-->
    <?php
        $sql =  mysqli_query($mysqli, "SELECT * FROM TB_PASSAGEIRO"); 
        echo 
        "<table>"
        . "<tr>"
        . "<td class=Top_table>NOME DO PASSAGEIRO</td>"
        . "<td class=Top_table>CPF DO PASSAGEIRO</td>"
        . "<td class=Top_table>SEXO DO PASSAGEIRO</td>"
        . "<td class=Top_table>DATA NASC.</td>"                            
        . "</tr>";
        
        $color = 0;
        while($res = $sql->fetch_array()){
            $sexo = 'Não declarado';
            if($res['SEXO_PAS'] == 'M'){
                $sexo = 'Masculino';
            }
            elseif($res['SEXO_PAS'] == 'F'){
                $sexo = 'Feminino';
            }

            if($color==0){ 
                echo "<tr><td>" . $res['NOME_PAS'] . "</td><td>" . $res['CPF_PAS'] . "</td><td>" . $sexo . "</td><td>" . $res['DATA_NASC_PAS'] . "</td></tr>";
                $color = 1;
            }else{
                echo "<tr class=dif><td>" . $res['NOME_PAS'] . "</td><td>" . $res['CPF_PAS'] . "</td><td>" . $sexo . "</td><td>" . $res['DATA_NASC_PAS'] . "</td></tr>";
                $color = 0;
            }
        }
        echo"</table>";
    ?>
</div><!-- Container -->