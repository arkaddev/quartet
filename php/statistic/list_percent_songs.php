<?php
// Odczyt danych z pliku JSON
$data = file_get_contents('data/songs.json');
$data = json_decode($data, true);


      
// Obliczanie sumy danych
$total = 0;
$violin1Total = 0;
$violin2Total = 0;
$violaTotal = 0;
$celloTotal = 0;

foreach ($data as $piece) {
    $total += $piece['total'];
    $violin1Total += $piece['violin1'];
    $violin2Total += $piece['violin2'];
    $violaTotal += $piece['viola'];
    $celloTotal += $piece['cello'];
}

// Wyświetlanie podsumowania
      
    //zaokraglenie do 1 miejsca po przecinku
    //wynik podany w procentach
    $p_violin1Total=round(100*$violin1Total/$total,1);
    $p_violin2Total=round(100*$violin2Total/$total,1);
    $p_violaTotal=round(100*$violaTotal/$total,1);
    $p_celloTotal=round(100*$celloTotal/$total,1);
      
echo "<table>";

echo "<tr>";
echo "<td>Skrzypce 1</td>";
echo "<td><strong>$p_violin1Total</strong>%</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Skrzypce 2</td>";
echo "<td><strong>$p_violin2Total</strong>%</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Altówka</td>";
echo "<td><strong>$p_violaTotal</strong>%</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Wiolonczela</td>";
echo "<td><strong>$p_celloTotal</strong>%</td>";
echo "</tr>";

echo "</table>";
?>
