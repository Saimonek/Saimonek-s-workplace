<?php
    include_once 'header.php';
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';
require_once('stuff/protect-this.php');
?>
<?php
 
$dataPoints = array(
	array("label"=> "Food + Drinks", "y"=> 590),
	array("label"=> "Activities and Entertainments", "y"=> 261),
	array("label"=> "Health and Fitness", "y"=> 158),
	array("label"=> "Shopping & Misc", "y"=> 72),
	array("label"=> "Transportation", "y"=> 191),
	array("label"=> "Rent", "y"=> 573),
	array("label"=> "Travel Insurance", "y"=> 126)
);
	
?>
<?php
    /* Your password */
    $password = 'EasyPass';

    /* Redirects here after login */
    $redirect_after_login = 'secret.php';

    /* Will not ask password again for */
    $remember_password = strtotime('+30 days'); // 30 days

    if (isset($_POST['password']) && $_POST['password'] == $password) {
        setcookie("password", $password, $remember_password);
       header('Location: ' . $redirect_after_login);
        /*echo "<script>console.log('Povedlo se' );</script>";*/
        exit;
    }
?>

    <div id="container">
        <!-- <div id="podobrazek"></div> -->

    <div id="div_1">
    <img id="specific-img" src="../images/Background_camp_2024_final_smooth_admin.png" alt="Obrázek">
     <div id="nadpis">Data of the<br>FTM 2024</div>
     
    
      
     <div id="odpocet_pole">
         <div id="odpocet_text">
              <div id="countdown_start_camp_text">Start tábor:</div>
              <div id="countdown_end_platba_text">Deadline platba:</div>
              <div id="countdown_end_prihlaska_text">Deadline prihláska:</div>
         </div>
         <div id="odpocet_cisla">
              <div id="countdown_start_camp"></div>
              <div id="countdown_end_platba"></div>
              <div id="countdown_end_prihlaska"></div> 
         </div></div>
      </div>
<div id="prehled_main">
          <div class="secret_pocet_deti_canvas deti_canvas_1">
                <div id="secret_pocet_deti"></div>
                <div class="secret_text"><?php echo $pocetJmen; ?>/30</div>
            </div>
            <div class="secret_pocet_deti_canvas deti_canvas_2">
                <div id="secret_prijmy"></div>
                <div class="secret_text"><?php echo $celkovaHodnota; ?>,-Kč</div>
            </div>
            <div class="secret_pocet_deti_canvas deti_canvas_3">
                <div id="secret_vydaje"></div>
                <div class="secret_text"><?php echo $celkoveVydaje; ?>,-Kč</div>
            </div>
</div>
      
      <div id = "menu">
          <div class = "open_modal open_modal_1">
              <p id="menu_1">Účastníci</p>
          </div>
          <div class = "open_modal open_modal_2">
              <p id="menu_2">Text_1</p>
          </div>
          <div class = "open_modal open_modal_3">
              <p id="menu_3">Výdaje</p>
          </div>
          <div class = "open_modal open_modal_4">
              <p id="menu_4">Bang!</p>
          </div>
      </div>   
      
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
                 
        <div id="ucastnici_main">
            <div id="ucastnici_nadpis">
                <div class="secret_pocet_deti_canvas deti_canvas_1">
                    <div id="secret_pocet_deti"></div>
                    <div class="secret_text"><?php echo $pocetJmen; ?>/30</div>
                </div>
                <div class="secret_pocet_deti_canvas deti_canvas_2">
                    <div id="secret_prijmy"></div>
                    <div class="secret_text"><?php echo $celkovaHodnota; ?>,-Kč</div>
                </div>
                <div class="secret_pocet_deti_canvas deti_canvas_3">
                    <div id="secret_vydaje"></div>
                    <div class="secret_text"><?php echo $celkoveVydaje; ?>,-Kč</div>
                </div>
            </div>
            
            <div id="ucastnici_seznam">
    <?php
    
        // Připojení k databázi
    $servername = "localhost";
    $username = "farnitaborjecool";
    $password = "SaimonTree267548";
    $databaze = "farnitabor";

    $spojeni = new mysqli($servername, $username, $password, $databaze);

    // Kontrola připojení
    if ($spojeni->connect_error) {
        die("Chyba připojení k databázi: " . $spojeni->connect_error);
    }
    
  
