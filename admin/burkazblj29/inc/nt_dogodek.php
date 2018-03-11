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

if ($home_mood < 20) {$dodam_napake = 4;}
elseif ($home_mood > 19 AND $home_mood < 40) {$dodam_napake = 3;}
elseif ($home_mood > 39 AND $home_mood < 60) {$dodam_napake = 2;}
elseif ($home_mood > 59 AND $home_mood < 80) {$dodam_napake = 1;}
elseif ($home_mood > 80 AND $home_mood < 120) {$dodam_napake = 0;}
elseif ($home_mood > 119 AND $home_mood < 140) {$dodam_napake = -1;}
elseif ($home_mood > 139) {$dodam_napake = -2;}

$noviTO = 1.6 * $homepg1_handling + 1.5 * $homepg1_passing + $homepg1_vision - 2 * $homepg1_fatigue + $homesg1_handling + 0.9 * $homesg1_passing + $homesg1_vision - 2 * $homesg1_fatigue + $homesf1_handling /2 + $homesf1_passing + $homesf1_vision - 2 * $homesf1_fatigue + $homepf1_passing /2 - 2 * $homepf1_fatigue - 2 * $homec1_fatigue - 1.5 * $awaypg1_defense - 1.5 * $awaysg1_defense - $awaysf1_defense - $awaypf1_defense /2;
$noviTO = round($noviTO);

if ($noviTO < 200) {$kokrkok=2;}
elseif ($noviTO > 199 AND $noviTO < 300) {$kokrkok=1;}
elseif ($noviTO > 299 AND $noviTO < 400) {$kokrkok=0;}
elseif ($noviTO > 399 AND $noviTO < 500) {$kokrkok=-1;}
elseif ($noviTO > 499) {$kokrkok=-2;}

$moznost_zamet = $kolicina_metov + $vpliv_na_mete;
$moznost_zanapako = $kolicina_napak + $vpliv_na_napake + $dodam_napake + $kokrkok;
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

if ($away_mood < 20) {$dodam_napake1 = 4;}
elseif ($away_mood > 19 AND $away_mood < 40) {$dodam_napake1 = 3;}
elseif ($away_mood > 39 AND $away_mood < 60) {$dodam_napake1 = 2;}
elseif ($away_mood > 59 AND $away_mood < 80) {$dodam_napake1 = 1;}
elseif ($away_mood > 80 AND $away_mood < 120) {$dodam_napake1 = 0;}
elseif ($away_mood > 119 AND $away_mood < 140) {$dodam_napake1 = -1;}
elseif ($away_mood > 139) {$dodam_napake1 = -2;}

$noviTO1 = 1.6 * $awaypg1_handling + 1.5 * $awaypg1_passing + $awaypg1_vision - 2 * $awaypg1_fatigue + $awaysg1_handling + 0.9 * $awaysg1_passing + $awaysg1_vision - 2 * $awaysg1_fatigue + $awaysf1_handling /2 + $awaysf1_passing + $awaysf1_vision - 2 * $awaysf1_fatigue + $awaypf1_passing /2 - 2 * $awaypf1_fatigue - 2 * $awayc1_fatigue - 1.5 * $homepg1_defense - 1.5 * $homesg1_defense - $homesf1_defense - $homepf1_defense /2;
$noviTO1 = round($noviTO1);

if ($noviTO1 < 200) {$kokrkok=2;}
elseif ($noviTO1 > 199 AND $noviTO1 < 300) {$kokrkok=1;}
elseif ($noviTO1 > 299 AND $noviTO1 < 400) {$kokrkok=0;}
elseif ($noviTO1 > 399 AND $noviTO1 < 500) {$kokrkok=-1;}
elseif ($noviTO1 > 499) {$kokrkok=-2;}

$moznost_zamet = $kolicina_metov + $vpliv_na_mete;
$moznost_zanapako = $kolicina_napak + $vpliv_na_napake + $dodam_napake1 + $kokrkok;
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
if ($nadaljevandogodek==1) {$dogodek=3;}
elseif ($nadaljevandogodek==2) {$dogodek=4;}
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
//izpis

