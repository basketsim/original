<?php
if ($ekipazzogo == $home_id) {
SWITCH (TRUE) {
CASE ($home_off==0): $kolicina_metov = 22; $kolicina_napak = 9; $kolicina_osebnih = 9; break;
CASE ($home_off==1): $kolicina_metov = 22; $kolicina_napak = 6; $kolicina_osebnih = 10; break;
CASE ($home_off==2): $kolicina_metov = 25; $kolicina_napak = 8; $kolicina_osebnih = 11; break;
CASE ($home_off==3): $kolicina_metov = 23; $kolicina_napak = 7; $kolicina_osebnih = 10; break;
CASE ($home_off==4): $kolicina_metov = 22; $kolicina_napak = 8; $kolicina_osebnih = 13; break;
CASE ($home_off==5): $kolicina_metov = 22; $kolicina_napak = 8; $kolicina_osebnih = 11; break;
CASE ($home_off==6): $kolicina_metov = 23; $kolicina_napak = 8; $kolicina_osebnih = 12; break;

CASE ($away_def==0): $vpliv_na_mete = 0; $vpliv_na_napake = -1; $vpliv_na_osebne = 0; break;
CASE ($away_def==1): $vpliv_na_mete = -2; $vpliv_na_napake = 0; $vpliv_na_osebne = 0; break;
CASE ($away_def==2): $vpliv_na_mete = 0; $vpliv_na_napake = 1; $vpliv_na_osebne = 2; break;
CASE ($away_def==3): $vpliv_na_mete = 0; $vpliv_na_napake = 0; $vpliv_na_osebne = 0; break;
CASE ($away_def==4): $vpliv_na_mete = 0; $vpliv_na_napake = 0; $vpliv_na_osebne = -3; break;
CASE ($away_def==5): $vpliv_na_mete = 0; $vpliv_na_napake = 2; $vpliv_na_osebne = 0; break;
CASE ($away_def==6): $vpliv_na_mete = -1; $vpliv_na_napake = 1; $vpliv_na_osebne = 1; break;
}

$tim_napake = 1.6 * $homepg1_handling + 1.5 * $homepg1_passing + $homepg1_vision - 2 * $homepg1_fatigue + $homesg1_handling + 0.9 * $homesg1_passing + $homesg1_vision - 2 * $homesg1_fatigue + $homesf1_handling /2 + $homesf1_passing + $homesf1_vision - 2 * $homesf1_fatigue + $homepf1_passing /2 - 2 * $homepf1_fatigue - 2 * $homec1_fatigue - 1.5 * $awaypg1_defense - 1.5 * $awaysg1_defense - $awaysf1_defense - $awaypf1_defense /2;
$tim_napake = round($tim_napake);

if ($tim_napake < 1) {$dodam_napake = 6;}
elseif ($tim_napake > 0 AND $tim_napake < 51) {$dodam_napake = 5;}
elseif ($tim_napake > 50 AND $tim_napake < 101) {$dodam_napake = 4;}
elseif ($tim_napake > 100 AND $tim_napake < 151) {$dodam_napake = 3;}
elseif ($tim_napake > 150 AND $tim_napake < 201) {$dodam_napake = 2;}
elseif ($tim_napake > 200 AND $tim_napake < 261) {$dodam_napake = 1;}
elseif ($tim_napake > 260 AND $tim_napake < 321) {$dodam_napake = 0;}
elseif ($tim_napake > 320 AND $tim_napake < 381) {$dodam_napake = -1;}
elseif ($tim_napake > 380 AND $tim_napake < 451) {$dodam_napake = -2;}
elseif ($tim_napake > 450 AND $tim_napake < 521) {$dodam_napake = -3;}
elseif ($tim_napake > 520) {$dodam_napake = -4;}

$moznost_zamet = $kolicina_metov + $vpliv_na_mete;
$moznost_zanapako = $kolicina_napak + $vpliv_na_napake + $dodam_napake;
$moznost_zaosebno = $kolicina_osebnih + $vpliv_na_osebne;

//OSEBNE
$Hfouls = ($homepg1_defense * 2) + $homepg1_speed + ($homesg1_defense * 2) + $homesg1_speed + ($homesf1_defense * 2) + $homesf1_speed + ($homepf1_defense * 2) + $homepf1_speed + ($homec1_defense * 2) + $homec1_speed;
$Afouls = ($awaypg1_defense * 2) + $awaypg1_speed + ($awaysg1_defense * 2) + $awaysg1_speed + ($awaysf1_defense * 2) + $awaysf1_speed + ($awaypf1_defense * 2) + $awaypf1_speed + ($awayc1_defense * 2) + $awayc1_speed;
if ($Hfouls<$Afouls) {$moznost_zaosebno=$moznost_zaosebno-3;}

}
// konec racunanja za napad domacih
else
// se za napad gostov
{

SWITCH (TRUE) {
CASE ($away_off==0): $kolicina_metov = 22; $kolicina_napak = 9; $kolicina_osebnih = 9; break;
CASE ($away_off==1): $kolicina_metov = 22; $kolicina_napak = 6; $kolicina_osebnih = 10; break;
CASE ($away_off==2): $kolicina_metov = 25; $kolicina_napak = 8; $kolicina_osebnih = 11; break;
CASE ($away_off==3): $kolicina_metov = 23; $kolicina_napak = 7; $kolicina_osebnih = 10; break;
CASE ($away_off==4): $kolicina_metov = 22; $kolicina_napak = 8; $kolicina_osebnih = 13; break;
CASE ($away_off==5): $kolicina_metov = 22; $kolicina_napak = 8; $kolicina_osebnih = 11; break;
CASE ($away_off==6): $kolicina_metov = 23; $kolicina_napak = 8; $kolicina_osebnih = 12; break;

CASE ($home_def==0): $vpliv_na_mete = 0; $vpliv_na_napake = -1; $vpliv_na_osebne = 0; break;
CASE ($home_def==1): $vpliv_na_mete = -2; $vpliv_na_napake = 0; $vpliv_na_osebne = 0; break;
CASE ($home_def==2): $vpliv_na_mete = 0; $vpliv_na_napake = 1; $vpliv_na_osebne = 2; break;
CASE ($home_def==3): $vpliv_na_mete = 0; $vpliv_na_napake = 0; $vpliv_na_osebne = 0; break;
CASE ($home_def==4): $vpliv_na_mete = 0; $vpliv_na_napake = 0; $vpliv_na_osebne = -3; break;
CASE ($home_def==5): $vpliv_na_mete = 0; $vpliv_na_napake = 2; $vpliv_na_osebne = 0; break;
CASE ($home_def==6): $vpliv_na_mete = -1; $vpliv_na_napake = 1; $vpliv_na_osebne = 1; break;
}
// konec switcha

$tim_napake1 = 1.6 * $awaypg1_handling + 1.5 * $awaypg1_passing + $awaypg1_vision - 2 * $awaypg1_fatigue + $awaysg1_handling + 0.9 * $awaysg1_passing + $awaysg1_vision - 2 * $awaysg1_fatigue + $awaysf1_handling /2 + $awaysf1_passing + $awaysf1_vision - 2 * $awaysf1_fatigue + $awaypf1_passing /2 - 2 * $awaypf1_fatigue - 2 * $awayc1_fatigue - 1.5 * $homepg1_defense - 1.5 * $homesg1_defense - $homesf1_defense - $homepf1_defense /2;
$tim_napake1 = round($tim_napake1);

if ($tim_napake1 < 1) {$dodam_napake = 6;}
elseif ($tim_napake1 > 0 AND $tim_napake1 < 51) {$dodam_napake = 5;}
elseif ($tim_napake1 > 50 AND $tim_napake1 < 101) {$dodam_napake = 4;}
elseif ($tim_napake1 > 100 AND $tim_napake1 < 151) {$dodam_napake = 3;}
elseif ($tim_napake1 > 150 AND $tim_napake1 < 201) {$dodam_napake = 2;}
elseif ($tim_napake1 > 200 AND $tim_napake1 < 261) {$dodam_napake = 1;}
elseif ($tim_napake1 > 260 AND $tim_napake1 < 321) {$dodam_napake = 0;}
elseif ($tim_napake1 > 320 AND $tim_napake1 < 381) {$dodam_napake = -1;}
elseif ($tim_napake1 > 380 AND $tim_napake1 < 451) {$dodam_napake = -2;}
elseif ($tim_napake1 > 450 AND $tim_napake1 < 521) {$dodam_napake =  -3;}
elseif ($tim_napake1 > 520) {$dodam_napake = -4;}

$moznost_zamet = $kolicina_metov + $vpliv_na_mete;
$moznost_zanapako = $kolicina_napak + $vpliv_na_napake + $dodam_napake;
$moznost_zaosebno = $kolicina_osebnih + $vpliv_na_osebne;

//OSEBNE
$Hfouls = ($homepg1_defense * 2) + $homepg1_speed + ($homesg1_defense * 2) + $homesg1_speed + ($homesf1_defense * 2) + $homesf1_speed + ($homepf1_defense * 2) + $homepf1_speed + ($homec1_defense * 2) + $homec1_speed;
$Afouls = ($awaypg1_defense * 2) + $awaypg1_speed + ($awaysg1_defense * 2) + $awaysg1_speed + ($awaysf1_defense * 2) + $awaysf1_speed + ($awaypf1_defense * 2) + $awaypf1_speed + ($awayc1_defense * 2) + $awayc1_speed;
if ($Hfouls>$Afouls) {$moznost_zaosebno=$moznost_zaosebno-3;}

}
// konec racunanja za napad gostov
// konec zanke

