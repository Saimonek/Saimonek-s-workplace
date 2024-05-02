<?php


function sectiCelkovouHodnotu() {
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

    // Dotaz na získání celkové hodnoty ze sloupce "cost", pouze pro záznamy s "isZaplaceno" = "yes"
    $dotaz = "SELECT SUM(cost) as celkova_hodnota FROM users WHERE isZaplaceno = 'yes'";
    $vysledek = $spojeni->query($dotaz);

    // Kontrola úspěšného provedení dotazu
    if ($vysledek) {
        // Získání výsledku do asociativního pole
        $data = $vysledek->fetch_assoc();

        // Uložení celkové hodnoty do proměnné, pokud je prázdná, nastaví se na 0
        $celkovaHodnota = $data['celkova_hodnota'] ?? 0; // Použití null coalescing operatoru ?? pro PHP 7.0+

        // Uzavření spojení s databází
        $spojeni->close();

        // Vrácení celkové hodnoty
        return $celkovaHodnota;
    } else {
        // V případě chyby v dotazu
        die("Chyba při provádění dotazu: " . $spojeni->error);
    }
}

// Použití funkce a vypsání celkové hodnoty
$celkovaHodnota = sectiCelkovouHodnotu();


function spocitejPocetUnikatnichJmen() {
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

    // Dotaz na získání počtu unikátních jmen ze sloupce "kid_name"
    $dotaz = "SELECT COUNT(DISTINCT kid_name) as pocet_jmen FROM users WHERE kid_type = 'Dítě'";
    $vysledek = $spojeni->query($dotaz);

    // Kontrola úspěšného provedení dotazu
    if ($vysledek) {
        // Získání výsledku do asociativního pole
        $data = $vysledek->fetch_assoc();

        // Uložení počtu unikátních jmen do proměnné
        $pocetJmen = $data['pocet_jmen'];

        // Uzavření spojení s databází
        $spojeni->close();

        // Vrácení počtu unikátních jmen
        return $pocetJmen;
    } else {
        // V případě chyby v dotazu
        die("Chyba při provádění dotazu: " . $spojeni->error);
    }
}

// Použití funkce a vypsání počtu unikátních jmen
$pocetJmen = spocitejPocetUnikatnichJmen();

function celkoveVydaje() {
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

    // Dotaz na získání celkové hodnoty ze sloupce "cost"
    $dotaz = "SELECT SUM(price) as celkova_hodnota FROM costs";
    $vysledek = $spojeni->query($dotaz);

    // Kontrola úspěšného provedení dotazu
    if ($vysledek) {
        // Získání výsledku do asociativního pole
        $data = $vysledek->fetch_assoc();

        // Uložení celkové hodnoty do proměnné
        $celkoveVydaje = $data['celkova_hodnota'];

        // Uzavření spojení s databází
        $spojeni->close();

        // Vrácení celkové hodnoty
        return $celkoveVydaje;
    } else {
        // V případě chyby v dotazu
        die("Chyba při provádění dotazu: " . $spojeni->error);
    }
}

// Použití funkce a vypsání celkové hodnoty
$celkoveVydaje = celkoveVydaje();
?>





