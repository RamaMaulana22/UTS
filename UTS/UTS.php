<!DOCTYPE html>
<html>
<head>
    <title>Input</title>
</head>
<body>
    <form action="" method="POST">
        <legend><h2>INPUT</h2></legend>
        <p>
            <label>Lokasi:</label>
            <select name="lokasi">
                <option>DKI JAKARTA</option>
                <option>JAWA BARAT</option>
                <option>BANTEN</option>
                <option>JAWA TENGAH</option>
            </select>
        </p>
        <p>
            <label>Jumlah Positif:</label>
            <input type="text" name="positif"/>
        </p>
        <p>
            <label>Jumlah Dirawat:</label>
            <input type="text" name="dirawat"/>
        </p>
        <p>
            <label>Jumlah Sembuh:</label>
            <input type="text" name="sembuh"/>
        </p>
        <p>
            <label>Jumlah Meninggal:</label>
            <input type="text" name="meninggal"/>
        </p>
        <p>
            <label>Nama Operator:</label>
            <input type="text" name="oprator"/>
        </p>
        <p>
            <label>NIM Mahasiswa:</label>
            <input type="text" name="nim"/>
        </p>
        <p>
            <input type="submit" name="submit" value="Simpan" />
        </p>
    </form>

    <p>Hasil:</p>
    <center>
    <?php    
    date_default_timezone_set('Asia/Jakarta');
    if (isset($_POST['submit'])){
    $lokasi = $_POST['lokasi'];
    $positif = $_POST['positif'];
    $dirawat = $_POST['dirawat'];
    $sembuh = $_POST['sembuh'];
    $meninggal = $_POST['meninggal'];
    $oprator = $_POST['oprator'];
    $nim = $_POST['nim'];
    $waktu = date('d F Y H:i:s');
    ?>
    <br><br>
    <?php
    $data = "       +--+--+--+--+--+--+-+--+--+--+--+--+--+--+--+--+--+--+--+--+
        | POSITIF | DIRAWAT | SEMBUH | MENINGGAL |
        +--+--+--+--+--+--+-+--+--+--+--+--+--+--+--+--+--+--+--+--+
        |  $positif  |   $dirawat    |   $sembuh   |    $meninggal |
        +--+--+--+--+--+--+-+--+--+--+--+--+--+--+--+--+--+--+--+--+";//isinya variable diatas 
        
        $dbdate = "" ;
        echo "Data Pemantaun Covid19 Wilayah $lokasi<br>";
        echo "PER $waktu<br>";
        echo "$oprator/$nim<br>";

        $table = "<table border='1'>
        <tr>
            <td>
                POSITIF
            </td>
            <td>
                DIRAWAT
            </td>
            <td>
                SEMBUH
            </td>
            <td>
                MENINGGAL
            </td>
            
        </tr>
        <tr>
            <td>$positif</td>
            <td>$dirawat</td>
            <td>$sembuh</td>
            <td>$meninggal</td>
            
        </tr>
    </table>";
        
        //$file = fopen("db.html","w+") or die ("file not open");//create file
        $file_saya = file_put_contents("db.html",$dbdate.PHP_EOL.PHP_EOL.$data.PHP_EOL,FILE_APPEND);


        echo $dbdate."<BR>".$table;

        

        $html_file= "db_html_format.html"; //assign 
        $html_form = "<html><body><p>Data Pemantaun Covid19 Wilayah $lokasi per $waktu $oprator / $nim</p>$table</body></html>";//bentuk html
        $file2 = fopen($html_file,"w+") or die ("file not open");//create file
        $file_saya2= file_put_contents ($html_file,$html_form);


    }
    ?>
</center>
</body>
</html>