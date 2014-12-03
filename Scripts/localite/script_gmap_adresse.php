<?php


function findByAddress($address = "") {
    $url = "http://maps.google.com/maps/api/geocode/json?address=".$address."&sensor=false";
    $response = file_get_contents($url);
    $response = json_decode($response, true);
     
    
     
    $lat = ((isset($response['results'][0]['geometry']['location']['lat']))?$response['results'][0]['geometry']['location']['lat']:0);
    $long = ((isset($response['results'][0]['geometry']['location']['lng']))?$response['results'][0]['geometry']['location']['lng']:0);

    $coord = array('lat'=>$lat,'long'=>$long);

    return $coord;

}

function generateSqlLocalite(array $params,$id=1)
{
    $sql = "INSERT into localite(id,name,type,latitude,longitude)  VALUES ";

    
    foreach ($params as $key => $param) {
       if ($key > 0 && $key < count($params))   $sql.=',';
       $idBase = $id+$key;
       $sql.= '('.$idBase.','.$param['name'].','.$param['type'].','.$param['latitude'].','.$param['longitude'].')';
    }

    return $sql;

}

function generateParamsFromSql($sqlLines,$type = "gouvernorat") {
$aParamsGouvernorat = array();
$aGouvernorats = array();
$aGouvernorats = explode("\n",$sqlLines);
$aParamsGouvernorat = array();
foreach ($aGouvernorats as $key => $lingGouvernorat) {
        //echo $lingGouvernorat."<br>";
        $partsLine = explode(',',$lingGouvernorat);
        if (isset($partsLine[1])) {
            $gouvernorat = str_replace("'","",trim($partsLine[1]));
            $gouvernorat = ucfirst(strtolower($gouvernorat));
            echo $gouvernorat."<br>";
            $address = trim(ucfirst(strtolower($gouvernorat)))."&region=TN";
            $coord = findByAddress($address);
            $aParamsGouvernorat[] = array('name' => '"'.$gouvernorat.'"',
                                          'type' => '"'.$type.'"',
                                          'latitude'=> $coord['lat'],
                                          'longitude'=> $coord['long'],
                    );
            unset($coord);

            
        }


}

return $aParamsGouvernorat;

}


$gouvernorats = "
(1, 'ARIANA', 1),
(2, 'BEJA', 1),
(3, 'BEN AROUS', 1),
(4, 'BIZERTE', 1),
(5, 'GABES', 1),
(6, 'GAFSA', 1),
(7, 'JENDOUBA', 1),
(8, 'KAIROUAN', 1),
(9, 'KASSERINE', 1),
(10, 'KEBILI', 1),
(11, 'KEF', 1),
(12, 'MAHDIA', 1),
(13, 'MANOUBA', 1),
(14, 'MEDENINE', 1),
(15, 'MONASTIR', 1),
(16, 'NABEUL', 1),
(17, 'SFAX', 1),
(18, 'SIDI BOUZID', 1),
(19, 'SILIANA', 1),
(20, 'SOUSSE', 1),
(21, 'TATAOUINE', 1),
(22, 'TOZEUR', 1),
(23, 'TUNIS', 1),
(24, 'ZAGHOUAN', 1);
";

/*$aParamsGouvernorat = generateParamsFromSql($gouvernorats,"gouvernorat");

$sqlGouvernorat = generateSqlLocalite($aParamsGouvernorat);
echo $sqlGouvernorat;
*/