$skup = ($moznost_zamet + $moznost_zanapako + $moznost_zaosebno);

if (($home_pg1==0) OR ($home_sg1==0) OR ($home_sf1==0) OR ($home_pf1==0) OR ($home_c1==0) OR ($away_pg1==0) OR ($away_sg1==0) OR ($away_sf1==0) OR ($away_pf1==0) OR ($away_c1== 0)) {$mposkodb = rand(0,$slabokaze2);} else {$mposkodb = rand(0,$slabokaze);}
if ($nadaljevandogodek<>0) {$mposkodb=0;}

SWITCH (TRUE) {
CASE ($mposkodb < $slabokaze):
if ($nadaljevandogodek == 1) {$dogodek=3;}
elseif ($nadaljevandogodek == 2) {$dogodek=4;}
else  {
$vplivnadogodek = rand(0,$skup);
if ($vplivnadogodek < $moznost_zamet) {$dogodek = 0;}
elseif ($vplivnadogodek >= $moznost_zamet AND $vplivnadogodek < ($moznost_zamet+$moznost_zanapako)) {$dogodek = 1;}
elseif ($vplivnadogodek >= ($moznost_zamet+$moznost_zanapako)) {$dogodek = 2;}
}
//korekcija randoma
if ($dogodek==0 && $ekipazzogo == $home_id && $home_noofshots > 9 && $home_noofTOs > 0 && $home_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) < ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) > ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==0 && $ekipazzogo == $away_id && $away_noofshots > 9 && $away_noofTOs > 0 && $away_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) < ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) > ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==1 && $ekipazzogo == $home_id && $home_noofshots > 9 && $home_noofTOs > 0 && $home_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes));
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) < ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=0;}
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) > ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==1 && $ekipazzogo == $away_id && $away_noofshots > 9 && $away_noofTOs > 0 && $away_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes));
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) < ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=0;}
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) > ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==2 && $ekipazzogo == $home_id && $home_noofshots > 9 && $home_noofTOs > 0 && $home_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) < ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) > ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=0;}
}
elseif ($dogodek==2 && $ekipazzogo == $away_id && $away_noofshots > 9 && $away_noofTOs > 0 && $away_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) < ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) > ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=0;}
}
//štejem dogodke
if ($dogodek==0 && $ekipazzogo == $home_id) {$home_noofshots=$home_noofshots+1;}
elseif ($dogodek==0 && $ekipazzogo == $away_id) {$away_noofshots=$away_noofshots+1;}
elseif ($dogodek==1 && $ekipazzogo == $home_id) {$home_noofTOs=$home_noofTOs+1;}
elseif ($dogodek==1 && $ekipazzogo == $away_id) {$away_noofTOs=$away_noofTOs+1;}
elseif ($dogodek==2 && $ekipazzogo == $home_id) {$home_fouledtimes=$home_fouledtimes+1;}
elseif ($dogodek==2 && $ekipazzogo == $away_id) {$away_fouledtimes=$away_fouledtimes+1;}
break;
CASE ($mposkodb == $slabokaze):
$kdo_nastrada = rand(0,9);
if ($kdo_nastrada == 0) {$nastradalje=$home_pg1; $home_pg1=0; $home_pg1_favli=0;}
elseif ($kdo_nastrada == 1) {$nastradalje=$away_pg1; $away_pg1=0; $away_pg1_favli=0;}
elseif ($kdo_nastrada == 2) {$nastradalje=$home_sg1; $home_sg1=0; $home_sg1_favli=0;}
elseif ($kdo_nastrada == 3) {$nastradalje=$away_sg1; $away_sg1=0; $away_sg1_favli=0;}
elseif ($kdo_nastrada == 4) {$nastradalje=$home_sf1; $home_sf1=0; $home_sf1_favli=0;}
elseif ($kdo_nastrada == 5) {$nastradalje=$away_sf1; $away_sf1=0; $away_sf1_favli=0;}
elseif ($kdo_nastrada == 6) {$nastradalje=$home_pf1; $home_pf1=0; $home_pf1_favli=0;}
elseif ($kdo_nastrada == 7) {$nastradalje=$away_pf1; $away_pf1=0; $away_pf1_favli=0;}
elseif ($kdo_nastrada == 8) {$nastradalje=$home_c1; $home_c1=0; $home_c1_favli=0;}
elseif ($kdo_nastrada == 9) {$nastradalje=$away_c1; $away_c1=0; $away_c1_favli=0;}
//nadomestni igralci
if ($home_pg1 == 0) {$home_pg1 = $home_pg2; $home_pg2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_sg2; $home_sg2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_sf2; $home_sf2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_pf2; $home_pf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_c2; $home_c2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_sg2; $home_sg2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_sf2; $home_sf2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_pf2; $home_pf2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_c2; $home_c2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_pg2; $home_pg2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_sf2; $home_sf2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_pf2; $home_pf2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_c2; $home_c2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_sg2; $home_sg2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_pf2; $home_pf2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_c2; $home_c2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_pg2; $home_pg2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_c2; $home_c2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_sf2; $home_sf2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_sg2; $home_sg2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_pg2; $home_pg2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_pf2; $home_pf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_sf2; $home_sf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_sg2; $home_sg2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_pg2; $home_pg2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_pg2; $away_pg2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_sg2; $away_sg2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_sf2; $away_sf2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_pf2; $away_pf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_c2; $away_c2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_sg2; $away_sg2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_sf2; $away_sf2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_pf2; $away_pf2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_c2; $away_c2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_pg2; $away_pg2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_sf2; $away_sf2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_pf2; $away_pf2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_c2; $away_c2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_sg2; $away_sg2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_pf2; $away_pf2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_c2; $away_c2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_pg2; $away_pg2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_c2; $away_c2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_sf2; $away_sf2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_sg2; $away_sg2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_pg2; $away_pg2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_pf2; $away_pf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_sf2; $away_sf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_sg2; $away_sg2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_pg2; $away_pg2 = 0;}