$kolikoposkodbe = rand(0,3986);
if ($kolikoposkodbe < 760) {$poskodovan_za = rand(1,19)/10;}
elseif ($kolikoposkodbe > 759 AND $kolikoposkodbe < 1901) {$poskodovan_za = rand(20,29)/10;}
elseif ($kolikoposkodbe > 1900 AND $kolikoposkodbe < 2812) {$poskodovan_za = rand(30,39)/10;}
elseif ($kolikoposkodbe > 2811 AND $kolikoposkodbe < 3881) {$poskodovan_za = rand(40,49)/10;}
elseif ($kolikoposkodbe > 3880 AND $kolikoposkodbe < 3928) {$poskodovan_za = rand(50,59)/10;}
elseif ($kolikoposkodbe > 3927 AND $kolikoposkodbe < 3957) {$poskodovan_za = rand(60,69)/10;}
elseif ($kolikoposkodbe > 3956 AND $kolikoposkodbe < 3978) {$poskodovan_za = rand(70,79)/10;}
elseif ($kolikoposkodbe > 3977) {$poskodovan_za = rand(80,89)/10;}
$poskodbe_cas = round($poskodovan_za, 1);
mysql_query("UPDATE players SET injury = injury + $poskodbe_cas WHERE id = $nastradalje LIMIT 1");

if (($home_pg1 == 0) OR ($home_sg1 == 0) OR ($home_sf1 == 0) OR ($home_pf1 == 0) OR ($home_c1 == 0) OR ($away_pg1 == 0) OR ($away_sg1 == 0) OR ($away_sf1 == 0) OR ($away_pf1 == 0) OR ($away_c1 == 0))
{$walkover=14; $dogodek=6;
$nekopis = mysql_query("SELECT descid FROM descriptions WHERE matchevent = 39 ORDER BY RAND() LIMIT 1");
$taopis = mysql_result($nekopis,0);
SWITCH ($kdo_nastrada) {
CASE 0: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 1: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 2: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 3: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 4: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 5: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 6: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 7: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 8: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
CASE 9: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,0,0,39,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); break;
}
} else {
$nekopis = mysql_query("SELECT descid FROM descriptions WHERE matchevent = 33 ORDER BY RAND() LIMIT 1");
$taopis = mysql_result($nekopis,0);
SWITCH ($kdo_nastrada) {
CASE 0: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,$home_pg1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhpg2.php'); break;
CASE 1: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,$away_pg1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infapg2.php'); break;
CASE 2: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,$home_sg1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhsg2.php'); break;
CASE 3: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,$away_sg1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infasg2.php'); break;
CASE 4: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,$home_sf1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhsf2.php'); break;
CASE 5: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,$away_sf1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infasf2.php'); break;
CASE 6: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,$home_pf1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhpf2.php'); break;
CASE 7: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,$away_pf1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infapf2.php'); break;
CASE 8: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$home_id,$home_c1,$home_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhc2.php'); break;
CASE 9: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$nastradalje,$away_id,$away_c1,$away_id,33,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infac2.php'); break;
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

if (($home_pg1 == 0) OR ($home_sg1 == 0) OR ($home_sf1 == 0) OR ($home_pf1 == 0) OR ($home_c1 == 0) OR ($away_pg1 == 0) OR ($away_sg1 == 0) OR ($away_sf1 == 0) OR ($away_pf1 == 0) OR ($away_c1 == 0))
{
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
$nekopis = mysql_query("SELECT descid FROM descriptions WHERE matchevent = 38 ORDER BY RAND() LIMIT 1");
$taopis = mysql_result($nekopis,0);
SWITCH ($bonusdosegel) {
CASE 0: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$home_id,$home_pg1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhpg2.php'); break;
CASE 1: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$home_id,$home_sg1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhsg2.php'); break;
CASE 2: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$home_id,$home_sf1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhsf2.php'); break;
CASE 3: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$home_id,$home_pf1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhpf2.php'); break;
CASE 4: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$home_id,$home_c1,$home_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infhc2.php'); break;
CASE 5: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$away_id,$away_pg1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infapg2.php'); break;
CASE 6: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$away_id,$away_sg1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infasg2.php'); break;
CASE 7: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$away_id,$away_sf1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infasf2.php'); break;
CASE 8: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$away_id,$away_pf1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infapf2.php'); break;
CASE 9: mysql_query("INSERT INTO nt_matchevents VALUES ('',$matchid,$vengre,$away_id,$away_c1,$away_id,38,$taopis,'$eventime',$cetrtina,$homescore,$awayscore)"); require('infac2.php'); break;
}
}
}
?>