<?php

namespace app\kv\tools;

/**
 * Строковые утилиты
 *
 * @author kotov
 */
class Strings 
{
    /**
     * Преобразует строку в CamelCase формат
     * @param string $str
     * @return type
     */
    public static function upperCamelCase($str) {
        return str_replace(' ','',ucwords(str_replace('-', ' ', $str)));
    }
    /**
     * Преобразует строку в camelCase формат
     * @param string $str
     * @return type
     */
    public static function lowerCamelCase($str) {
        return lcfirst(self::upperCamelCase($str));
    }
    /**
     * Возвращает транслитерированную строку
     * @param string $string
     * @return string
     */
    public static function getTransliterateString($string) 
    {
        $transliterate = [
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'yo',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'j',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'sch',
            'ъ' => 'j',
            'ы' => 'y',
            'ь' => 'j',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
            'А' => 'A',
            'Б' => 'B',
            'В' => 'V',
            'Г' => 'G',
            'Д' => 'D',
            'Е' => 'E',
            'Ё' => 'Yo',
            'Ж' => 'Zh',
            'З' => 'Z',
            'И' => 'I',
            'Й' => 'J',
            'К' => 'K',
            'Л' => 'L',
            'М' => 'M',
            'Н' => 'N',
            'О' => 'O',
            'П' => 'P',
            'Р' => 'R',
            'С' => 'S',
            'Т' => 'Y',
            'У' => 'U',
            'Ф' => 'F',
            'Х' => 'H',
            'Ц' => 'C',
            'Ч' => 'Ch',
            'Ш' => 'Sh',
            'Щ' => 'Sch',
            'Ъ' => 'J',
            'Ы' => 'Y',
            'Ь' => 'J',
            'Э' => 'E',
            'Ю' => 'Yu',
            'Я' => 'Ya',
            ' ' => '-',        
        ];
        $arrayOfChars = mb_str_split($string);
        $transliterateString = '';
        foreach ($arrayOfChars as $char) {
            if (isset($transliterate[$char])) {
                $transliterateString.=$transliterate[$char];
            }
        }
        return $transliterateString;        
    }
}