$kolikoposkodbe = rand(0,3986);
if ($kolikoposkodbe < 889) {$poskodovan_za = rand(1,19)/10;}
elseif ($kolikoposkodbe > 888 AND $kolikoposkodbe < 1836) {$poskodovan_za = rand(20,29)/10;}
elseif ($kolikoposkodbe > 1835 AND $kolikoposkodbe < 2779) {$poskodovan_za = rand(30,39)/10;}
elseif ($kolikoposkodbe > 2778 AND $kolikoposkodbe < 3864) {$poskodovan_za = rand(40,49)/10;}
elseif ($kolikoposkodbe > 3863 AND $kolikoposkodbe < 3919) {$poskodovan_za = rand(50,59)/10;}
elseif ($kolikoposkodbe > 3918 AND $kolikoposkodbe < 3952) {$poskodovan_za = rand(60,69)/10;}
elseif ($kolikoposkodbe > 3951 AND $kolikoposkodbe < 3972) {$poskodovan_za = rand(70,79)/10;}
elseif ($kolikoposkodbe > 3971 AND $kolikoposkodbe < 3982) {$poskodovan_za = rand(80,89)/10;}
elseif ($kolikoposkodbe > 3981 AND $kolikoposkodbe < 3986) {$poskodovan_za = rand(90,99)/10;}
elseif ($kolikoposkodbe==3986) {$poskodovan_za = rand(100,109)/10;}
$poskodbe_cas = round($poskodovan_za, 1);
if ($poskodbe_cas >1 && $type==5) {$poskodbe_cas=1;}
if ($poskodbe_cas >5 && ($type==6 ||$type==7)) {$poskodbe_cas=5;}
if ($poskodbe_cas >1 && $type>17) {$poskodbe_cas=0;}

