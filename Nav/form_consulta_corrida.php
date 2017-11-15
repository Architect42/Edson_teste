    <h2>Consultar passageiros</h2>
</div><!-- Banner -->
<div id="Container">
<!--    <div id="Campo_pesquisa">
        <input type="text" name="txt_pesquisa" value="" placeholder="O que esta procurando?" class="txt_pesquisa">
        <input type="submit" name="pesquisar" value="Pesquisar" class="btn_pesquisa">
    </div>-->
    <?php
        $sql =  mysqli_query($mysqli, "SELECT * FROM TB_CORRIDA 
            INNER JOIN TB_PASSAGEIRO ON ID_PAS_COR = ID_PAS
            INNER JOIN TB_MOTORISTA ON ID_MOT_COR = ID_MOT"); 
        echo 
        "<table>"
        . "<tr>"
        . "<td class=Top_table>NOME DO PASSAGEIRO</td>"
        . "<td class=Top_table>NOME DO MOTORISTA</td>"
        . "<td class=Top_table>VALOR DA CORRIDA</td>"                         
        . "</tr>";
                       
        $color = 0;
        while($res = $sql->fetch_array()){
            if($color==0){ 
                echo "<tr><td>" . $res['NOME_PAS'] . "</td><td>" . $res['NOME_MOT'] . "</td><td>" . $res['VALOR_COR'] . "</td></tr>";
                $color = 1;
            }else{
                echo "<tr class=dif><td>" . $res['NOME_PAS'] . "</td><td>" . $res['NOME_MOT'] . "</td><td>" . $res['VALOR_COR'] . "</td></tr>";
                $color = 0;
            }
        }
        echo"</table>";
    ?>
</div><!-- Container -->