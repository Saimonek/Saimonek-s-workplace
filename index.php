<?php
    include_once 'header.php';
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';
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
        echo '<div style="width: 100px; height: 100px; background-color: green;"></div>';
        exit;
    }
?>

    <div id="container">
        <!-- <div id="podobrazek"></div> -->

    <div id="div_1">
    <img id="specific-img" src="../images/Background_camp_2024_final_smooth.png" alt="Obrázek">
     <div id="nadpis">Farní tábor<br>Moravany</div>
     
     <div id="podkategorie">
         <div id="podkategorie_1">
             <div id="ikona_1"></div>
             <div class="text text_1">7-17 let</div>
             <div class="text_down down_1">27.07 - 03.08 | 2024</div>

         </div>
         <div id="podkategorie_2">
             <div id="ikona_2"></div>
             <div class="text text_2">Bedřichov</div>
             <div class="text_down down_2">Bedřichov 42, 468 12</div>
         </div>
         <div id="podkategorie_3">
             <div id="ikona_3"></div>
             <div class="text text_3">3000,-Kč</div>
             <div class="text_down down_3"><div id="bitcoinPrice"></div></div>
         </div>
      </div>
      
     <div id="main_message">
         <div id="message">Všechny potřebné informace na jednom místě!</div>
      </div>
      
     <div id="podkategorie_kontakty">
         <div id="podkategorie_1_kontakty">
             <div id="kontakty_icon_1"></div>
             <div class="kontakty_text_1 kontakty_1">Hlavní vedoucí:</div>
             <div class="kontakty_text_1 kontakty_2">Kryštof Lhotecký</div>
             <div class="kontakty_text_1 kontakty_3">733 676 283</div>
             <div class="kontakty_text_1 kontakty_4">lhotecky.krystof@volny.cz</div>
         </div>
         <div id="podkategorie_2_kontakty">
             <div id="kontakty_icon_2"></div>
             <div class="kontakty_text_1 kontakty_1">Finance:</div>
             <div class="kontakty_text_1 kontakty_2">Šimon Jedlička</div>
             <div class="kontakty_text_1 kontakty_3">792 322 976</div>
             <div class="kontakty_text_1 kontakty_5">saimon.jedlicka@gmail.com</div>
         </div>
      </div>
      
      <div id="countdown"></div>
      
      <div id = "menu">
          <div class = "open_modal open_modal_1">
              <p id="menu_1">Platba</p>
          </div>
          <div class = "open_modal open_modal_2">
              <p id="menu_2">Přihláška</p>
          </div>
          <div class = "open_modal open_modal_3">
              <p id="menu_3">Seznam věcí<br>na tábor</p>
          </div>
          <div class = "open_modal open_modal_4">
              <p id="menu_4">Fotogalerie</p>
          </div>
      </div>   
             <div id="myModal" class="modal">
                 <span class="close">&times;</span>
    <div id="bublina">
        <div id="bublina_top">
                        <p id="platba_nadpis">Platba</p>
                        <button id="copyButton"></button>
                        <div id="qr_platba"></div>
            <p class ="platba_text">Platbu, prosím, zasílejte na účet: 670100-2219321801/6210<br>Do poznámky uveďte jméno dítěte, za které byla částka poslána.<br><b>Platbu prověďte do 30.6.</b><br>Sleva: Na každé další dítě je sleva 500,-Kč. První dítě stojí 3000,-Kč, druhé dítě stojí už jen 2500,-Kč (dohromady tak, například za dvě děti, ze stejné rodiny zaplatíte 5500,-Kč).</p>
        </div>
        <div id="bublina_bottom"></div>
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

    <div id="myModal_secret" class="modal_secret">
        <span class="close_secret">&times;</span>
        <div id="secret_top">
            
            <div class="input-field">
                <form method="POST">
                        <input type="password" name="password">
                </form>
            </div>
            <div class="zadejheslo">
                <p>Zadej heslo:</p>
            </div>

        
        
          <!--  <div class="secret_pocet_deti_canvas deti_canvas_1">
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
            </div> -->
            
        </div>
    </div>


<div id="myModalll" class="modalll">
        <span class="closeee">&times;</span>
        <div id="prihlaska_canvas">
            <div id="seznam_nadpis">Seznam vecí na tábor:</div>
            <div id="seznam_veci_canvas">
                <div id="seznam_veci_text"></div>Prostěradlo<br>Polštář<br>Spacák<br>Láhev na pití<br>Pláštěnka<br>Hygienické potřeby<br>Sportovní pevná obuv<br>Náhradní sportovní pevná obuv<br>Teplé oblečení<br>Spodní prádlo<br>Baterka<br>Pokrývka hlavy<br>Batoh<br>Šátek<br><b>Přezůvky na faru<br>Ručník<br>Repelent a opalovací krém</b></div>
                <div id="seznam_veci_backpack"></div>
            </div>
        </div>
    </div>
    
