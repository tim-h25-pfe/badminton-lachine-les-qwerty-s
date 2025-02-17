<?php
if (function_exists('pll_get_the_languages')) {
    echo '<p>✅ Polylang est actif.</p>';
    $languages = pll_get_the_languages(array('raw' => true));
    
    if (!empty($languages) && is_array($languages)) {
        echo '<p>✅ Polylang retourne les langues :</p>';
        echo '<pre>' . print_r($languages, true) . '</pre>';
    } else {
        echo '<p>⚠️ Aucune langue récupérée. Vérifie que les langues sont bien ajoutées.</p>';
    }
} else {
    echo '<p>❌ Polylang n\'est pas activé ou mal installé.</p>';
}
?>