// SQL dotaz pro výběr dat
$sql = "SELECT kid_name, kid_gender, kid_birth, isZaplaceno, kid_type FROM users";
$result = $spojeni->query($sql);

// Kontrola, jestli dotaz vrátil nějaká data
if ($result->num_rows > 0) {
    echo '<div class="table-container">'; // Obalový div pro CSS styly
    echo "<table><tr><th>Jméno</th><th>Pohlaví</th><th>Věk</th><th>Zaplaceno</th></tr>";

    $currentDate = new DateTime();
    
    while($row = $result->fetch_assoc()) {
        $birthDate = new DateTime($row["kid_birth"]);
        $age = $currentDate->diff($birthDate)->y + $currentDate->diff($birthDate)->m / 12 + $currentDate->diff($birthDate)->d / 365.25;
        $ageRounded = round($age, 1);
        
        // Nová logika pro určení pohlaví nebo role
        if ($row["kid_type"] == "Instruktor") {
            $genderEmoji = "⚫"; // Specifická ikona pro instruktory
        } else {
            $genderEmoji = $row["kid_gender"] == "M" ? "🔵" : "🟠";
        }
        
        $paymentStatus = $row["isZaplaceno"] == "yes" ? "Ano" : "Ne";
        
        echo "<tr><td>".$row["kid_name"]."</td><td>".$genderEmoji."</td><td>".$ageRounded."</td><td>".$paymentStatus."</td></tr>";
    }
    echo "</table>";
    echo '</div>'; // Konec obalového divu
} else {
    echo "0 results";
}
$spojeni->close();
?>

            </div>
            
        </div>

    </div>
    <div id="myModall" class="modall">
        <span class="closee">&times;</span>
        <div id="prihlaska_canvas">
            <div class="prihlaska_nadpis prihlaska_nadpis_1">Dokumenty</div>
           <!--   <div class="prihlaska_nadpis prihlaska_nadpis_2">Postup</div> -->
          <div class="prihlaska_text prihlaska_text_1">Pro přihlášení Vaší ratolesti, prosím, vytiskněte a vyplňte níže přiložené soubory „<a href="../dokumenty/Prihláška_Junior_2024.pdf" target="_blank" class="odkaz_text">Přihláška Junior - 2024</a>“ a „<a href="../dokumenty/Pokyny_Junior_2024.pdf" target="_blank" class="odkaz_text">Pokyny Junior - 2024</a>“ a následně oskenované / vyfocené zašlete nejpozději do <b>30.5.2024</b> na mailovou adresu: „<b>lhotecky.krystof@volny.cz</b>“. Originály pak spolu s „Prohlášení o bezinfekčnosti“ a „Posudek o zdravotní způsobilosti“ odevzdáte při <b>příjezdu na tábor</b>.</div>
            <div id="prihlaska_dokumenty_canvas">
                <div class="prihlaska_dokumenty_row row_1">
                    <div class="prihlaska_dokumenty_row_text row_1_text">Přihláška Junior - 2024</div>
                    <a href="../dokumenty/Prihláška_Junior_2024.pdf" download><button class="download_button"></button></a>
                    <a href="../dokumenty/Prihláška_Junior_2024.pdf" target="_blank"><div class="new_tab_button"></div></a>
                </div>
                <div class="prihlaska_dokumenty_row row_2">
                    <div class="prihlaska_dokumenty_row_text row_2_text">Pokyny Junior - 2024</div>
                    <a href="../dokumenty/Pokyny_Junior_2024.pdf" download><button class="download_button"></button></a>
                    <a href="../dokumenty/Pokyny_Junior_2024.pdf" target="_blank"><div class="new_tab_button"></div></a>
                </div>
                <div class="prihlaska_dokumenty_row row_3">
                    <div class="prihlaska_dokumenty_row_text row_3_text">Prohlášení o bezinfekčnosti</div>
                    <a href="../dokumenty/Prohlaseni_o_bezinfekcnosti_Farni_tabor_2024.pdf" download><button class="download_button"></button></a>
                    <a href="../dokumenty/Prohlaseni_o_bezinfekcnosti_Farni_tabor_2024.pdf" target="_blank"><div class="new_tab_button"></div></a>
                </div>
                <div class="prihlaska_dokumenty_row row_4">
                    <div class="prihlaska_dokumenty_row_text row_4_text">Posudek o zdravotní způsobilosti</div>
                    <a href="../dokumenty/Posudek_o_zdravotni_zpusobilosti_ditete_Farni_tabor_2024.pdf" download><button class="download_button"></button></a>
                    <a href="../dokumenty/Posudek_o_zdravotni_zpusobilosti_ditete_Farni_tabor_2024.pdf" target="_blank"><div class="new_tab_button"></div></a>
                </div>
            </div>
            <!--<div class="prihlaska_text prihlaska_text_2">Pro přihlášení dítěte, prosím, zašlete první dva ofocené / oskenované formuláře výše (přihláška a pokyny)</div> -->
        </div>
    </div>


