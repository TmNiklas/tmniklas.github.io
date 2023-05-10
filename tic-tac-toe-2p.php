<?php

$spiel_aktiv = True;
$zuganzahl = 0;
$spieler_aktuell = "X";
$spielfeld = [" ",
    "1", "2", "3",
    "4", "5", "6",
    "7", "8", "9"];


function spielfeld_ausgeben(){
    global $spielfeld;
    echo("\n" . $spielfeld[1] . "|" . $spielfeld[2] . "|" . $spielfeld[3] . "\r\n" .
        $spielfeld[4] . "|" . $spielfeld[5] . "|" . $spielfeld[6] . "\r\n" .
        $spielfeld[7] . "|" . $spielfeld[8] . "|" . $spielfeld[9] . "\n");
}


function spieler_wechseln(){
    global $spieler_aktuell;
    if ($spieler_aktuell == 'X'){
        $spieler_aktuell = 'O';}
    else{
        $spieler_aktuell = 'X';}
}


function check_if_won()
{
    # Kontrolle auf Zeilen
    global $spielfeld;
    if($spielfeld[1] == $spielfeld[2] && $spielfeld[2] == $spielfeld[3]){
        return $spielfeld[1];}
    if ($spielfeld[4] == $spielfeld[5] && $spielfeld[5] == $spielfeld[6]){
        return $spielfeld[4];}
    if($spielfeld[7] == $spielfeld[8] && $spielfeld[8] == $spielfeld[9]){
        return $spielfeld[7];}
    # Kontrolle auf Spalten
    if ($spielfeld[1] == $spielfeld[4] && $spielfeld[4]== $spielfeld[7]){
        return $spielfeld[1];}
    if ($spielfeld[2] == $spielfeld[5] && $spielfeld[5] == $spielfeld[8]){
        return $spielfeld[2];}
    if ($spielfeld[3] == $spielfeld[6] && $spielfeld[6] == $spielfeld[9]){
        return $spielfeld[3];}
    # Kontrolle auf Diagonalen
    if ($spielfeld[1] == $spielfeld[5] && $spielfeld[5] == $spielfeld[9]){
        return $spielfeld[5];}
    if ($spielfeld[7] == $spielfeld[5] && $spielfeld[5] == $spielfeld[3]){
        return $spielfeld[5];}
}





spielfeld_ausgeben();

function spieler_eingabe()
{
    global $spiel_aktiv;
    global $spielfeld;

    while (True) {
        echo("\nSpielfeld eingeben\n");
        $spielzug = readline("\r\nBitte Feld eingeben: \n");
        if ($spielzug == 'q') {
            return null;
        }

        try {
            $spielzug = intval($spielzug);
        } catch (ValueError) {
            echo("Bitte Zahl von 1 bis 9 eingeben");
        }

        if ($spielzug >= 1 && $spielzug <= 9) {
            if ($spielfeld[$spielzug] == 'X' || $spielfeld[$spielzug] == 'O') {
                print("Das Feld ist bereits besetzt! Bitte ein anderes wählen!");
            } else {
                return $spielzug;
            }
        } else {
            echo("Die eingegebene Zahl muss zwischen 1 und 9 liegen");
        }
    }
}

function main(){
    global $spielfeld;
    global $spiel_aktiv;
    global $spieler_aktuell;
    global $zuganzahl;

    while ($spiel_aktiv){
        if ($spieler_aktuell == "X"){
            echo ("\nSpieler " . $spieler_aktuell . " am Zug\n");
            $spielzug = spieler_eingabe();

            if ($spielzug){
                $spielfeld[$spielzug] = $spieler_aktuell;
            }

            $zuganzahl++;

            spielfeld_ausgeben();

            if (check_if_won()){
                echo("\nSpieler " . $spieler_aktuell . " hat gewonnen!");
                $spiel_aktiv = false;
                exit(0);
            }

            if ($zuganzahl == 9){
                echo("\nDas Spiel ist unentschieden ausgegangen");
                $spiel_aktiv = false;
                exit(0);
            }

            spieler_wechseln();

            if ($spieler_aktuell == "O"){
                echo ("\nSpieler " . $spieler_aktuell . " am Zug\n");
            }

            $spielzug = spieler_eingabe();

            if ($spielzug){
                $spielfeld[$spielzug] = $spieler_aktuell;
            }

            $spielfeld[$spielzug] = $spieler_aktuell;

            $zuganzahl++;

            spielfeld_ausgeben();

            if (check_if_won()){
                echo("\nSpieler " . $spieler_aktuell . " hat gewonnen!");
                $spiel_aktiv = false;
                exit(0);
            }

            if ($zuganzahl == 9){
                echo("\nDas Spiel ist unentschieden ausgegangen");
                $spiel_aktiv = false;
                exit(0);
            }

            spieler_wechseln();
        }
    }
}

main();