$delegations = "
(1, 'RAOUED', 1),
(2, 'SIDI THABET', 1),
(3, 'ARIANA VILLE', 1),
(4, 'LA SOUKRA', 1),
(5, 'KALAAT LANDLOUS', 1),
(6, 'ETTADHAMEN', 1),
(7, 'MNIHLA', 1),
(8, 'BEJA NORD', 2),
(9, 'NEFZA', 2),
(10, 'GOUBELLAT', 2),
(11, 'MEJEZ EL BAB', 2),
(12, 'AMDOUN', 2),
(13, 'TEBOURSOUK', 2),
(14, 'TESTOUR', 2),
(15, 'THIBAR', 2),
(16, 'BEJA SUD', 2),
(17, 'EZZAHRA', 3),
(18, 'MOHAMADIA', 3),
(19, 'RADES', 3),
(20, 'EL MOUROUJ', 3),
(21, 'FOUCHANA', 3),
(22, 'HAMMAM CHATT', 3),
(23, 'HAMMAM LIF', 3),
(24, 'MEGRINE', 3),
(25, 'NOUVELLE MEDINA', 3),
(26, 'MORNAG', 3),
(27, 'BOU MHEL EL BASSATINE', 3),
(28, 'BEN AROUS', 3),
(29, 'MENZEL BOURGUIBA', 4),
(30, 'UTIQUE', 4),
(31, 'MENZEL JEMIL', 4),
(32, 'BIZERTE NORD', 4),
(33, 'BIZERTE SUD', 4),
(34, 'EL ALIA', 4),
(35, 'SEJNANE', 4),
(36, 'GHAR EL MELH', 4),
(37, 'GHEZALA', 4),
(38, 'JARZOUNA', 4),
(39, 'JOUMINE', 4),
(40, 'MATEUR', 4),
(41, 'RAS JEBEL', 4),
(42, 'TINJA', 4),
(43, 'EL METOUIA', 5),
(44, 'GABES MEDINA', 5),
(45, 'GABES OUEST', 5),
(46, 'GABES SUD', 5),
(47, 'EL HAMMA', 5),
(48, 'NOUVELLE MATMATA', 5),
(49, 'MARETH', 5),
(50, 'GHANNOUCHE', 5),
(51, 'MATMATA', 5),
(52, 'MENZEL HABIB', 5),
(53, 'BELKHIR', 6),
(54, 'EL GUETTAR', 6),
(55, 'EL KSAR', 6),
(56, 'EL MDHILLA', 6),
(57, 'SNED', 6),
(58, 'MOULARES', 6),
(59, 'REDEYEF', 6),
(60, 'SIDI AICH', 6),
(61, 'GAFSA SUD', 6),
(62, 'METLAOUI', 6),
(63, 'GAFSA NORD', 6),
(64, 'FERNANA', 7),
(65, 'GHARDIMAOU', 7),
(66, 'TABARKA', 7),
(67, 'JENDOUBA', 7),
(68, 'JENDOUBA NORD', 7),
(69, 'AIN DRAHAM', 7),
(70, 'OUED MLIZ', 7),
(71, 'BOU SALEM', 7),
(72, 'BALTA BOU AOUENE', 7),
(73, 'SBIKHA', 8),
(74, 'KAIROUAN SUD', 8),
(75, 'OUESLATIA', 8),
(76, 'NASRALLAH', 8),
(77, 'KAIROUAN NORD', 8),
(78, 'EL ALA', 8),
(79, 'HAJEB EL AYOUN', 8),
(80, 'CHEBIKA', 8),
(81, 'HAFFOUZ', 8),
(82, 'CHERARDA', 8),
(83, 'BOU HAJLA', 8),
(84, 'HAIDRA', 9),
(85, 'SBEITLA', 9),
(86, 'MEJEL BEL ABBES', 9),
(87, 'KASSERINE NORD', 9),
(88, 'EL AYOUN', 9),
(89, 'EZZOUHOUR', 9),
(90, 'FERIANA', 9),
(91, 'FOUSSANA', 9),
(92, 'HASSI EL FRID', 9),
(93, 'JEDILIANE', 9),
(94, 'KASSERINE SUD', 9),
(95, 'SBIBA', 9),
(96, 'THALA', 9),
(97, 'SOUK EL AHAD', 10),
(98, 'KEBILI SUD', 10),
(99, 'KEBILI NORD', 10),
(100, 'DOUZ', 10),
(101, 'EL FAOUAR', 10),
(102, 'TAJEROUINE', 11),
(103, 'TOUIREF', 11),
(104, 'NEBEUR', 11),
(105, 'SAKIET SIDI YOUSSEF', 11),
(106, 'LE SERS', 11),
(107, 'EL KSOUR', 11),
(108, 'LE KEF EST', 11),
(109, 'DAHMANI', 11),
(110, 'KALAAT SINANE', 11),
(111, 'JERISSA', 11),
(112, 'KALAA EL KHASBA', 11),
(113, 'LE KEF OUEST', 11),
(114, 'MELLOULECH', 12),
(115, 'SIDI ALOUENE', 12),
(116, 'MAHDIA', 12),
(117, 'SOUASSI', 12),
(118, 'OULED CHAMAKH', 12),
(119, 'BOU MERDES', 12),
(120, 'CHORBANE', 12),
(121, 'KSOUR ESSAF', 12),
(122, 'HBIRA', 12),
(123, 'LA CHEBBA', 12),
(124, 'EL JEM', 12),
(125, 'BORJ EL AMRI', 13),
(126, 'JEDAIDA', 13),
(127, 'OUED ELLIL', 13),
(128, 'TEBOURBA', 13),
(129, 'EL BATTAN', 13),
(130, 'MANNOUBA', 13),
(131, 'MORNAGUIA', 13),
(132, 'DOUAR HICHER', 13),
(133, 'HOUMET ESSOUK', 14),
(134, 'MEDENINE SUD', 14),
(135, 'BENI KHEDACHE', 14),
(136, 'SIDI MAKHLOUF', 14),
(137, 'MIDOUN', 14),
(138, 'ZARZIS', 14),
(139, 'MEDENINE NORD', 14),
(140, 'BEN GUERDANE', 14),
(141, 'AJIM', 14),
(142, 'SAYADA LAMTA BOU HAJAR', 15),
(143, 'KSIBET EL MEDIOUNI', 15),
(144, 'KSAR HELAL', 15),
(145, 'JEMMAL', 15),
(146, 'SAHLINE', 15),
(147, 'MONASTIR', 15),
(148, 'MOKNINE', 15),
(149, 'OUERDANINE', 15),
(150, 'TEBOULBA', 15),
(151, 'ZERAMDINE', 15),
(152, 'BEKALTA', 15),
(153, 'BEMBLA', 15),
(154, 'BENI HASSEN', 15),
(155, 'KORBA', 16),
(156, 'SOLIMAN', 16),
(157, 'TAKELSA', 16),
(158, 'MENZEL BOUZELFA', 16),
(159, 'MENZEL TEMIME', 16),
(160, 'NABEUL', 16),
(161, 'BENI KHIAR', 16),
(162, 'BENI KHALLED', 16),
(163, 'HAMMAMET', 16),
(164, 'EL HAOUARIA', 16),
(165, 'KELIBIA', 16),
(166, 'GROMBALIA', 16),
(167, 'EL MIDA', 16),
(168, 'BOU ARGOUB', 16),
(169, 'DAR CHAABANE ELFEHRI', 16),
(170, 'HAMMAM EL GHEZAZ', 16),
(171, 'EL HENCHA', 17),
(172, 'ESSKHIRA', 17),
(173, 'GHRAIBA', 17),
(174, 'EL AMRA', 17),
(175, 'BIR ALI BEN KHELIFA', 17),
(176, 'AGAREB', 17),
(177, 'SFAX VILLE', 17),
(178, 'SAKIET EDDAIER', 17),
(179, 'MAHRAS', 17),
(180, 'MENZEL CHAKER', 17),
(181, 'SFAX EST', 17),
(182, 'SFAX SUD', 17),
(183, 'JEBENIANA', 17),
(184, 'KERKENAH', 17),
(185, 'SAKIET EZZIT', 17),
(186, 'BEN OUN', 18),
(187, 'BIR EL HAFFEY', 18),
(188, 'JILMA', 18),
(189, 'CEBBALA', 18),
(190, 'OULED HAFFOUZ', 18),
(191, 'MEZZOUNA', 18),
(192, 'REGUEB', 18),
(193, 'SIDI BOUZID OUEST', 18),
(194, 'SOUK JEDID', 18),
(195, 'SIDI BOUZID EST', 18),
(196, 'MAKNASSY', 18),
(197, 'MENZEL BOUZAIENE', 18),
(198, 'SILIANA SUD', 19),
(199, 'SIDI BOU ROUIS', 19),
(200, 'SILIANA NORD', 19),
(201, 'GAAFOUR', 19),
(202, 'KESRA', 19),
(203, 'LE KRIB', 19),
(204, 'BOU ARADA', 19),
(205, 'BARGOU', 19),
(206, 'MAKTHAR', 19),
(207, 'ROHIA', 19),
(208, 'EL AROUSSA', 19),
(209, 'SIDI BOU ALI', 20),
(210, 'SIDI EL HENI', 20),
(211, 'SOUSSE JAOUHARA', 20),
(212, 'SOUSSE RIADH', 20),
(213, 'SOUSSE VILLE', 20),
(214, 'BOU FICHA', 20),
(215, 'AKOUDA', 20),
(216, 'HAMMAM SOUSSE', 20),
(217, 'KALAA ESSGHIRA', 20),
(218, 'KONDAR', 20),
(219, 'MSAKEN', 20),
(220, 'ENFIDHA', 20),
(221, 'HERGLA', 20),
(222, 'KALAA EL KEBIRA', 20),
(223, 'SOUSSE', 20),
(224, 'TATAOUINE SUD', 21),
(225, 'BIR LAHMAR', 21),
(226, 'DHEHIBA', 21),
(227, 'GHOMRASSEN', 21),
(228, 'TATAOUINE NORD', 21),
(229, 'REMADA', 21),
(230, 'SMAR', 21),
(231, 'DEGUECHE', 22),
(232, 'TOZEUR', 22),
(233, 'HEZOUA', 22),
(234, 'NEFTA', 22),
(235, 'TAMEGHZA', 22),
(236, 'MENZAH', 23),
(237, 'HRAIRIA', 23),
(238, 'KABBARIA', 23),
(239, 'KRAM', 23),
(240, 'BAB SOUIKA', 23),
(241, 'CARTHAGE', 23),
(242, 'CITE KHADRA', 23),
(243, 'BAB BHAR', 23),
(244, 'LA MARSA', 23),
(245, 'EZZOUHOUR', 23),
(246, 'JEBEL JELLOUD', 23),
(247, 'SIDI EL BECHIR', 23),
(248, 'LA GOULETTE', 23),
(249, 'BARDO', 23),
(250, 'EL OMRANE', 23),
(251, 'EL OMRANE SUPERIEUR', 23),
(252, 'EL OUERDIA', 23),
(253, 'ETTAHRIR', 23),
(254, 'SIDI HASSINE', 23),
(255, 'ESSIJOUMI', 23),
(256, 'LA MEDINA', 23),
(257, 'ENNADHOUR', 24),
(258, 'FAHS', 24),
(259, 'BIR MCHERGA', 24),
(260, 'ZAGHOUAN', 24),
(261, 'HAMMAM ZRIBA', 24),
(262, 'SAOUEF', 24);
";


$aParamsDelegations = generateParamsFromSql($delegations,"delegation",$id);

$sqlDelegation = generateSqlLocalite($aParamsDelegations,$id = 25);
echo $sqlDelegation;






$address = "Sidibouzid&region=TN";
$coord = findByAddress($address);
echo "latitude: " . $coord['lat'] . " longitude: " . $coord['long'];
?>