<div id="myModalll" class="modalll">
        <span class="closeee">&times;</span>
        <div id="prihlaska_canvas">
            <div id="seznam_nadpis">Seznam vecí na tábor:</div>
            <div id="seznam_veci_canvas">
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Výdaje FTM 2024"
	},
	subtitles: [{
		text: "Použitá měna: Česká koruna (czk)"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "฿#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="js/canvasjs.min.js"></script>
            </div>
        </div>
    </div>
    
<div id="myModallll" class="modallll">
        <span class="closeeee">&times;</span>
        <div id="fotogalerie_canvas">
            <div id="fotogalerie_nadpis">Pravidla Bang!</div>
            <div id="fotogalerie_disclaimer">Upřesňující pravidla pro hru Bang! pro ty, kteří si myslí, že pravidla umí.</div>
            <div class="farni_tabor_foto foto_0"><b>Je možné mít 2 koně zároveň.</b><br>Hráč nesmí mít vyložené 2 stejné karty. Karta "Appaloosa" byla změněna na "Hledí", aby hráče nemátlo tvrzení: "jízda na dvou koních není možná". <a href="https://www.bang.cz/cs/karty/bang-zakladni-balicek" target="_blank" class="odkaz_text">odkaz</a></div>
            <div class="farni_tabor_foto foto_1"><b>Karta salón přidá život všem hráčům.</b><br><a href="https://www.bang.cz/cs/karty/bang-zakladni-balicek" target="_blank" class="odkaz_text">odkaz</a></div>
            <div class="farni_tabor_foto foto_2"><b>Kartou "panika" lze brát i modré věci jiných hráčů.</b><br><a href="https://www.bang.cz/cs/karty/bang-zakladni-balicek" target="_blank" class="odkaz_text">odkaz</a></div>
            <div class="farni_tabor_foto foto_3"><b>Karta "pivo" ve dvou hráčích ztrácí efekt.</b><br><a href="https://www.bang.cz/cs/karty/bang-zakladni-balicek" target="_blank" class="odkaz_text">odkaz</a></div>
        </div>
</div>
    
    </div>
    
        
        
            
        
        <div id="stars"></div>
        <div id="background-wrap">
                <div class="x1">
        <div class="cloud"></div>
    </div>

    <div class="x2">
        <div class="kriz"></div>
    </div>

    <div class="x3">
        <div class="strom"></div>
    </div>

    <div class="x4">
        <div class="kytara"></div>
    </div>

    <div class="x5">
        <div class="sekyra"></div>
    </div>
        </div>
      <!-- <div id="black-background"><div class="hearts-bg"></div></div>-->
    </div>
    <style>
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
<script>
console.log("<?php echo $celkovaHodnota; ?>");
var menu_1 = document.getElementById("menu_1");
var menu_2 = document.getElementById("menu_2");
var menu_3 = document.getElementById("menu_3");
var menu_4 = document.getElementById("menu_4");

var modal = document.getElementById("myModal");
var modall = document.getElementById("myModall");
var modalll = document.getElementById("myModalll");
var modallll = document.getElementById("myModallll");

var closeBtn = document.getElementsByClassName("close")[0];
var closeBtnn = document.getElementsByClassName("closee")[0];
var closeBtnnn = document.getElementsByClassName("closeee")[0];
var closeBtnnnn = document.getElementsByClassName("closeeee")[0];

// Nastavení událostí pro zobrazení a skrytí modalního okna

menu_1.onclick = function() {
    modal.style.display = "block";
}

menu_2.onclick = function() {
    modall.style.display = "block";
}

menu_3.onclick = function() {
    modalll.style.display = "block";
}
menu_4.onclick = function() {
    modallll.style.display = "block";
}

closeBtn.onclick = function() {
    modal.style.display = "none";
}

closeBtnn.onclick = function() {
    modall.style.display = "none";
}

closeBtnnn.onclick = function() {
    modalll.style.display = "none";
}

closeBtnnn.onclick = function() {
    modallll.style.display = "none";
}


window.onclick = function(event) {
    // Skrytí modalu při kliknutí mimo něj
    if (event.target == modal) {
        modal.style.display = "none";
    }
     if (event.target == modall) {
        modall.style.display = "none";
    }
     if (event.target == modalll) {
        modalll.style.display = "none";
    }
     if (event.target == modallll) {
        modallll.style.display = "none";
    }
}  

</script>

    <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            var textToCopy = '670100-2219321801/6210';

            // Vytvoření dočasného textarea pro umístění textu
            var textArea = document.createElement('textarea');
            textArea.value = textToCopy;
            document.body.appendChild(textArea);

            // Výběr textu v textaree a provedení kopírování
            textArea.select();
            document.execCommand('copy');

            // Odebrání dočasného textarea
            document.body.removeChild(textArea);
        });
    </script>
