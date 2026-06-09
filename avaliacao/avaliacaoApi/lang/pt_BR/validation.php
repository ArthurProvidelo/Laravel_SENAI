<?php
 return [

    'custom' => [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'max' => 'O nome deve ter no máximo :max caracteres.',
        ],

        'tipo_materia' => [
            'required' => 'O tipo da matéria é obrigatório.',
            'max' => 'O tipo da matéria deve ser um texto',
        ],

        'data_fabricacao' => [
            'required' => 'A data de fabricação deve ser uma data.',
            'max' => 'A data de fabricação não pode ser posterior ao dia atual.',
        ],

        'quantidade' => [
            'required' => 'O campo quantidade é obrigatório.',
            'numeric' => 'O campo quantidade aceita apenas números.',
            'max' => 'O número de produtos não pode ser maior que :max.',
        ],

        'preco' => [
            'required' => 'É obrigatório informar o valor do produto.',
            'numeric' => 'O campo preço deve ser um número.',
        ],
    ],
];