if (($home_pg1==0) OR ($home_sg1==0) OR ($home_sf1==0) OR ($home_pf1==0) OR ($home_c1==0) OR ($away_pg1==0) OR ($away_sg1==0) OR ($away_sf1==0) OR ($away_pf1==0) OR ($away_c1==0)) {$walkover=14; $dogodek=6;
$mev=39;
shuffle($ddogodek[$mev]);
$taopis=$ddogodek[$mev][0];
SWITCH ($kdo_nastrada) {
CASE 0: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); break;
CASE 1: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); break;
CASE 2: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); break;
CASE 3: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); break;
CASE 4: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); break;
CASE 5: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); break;
CASE 6: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); break;
CASE 7: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); break;
CASE 8: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); break;
CASE 9: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); break;
}
} else {
$mev=33;
shuffle($ddogodek[$mev]);
$taopis=$ddogodek[$mev][0];
SWITCH ($kdo_nastrada) {
CASE 0: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,$home_pg1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); require('infhpg2.php'); break;
CASE 1: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,$away_pg1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); require('infapg2.php'); break;
CASE 2: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,$home_sg1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); require('infhsg2.php'); break;
CASE 3: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,$away_sg1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); require('infasg2.php'); break;
CASE 4: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,$home_sf1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); require('infhsf2.php'); break;
CASE 5: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,$away_sf1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); require('infasf2.php'); break;
CASE 6: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,$home_pf1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); require('infhpf2.php'); break;
CASE 7: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,$away_pf1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); require('infapf2.php'); break;
CASE 8: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$home_id,$home_c1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $home_id, $poskodbe_cas, '$time', 0);"); require('infhc2.php'); break;
CASE 9: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$nastradalje,$away_id,$away_c1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)");
mysql_query("INSERT INTO injuries VALUES ('', $matchid, $nastradalje, $away_id, $poskodbe_cas, '$time', 0);"); require('infac2.php'); break;
}
}
if ($nadaljevandogodek<>2) {
$vplivnadogodek = rand(0,$skup);
if ($vplivnadogodek < $moznost_zamet) {$dogodek = 0;}
elseif ($vplivnadogodek >= $moznost_zamet AND $vplivnadogodek < ($moznost_zamet+$moznost_zanapako)) {$dogodek = 1;}
elseif ($vplivnadogodek >= ($moznost_zamet+$moznost_zanapako)) {$dogodek = 2;}
}
//korekcija randoma
if ($dogodek==0 && $ekipazzogo == $home_id && $home_noofshots > 9 && $home_noofTOs > 0 && $home_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) < ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) > ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==0 && $ekipazzogo == $away_id && $away_noofshots > 9 && $away_noofTOs > 0 && $away_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) < ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) > ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==1 && $ekipazzogo == $home_id && $home_noofshots > 9 && $home_noofTOs > 0 && $home_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes));
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) < ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=0;}
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) > ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==1 && $ekipazzogo == $away_id && $away_noofshots > 9 && $away_noofTOs > 0 && $away_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes));
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) < ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=0;}
if ($izracun < -0.09 && ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) > ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=2;}
}
elseif ($dogodek==2 && $ekipazzogo == $home_id && $home_noofshots > 9 && $home_noofTOs > 0 && $home_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zaosebno / $skup) - ($home_fouledtimes / ($home_noofshots+$home_noofTOs+$home_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) < ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($home_noofTOs / ($home_noofshots+$home_noofTOs+$home_fouledtimes)) > ($moznost_zamet / $skup) - ($home_noofshots / ($home_noofshots+$home_noofTOs+$home_fouledtimes))) {$dogodek=0;}
}
elseif ($dogodek==2 && $ekipazzogo == $away_id && $away_noofshots > 9 && $away_noofTOs > 0 && $away_fouledtimes > 1 && $stevilodogodkov1 > 11) {
$izracun = ($moznost_zaosebno / $skup) - ($away_fouledtimes / ($away_noofshots+$away_noofTOs+$away_fouledtimes));
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) < ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=1;}
if ($izracun < -0.09 && ($moznost_zanapako / $skup) - ($away_noofTOs / ($away_noofshots+$away_noofTOs+$away_fouledtimes)) > ($moznost_zamet / $skup) - ($away_noofshots / ($away_noofshots+$away_noofTOs+$away_fouledtimes))) {$dogodek=0;}
}
//štejem dogodke
if ($dogodek==0 && $ekipazzogo == $home_id) {$home_noofshots=$home_noofshots+1;}
elseif ($dogodek==0 && $ekipazzogo == $away_id) {$away_noofshots=$away_noofshots+1;}
elseif ($dogodek==1 && $ekipazzogo == $home_id) {$home_noofTOs=$home_noofTOs+1;}
elseif ($dogodek==1 && $ekipazzogo == $away_id) {$away_noofTOs=$away_noofTOs+1;}
elseif ($dogodek==2 && $ekipazzogo == $home_id) {$home_fouledtimes=$home_fouledtimes+1;}
elseif ($dogodek==2 && $ekipazzogo == $away_id) {$away_fouledtimes=$away_fouledtimes+1;}
break;
}