<script>
// Datum a čas, do kdy má odpočet probíhat (v UTC)
var targetDate = new Date('2024-07-27T00:00:00Z');

function updateCountdown() {
    var currentDate = new Date();
    var timeDifference = targetDate - currentDate;

    if (timeDifference > 0) {
        var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        document.getElementById('countdown_start_camp').innerHTML = days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's';
    } else {
        document.getElementById('countdown_start_camp').innerHTML = 'Odpočet skončil';
    }
}

// Aktualizovat odpočet každou sekundu
setInterval(updateCountdown, 1000);
updateCountdown();

var targetDate_platba = new Date('2024-06-30T00:00:00Z');

function updateCountdown_platba() {
    var currentDate_platba = new Date();
    var timeDifference_platba = targetDate_platba - currentDate_platba;

    if (timeDifference_platba > 0) {
        var days_platba = Math.floor(timeDifference_platba / (1000 * 60 * 60 * 24));
        var hours_platba = Math.floor((timeDifference_platba % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes_platba = Math.floor((timeDifference_platba % (1000 * 60 * 60)) / (1000 * 60));
        var seconds_platba = Math.floor((timeDifference_platba % (1000 * 60)) / 1000);

        document.getElementById('countdown_end_platba').innerHTML = days_platba + 'd ' + hours_platba + 'h ' + minutes_platba + 'm ' + seconds_platba + 's';
    } else {
        document.getElementById('countdown_end_platba').innerHTML = 'Odpočet skončil';
    }
}

// Aktualizovat odpočet každou sekundu
setInterval(updateCountdown_platba, 1000);

// Zavolat funkci hned po načtení stránky
updateCountdown_platba();

var targetDate_prihlaska = new Date('2024-05-30T00:00:00Z');

function updateCountdown_prihlaska() {
    var currentDate_prihlaska = new Date();
    var timeDifference_prihlaska = targetDate_prihlaska - currentDate_prihlaska;

    if (timeDifference_prihlaska > 0) {
        var days_prihlaska = Math.floor(timeDifference_prihlaska / (1000 * 60 * 60 * 24));
        var hours_prihlaska = Math.floor((timeDifference_prihlaska % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes_prihlaska = Math.floor((timeDifference_prihlaska % (1000 * 60 * 60)) / (1000 * 60));
        var seconds_prihlaska = Math.floor((timeDifference_prihlaska % (1000 * 60)) / 1000);

        document.getElementById('countdown_end_prihlaska').innerHTML = days_prihlaska + 'd ' + hours_prihlaska + 'h ' + minutes_prihlaska + 'm ' + seconds_prihlaska + 's';
    } else {
        document.getElementById('countdown_end_prihlaska').innerHTML = 'Odpočet skončil';
    }
}

// Aktualizovat odpočet každou sekundu
setInterval(updateCountdown_prihlaska, 1000);

// Zavolat funkci hned po načtení stránky
updateCountdown_prihlaska();

</script>


</script>
<script src="js/js_1.js"></script>
<?php
    include_once 'footer.php';
?>