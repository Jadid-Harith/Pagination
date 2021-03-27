<!doctype HTML>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body> 
<?php
    session_start();
    $file = fopen('elevesYm2.csv', 'r');
        while (!feof($file)) {  
            $csv[] = fgetcsv($file, 1024); 
        }
        fclose($file);
    function aff_tableau($a , $b) {
        $file = fopen('elevesYm2.csv', 'r');
        while (!feof($file)) {  
            $csv[] = fgetcsv($file, 1024); 
        }
        fclose($file);
        for($i = $a ; $i <= $b ; $i++) {
            for($j = 0 ; $j < 2 ; $j++) {
                echo $csv[$i][$j];
                if( $j == 1  && ! (empty($csv[$i]))) {
                    echo '<pre>';
                    echo '</pre>';
                    ?>
                    <table class="style1">
                    <tr>
                        <th>Binaire</th>
                        <th>Décimal</th>
                        <th>Octal</th>
                        <th>Hexadécimal</th>
                    </tr>
                    <tr>
                        <td> <?php $bin = intval(decbin(rand(100,400))); echo $bin ?></td>      
                        <td> ...</td>  
                        <td> ... </td> 
                        <td> ... </td> 
                    </tr>
                    <tr>
                        <td> ...</td>  
                        <td> <?php $dec = rand(200,400); echo $dec ?></td>  
                        <td> ... </td> 
                        <td> ... </td>     
                    </tr>
                    <tr>
                        <td> ... </td> 
                        <td> ... </td>       
                        <td> <?php $oct = intval(decoct(rand(100,400))); echo $oct ?></td>  
                        <td> ... </td>   
                    </tr>
                    <tr> 
                        <td> ... </td> 
                        <td> ... </td> 
                        <td> ... </td>       
                        <td> <?php $hex = dechex(rand(0,400)); echo $hex ?></td>  
                    </tr>
                </table>

                <button onclick="Correct(<?=$i;?>)">Correction</button>
                
                <table class="style2" id="Tab_Corr<?=$i;?>">
                    <tr>
                        <th>Binaire</th>
                        <th>Décimal</th>
                        <th>Octal</th>
                        <th>Hexadécimal</th>
                    </tr>
                    <tr>
                        <td> <?php echo $bin ?></td>  
                        <td> <?php $dec1 = intval(bindec($bin)); echo $dec1 ?></td>  
                        <td> <?php echo decoct($dec1) ?></td>  
                        <td> <?php echo dechex($dec1)  ?></td>     
                    </tr>
                    <tr>
                        <td> <?php echo decbin($dec) ?></td>  
                        <td> <?php echo $dec ?></td>  
                        <td> <?php echo decoct($dec) ?></td>  
                        <td> <?php echo dechex($dec) ?></td>         
                    </tr>
                    <tr>
                        <td> <?php $dec2 = intval(octdec($oct)); $bin1 = decbin($dec2); echo $bin1 ?></td>  
                        <td> <?php $dec3 = intval(octdec($oct)); echo $dec3 ?></td>  
                        <td> <?php echo $oct ?></td>  
                        <td> <?php echo dechex($dec3) ?></td>  
                    </tr>
                    <tr>
                        <td> <?php $dec4 = intval(hexdec($hex)); $bin2 = decbin($dec4); echo $bin2 ?></td>  
                        <td> <?php $dec5 = intval(hexdec($hex)); echo $dec5 ?></td>  
                        <td> <?php echo decoct($dec5) ?></td>  
                        <td> <?php echo $hex ?></td>  
                    </tr>
                    </table>
                    <div></div> <?php
                    echo '<pre>';
                    echo '</pre>';                  
                } 
            }   
        }
    }
?>




<script>

function Correct($i) {
  var x = document.getElementById('Tab_Corr'+$i);
  if (x.style.display === "none") {
    x.style.display = "block";
  } 
  else {
    x.style.display = "none";
  } 
}
</script>

<?php for($k =1; $k <= intval(count($csv)/2); $k++) {?> 
            <input type="submit" onclick="aff_tableau($k*2 -1, $k*2);" name="<?php echo $k ?>" value="<?php echo $k ?>">
            <?php  } ?>
</body>