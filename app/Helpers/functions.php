<?php

if (!function_exists('convertItemsOfArrayToObject')) {

    function convertItemsOfArrayToObject(array $items): array {

        $items = array_map(function ($item) {
            $stdClass = new \stdClass;

            foreach ($item as $key => $value) {
                $stdClass->$key = $value;
            }

            return $stdClass;

        }, $items);

        return $items;
    }
}

//valida cpf e cnpj

if (!function_exists('format_document')) {

    function format_document(string $cpfOrCnpj): string 
    {
        $CPF_LENGHT = 11;

        $cnpj_cpf = preg_replace("/\D/", '', $cpfOrCnpj);

        if (strlen($cnpj_cpf) === $CPF_LENGHT) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }
}