if (($home_pg1==0) OR ($home_sg1==0) OR ($home_sf1==0) OR ($home_pf1==0) OR ($home_c1==0) OR ($away_pg1==0) OR ($away_sg1==0) OR ($away_sf1==0) OR ($away_pf1==0) OR ($away_c1==0)) {
//nadomestni igralci
if ($home_pg1 == 0) {$home_pg1 = $home_pg2; $home_pg2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_sg2; $home_sg2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_sf2; $home_sf2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_pf2; $home_pf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_c2; $home_c2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_sg2; $home_sg2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_sf2; $home_sf2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_pf2; $home_pf2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_c2; $home_c2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_pg2; $home_pg2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_sf2; $home_sf2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_pf2; $home_pf2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_c2; $home_c2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_sg2; $home_sg2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_pf2; $home_pf2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_c2; $home_c2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_pg2; $home_pg2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_c2; $home_c2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_sf2; $home_sf2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_sg2; $home_sg2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_pg2; $home_pg2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_pf2; $home_pf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_sf2; $home_sf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_sg2; $home_sg2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_pg2; $home_pg2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_pg2; $away_pg2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_sg2; $away_sg2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_sf2; $away_sf2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_pf2; $away_pf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_c2; $away_c2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_sg2; $away_sg2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_sf2; $away_sf2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_pf2; $away_pf2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_c2; $away_c2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_pg2; $away_pg2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_sf2; $away_sf2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_pf2; $away_pf2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_c2; $away_c2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_sg2; $away_sg2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_pf2; $away_pf2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_c2; $away_c2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_pg2; $away_pg2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_c2; $away_c2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_sf2; $away_sf2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_sg2; $away_sg2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_pg2; $away_pg2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_pf2; $away_pf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_sf2; $away_sf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_sg2; $away_sg2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_pg2; $away_pg2 = 0;}

if (($home_pg1 == 0) OR ($home_sg1 == 0) OR ($home_sf1 == 0) OR ($home_pf1 == 0) or ($home_c1 == 0))
{$walkover=14; $dogodek=6; $mev=37; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,0,$away_id,37,$taopis,'$eventime',$cetrtina,1,20)";
}
elseif (($away_pg1 == 0) OR ($away_sg1 == 0) OR ($away_sf1 == 0) OR ($away_pf1 == 0) or ($away_c1 == 0))
{$walkover=14; $dogodek=6; $mev=37; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,0,$home_id,37,$taopis,'$eventime',$cetrtina,20,1)";
}
else {
$mev=38;
shuffle($ddogodek[$mev]);
$taopis=$ddogodek[$mev][0];
SWITCH ($bonusdosegel) {
CASE 0: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$home_id,$home_pg1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhpg2.php'); break;
CASE 1: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$home_id,$home_sg1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhsg2.php'); break;
CASE 2: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$home_id,$home_sf1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhsf2.php'); break;
CASE 3: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$home_id,$home_pf1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhpf2.php'); break;
CASE 4: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$home_id,$home_c1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhc2.php'); break;
CASE 5: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$away_id,$away_pg1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infapg2.php'); break;
CASE 6: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$away_id,$away_sg1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infasg2.php'); break;
CASE 7: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$away_id,$away_sf1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infasf2.php'); break;
CASE 8: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$away_id,$away_pf1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infapf2.php'); break;
CASE 9: mysql_query("INSERT INTO matchevents1 VALUES ('',$matchid,$vengre,$away_id,$away_c1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infac2.php'); break;
}
}
}
?>