<div id="myModallll" class="modallll">
        <span class="closeeee">&times;</span>
        <div id="fotogalerie_canvas">
            <div id="fotogalerie_nadpis">Fotogalerie</div>
            <div id="fotogalerie_disclaimer">Pokud by někdo nesouhlasil s zveřejňováním fotografií, nechť neváhá napsat na email: saimon.jedlicka@gmail.com.</div>
            <div class="farni_tabor_foto foto_0"><b>Štítary 2020:</b><br>odkaz <a href="https://eu.zonerama.com/farnitabormoravany/Album/11070525?secret=94MpC72Kp2fYWV82e0sb81qYD" target="_blank" class="odkaz_text">zde</a></div>
            <div class="farni_tabor_foto foto_1"><b>Velké Losiny 2021:</b><br>odkaz <a href="https://eu.zonerama.com/farnitabormoravany/Album/11005168?secret=v8E0dkA4T5gk5ShB617Dnu8oB" target="_blank" class="odkaz_text">zde</a></div>
            <div class="farni_tabor_foto foto_2"><b>Bedřichov 2022:</b><br>odkaz <a href="https://eu.zonerama.com/farnitabormoravany/Album/11005710?secret=7ApSEi17lLWhuK8JQA1l50wSG" target="_blank" class="odkaz_text">zde</a></div>
            <div class="farni_tabor_foto foto_3"><b>Heřmanov 2023:</b><br>Coming soon...</div>
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
var countdown = document.getElementById("countdown");

var modal = document.getElementById("myModal");
var modall = document.getElementById("myModall");
var modalll = document.getElementById("myModalll");
var modallll = document.getElementById("myModallll");
var modal_secret = document.getElementById("myModal_secret");

var closeBtn = document.getElementsByClassName("close")[0];
var closeBtnn = document.getElementsByClassName("closee")[0];
var closeBtnnn = document.getElementsByClassName("closeee")[0];
var closeBtnnnn = document.getElementsByClassName("closeeee")[0];
var closeBtn_secret = document.getElementsByClassName("close_secret")[0];

// Nastavení událostí pro zobrazení a skrytí modalního okna

menu_1.onclick = function() {
    modal.style.display = "block";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_blured.png";
}

menu_2.onclick = function() {
    modall.style.display = "block";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_blured.png";
}

menu_3.onclick = function() {
    modalll.style.display = "block";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_blured.png";
}
menu_4.onclick = function() {
    modallll.style.display = "block";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_blured.png";
}

countdown.onclick = function() {
    modal_secret.style.display = "block";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_blured.png";
}

closeBtn.onclick = function() {
    modal.style.display = "none";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
}

closeBtnn.onclick = function() {
    modall.style.display = "none";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
}

closeBtnnn.onclick = function() {
    modalll.style.display = "none";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
}

closeBtnnn.onclick = function() {
    modallll.style.display = "none";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
}
closeBtn_secret.onclick = function() {
    modal_secret.style.display = "none";
    document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
}

window.onclick = function(event) {
    // Skrytí modalu při kliknutí mimo něj
    if (event.target == modal) {
        modal.style.display = "none";
        document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
    }
     if (event.target == modall) {
        modall.style.display = "none";
        document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
    }
     if (event.target == modalll) {
        modalll.style.display = "none";
        document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
    }
     if (event.target == modal_secret) {
        modal_secret.style.display = "none";
        document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
    }
     if (event.target == modallll) {
        modallll.style.display = "none";
        document.getElementById("specific-img").src = "../images/Background_camp_2024_final_smooth.png";
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

        document.getElementById('countdown').innerHTML = days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's';
    } else {
        document.getElementById('countdown').innerHTML = 'Odpočet skončil';
    }
}

// Aktualizovat odpočet každou sekundu
setInterval(updateCountdown, 1000);

// Zavolat funkci hned po načtení stránky
updateCountdown();

</script>
<script>
    // Získejte aktuální cenu Bitcoinu v CZK
    async function getBitcoinPrice() {
        try {
            const response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=czk');
            const data = await response.json();
            const btcPrice = data.bitcoin.czk;
            var final_price = `${3000/btcPrice}`;
            var final_pricee = Math.round(final_price * 10000000) / 10000000;
            // Zobrazte cenu na stránce
            document.getElementById('bitcoinPrice').textContent = final_pricee + " BTC";
        } catch (error) {
            console.error('Chyba při získávání dat:', error);
        }
    }

    // Zavolejte funkci při načtení stránky
    getBitcoinPrice();
</script>
<script src="js/js_1.js"></script>
<?php
    include_once 'footer.php';
?>