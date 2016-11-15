<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es un enlace válido.',
    'after'                => 'El campo :attribute debe ser una fecha después del :date.',
    'alpha'                => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo puede contener letras, números y guiones.',
    'alpha_num'            => 'El campo :attribute sólo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha antes del :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe tener un valor entre :min y :max.',
        'file'    => 'El campo :attribute debe tener un tamaño entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe estar entre :min y :max carácteres.',
        'array'   => 'El campo :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo :attribute no coincide con la confirmación.',
    'date'                 => 'El campo :attribute no es una fecha válida.',
    'date_format'          => 'La fecha en el campo :attribute no tiene el formato correcto. Por favor, usa :format.',
    'different'            => 'Los campos :attribute y :other no pueden coincidir.',
    'digits'               => 'El campo :attribute debe tener :digits números.',
    'digits_between'       => 'El campo :attribute debe tener entre :min y :max números.',
    'dimensions'           => 'El campo :attribute tiene una dimensión inválida.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute tiene que ser un correo electrónico válido.',
    'exists'               => 'El campo :attribute seleccionado no existe.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => 'El campo :attribute debe ser un imagen.',
    'in'                   => 'El campo :attribute seleccionado no es válido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección de IP válido.',
    'json'                 => 'El campo :attribute debe ser un string válido de JSON.',
    'max'                  => [
        'numeric' => 'El campo :attribute no puede ser más grande :max.',
        'file'    => 'El archivo :attribute no puede ser más grande que :max kb.',
        'string'  => 'El campo :attribute puede ser al máximo :max carácteres.',
        'array'   => 'El campo :attribute tiene un límite de :max elemento.',
    ],
    'mimes'                => 'El archivo :attribute debe ser de uno de los siguientes tipos: :values.',
    'mimetypes'            => 'El archivo :attribute debe ser de uno de los siguientes tipos: :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe tener un valor mayor que :min.',
        'file'    => 'El archivo :attribute no puede ser más pequeño que :min kilobytes.',
        'string'  => 'El campo :attribute debe tener al menos :min carácteres.',
        'array'   => 'El campo :attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado no es válido.',
    'numeric'              => 'El campo :attribute debe ser un número.',
    'present'              => 'El campo :attribute no existe.',
    'regex'                => 'El campo :attribute no tiene el formato correcto.',
    'required'             => 'El campo :attribute es obligatorio',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other tenga el valor :value.',
    'required_unless'      => 'El campo :attribute obligatorio si el campo :other no tiene el valor :values.',
    'required_with'        => 'El campo :attribute es obligatorio si el campo :values está rellenado',
    'required_with_all'    => 'El campo :attribute es obligatorio si el campo :values está rellenados.',
    'required_without'     => 'El campo :attribute es obligatorio si el campo :values no está rellenados.',
    'required_without_all' => 'El campo :attribute es obligatorio si ninguno de los campos :values están rellenados.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El campo :attribute debe ser :size kilobytes.',
        'string'  => 'El campo :attribute debe tener :size carácteres.',
        'array'   => 'El campo :attribute debe tener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena.',
    'timezone'             => 'El campo :attribute debe ser un.',
    'unique'               => 'El campo :attribute debe ser único.',
    'uploaded'             => 'No se ha podido subir el/los archivo(s) de :attribute.',
    'url'                  => 'El formato del campo :attribute no es válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
