<?php
// библиотека полезных функций

/**
 * Разбиение строки на массив символов (аналог str_split для многобайтных кодировок)
 * @param type $string
 * @return type
 */
function mb_str_split( $string ) { 
    return preg_split('/(?<!^)(?!$)/u', $string );
}

