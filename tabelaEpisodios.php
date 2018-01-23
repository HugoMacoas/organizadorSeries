<?php
require_once "pesquisador.php";
$css = file_get_contents('css/style.css');
//echo $css;

function criarTabela()
{
    //if ($_POST['linkEpi'] !== "") {
        $linkEpi = $_POST['linkEpi'];
    //}
    //if ($_POST['Serie'] !== "") {
        $serie = $_POST['Serie'];
    //}
    //ob_start();
    novaSerie($serie);
    //ob_clean();
    echo "<h2 id='tituloSerie' style='text-align: center; color: darkblue'>$serie</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Url</th>";
    echo "<th>Temporada</th>";
    echo "<th>Episodio</th>";
    echo "<th>Visto</th>";
    echo "</tr>";


    if($linkEpi != ""){
        $epPorVerDaSerie = selectPorVer($linkEpi);
        for ($i = 0; $i < count($epPorVerDaSerie); $i++) {
            echo "<tr>";
            echo "<td>" . $epPorVerDaSerie[$i][0] . "</td>";
            echo "<td>" . $epPorVerDaSerie[$i][1] . "</td>";
            echo "<td>" . $epPorVerDaSerie[$i][2] . "</td>";
            echo "<td>" . $epPorVerDaSerie[$i][3] . "</td>";
            echo "<td><input type=\"button\"  class=\"btnX\"value=\"Visto\" onclick=\"location.href='minhasSeries.html'\">";
            echo "</tr>";
        }

        echo "</table>";
    }else{
        $epPorVerDaSerie = selectPorVer($serie);
        for ($i = 0; $i < count($epPorVerDaSerie); $i++) {
            echo "<td>" . $epPorVerDaSerie[$i][0] . "</td>";
            echo "<td>" . $epPorVerDaSerie[$i][1] . "</td>";
            echo "<td>" . $epPorVerDaSerie[$i][2] . "</td>";
            echo "<td>" . $epPorVerDaSerie[$i][3] . "</td>";
            echo "<td><input type=\"button\"  class=\"btnX\"value=\"Visto\" onclick=\"location.href='minhasSeries.html'\">";
            echo "</tr>";
        }

        echo "</table>";
    }

}

criarTabela();

