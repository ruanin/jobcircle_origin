<?php

return array(
    'callback' => 'modifyNavbar',
    'items' => array(
        'Home' => array('text' => 'Home', 'url' => '/Home', 'class' => null), 
        'Client' => array('text' => 'Für Unternehmen', 'url' => '/Client', 'class' => null, 
            'has-submenu' =>    array(array('text' => 'Fachbereiche', 'url' => '/', 'class' => null),
                                array('text' => 'Dienstleistungen', 'url' => '/', 'class' => null, 
                                    'has-submenu' => array(array('text' => 'Try & Hire', 'url' => '/', 'class' => null),
                                    array('text' => 'Festvermittlung', 'url' => '/', 'class' => null),
                                    array('text' => 'Temporärstellen', 'url' => '/', 'class' => null))),
                                array('text' => 'Personalanfrage', 'url' => '/Client/PersonalRequest', 'class' => null),
                                array('text' => 'Ansprechpartner', 'url' => '/', 'class' => null))),
        'VacancyBoard' => array('text' => 'Für Bewerber', 'url' => '/', 'class' => null,
            'has-submenu' =>    array(array('text' => 'Stellenangebote', 'url' => '/Vacancyboard', 'class' => null),
                                array('text' => 'Spontanbewerbung', 'url' => '/', 'class' => null),
                                array('text' => 'Fachbereiche', 'url' => '/', 'class' => null),
                                array('text' => 'EU-Bürger Info', 'url' => '/', 'class' => null),
                                array('text' => 'Login', 'url' => '/', 'class' => null))),
        'Company' => array('text' => 'Über planova', 'url' => '/', 'class' => null,
            'has-submenu' =>    array(array('text' => 'Fachbereiche', 'url' => '/', 'class' => null),
                                array('text' => 'Qualitätsanspruch', 'url' => '/', 'class' => null),
                                array('text' => 'Standorte', 'url' => '/', 'class' => null),
                                array('text' => 'Karriere bei Planova', 'url' => '/', 'class' => null))),
        'Contact' => array('text' => 'Kontakt', 'url' => '/Contact', 'class' => null),
    ),
);
