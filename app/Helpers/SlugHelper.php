<?php

function toSlug($text) {
    // Tableau de remplacement pour les caractères spéciaux
    $chars = [
        'Ç' => 'C', 'ç' => 'c',
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
        'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o',
        'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
        'Ñ' => 'N', 'ñ' => 'n',
        'Ÿ' => 'Y', 'ÿ' => 'y'
    ];

    // Remplacer les caractères spéciaux
    $text = strtr($text, $chars);

    // Remplacer tous les espaces par des underscores
    $text = str_replace(' ', '_', $text);

    // Supprimer tous les caractères qui ne sont ni des lettres ni des nombres ni des underscores
    $text = preg_replace('/[^a-zA-Z0-9_]/', '', $text);

    // Convertir en minuscules
    $text = strtolower($text);

    return $text;
}
