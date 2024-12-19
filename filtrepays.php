<?php
/*
plugin name: Filtre pays
author: Sylviane Paré
description: Une extension qui permettra de filtrer par pays
author uri: https://www.gftnth00.mywhc.ca/31w09
*/

function charger_scripts_css(){

    $version_css = filemtime(plugin_dir_path(__FILE__). "/style.css");
    $version_js = filemtime(plugin_dir_path(__FILE__) . "js/filtrepost.js");

    wp_enqueue_style(
        "filtrepost",        
        plugin_dir_url(__FILE__) . "/style.css",
        array(),
        $version_css
    ) ;  

    wp_enqueue_script(  
        "filtrepost",       
        plugin_dir_url(__FILE__) . "/js/filtrepost.js",
        array(),
        $version_js,
        true
    ); 
}

add_action("wp_enqueue_scripts", "charger_scripts_css");

function genere_boutons(){
    $categories = get_categories();
    $contenu = "";
    foreach($categories as $element){
        $nom = $element->name;
        $id = $element->term_id;
        $contenu .= '<button data-id="' . $id . '">' . $nom . '</button>';
    }
    return '<div class="filtre__bouton">' . $contenu . '</div>';
}

add_shortcode('extraire_categories', 'genere_boutons');