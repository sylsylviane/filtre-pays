<?php
/*
Plugin Name: Filtre pays
Author: Sylviane Paré
Description: Une extension qui permettra de filtrer par pays
Author URI: https://www.gftnth00.mywhc.ca/31w09
*/


function charger_css(){

    $version_css = filemtime(plugin_dir_path(__FILE__). "/style.css");
    $version_js = filemtime(plugin_dir_path(__FILE__) . "js/filtrepays.js");

    wp_enqueue_style(
        "filtrepays",        
        plugin_dir_url(__FILE__) . "/style.css",
        array(),
        $version_css
    ) ;  

    wp_enqueue_script(  
        "filtrepays",       
        plugin_dir_url(__FILE__) . "/js/filtrepays.js",
        array(),
        $version_js,
        true
    ); 
}

add_action("wp_enqueue_scripts", "charger_css");

function generer_boutons(){
    $pays = ["France", "États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"];
    $contenu = "";
    foreach($pays as $value){
        $nom = $value;
        $contenu .= '<button data-name="' . $nom . '">' . $nom . '</button>';
    }
    return '<div class="filtre__bouton">' . $contenu . '</div>';
}

add_shortcode('extraire_pays', 'generer_boutons');