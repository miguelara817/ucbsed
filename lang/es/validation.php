<?php

return [

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'accepted_if' => 'El campo :attribute field must be accepted when :other is :value.',
    'active_url' => 'El campo :attribute field must be a valid URL.',
    'after' => 'El campo :attribute field must be a date after :date.',
    'after_or_equal' => 'El campo :attribute field must be a date after or equal to :date.',
    'alpha' => 'El campo :attribute field must only contain letters.',
    'alpha_dash' => 'El campo :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'El campo :attribute field must only contain letters and numbers.',
    'array' => 'El campo :attribute field must be an array.',
    'ascii' => 'El campo :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'El campo :attribute field must be a date before :date.',
    'before_or_equal' => 'El campo :attribute field must be a date before or equal to :date.',
    'between' => [
        'array' => 'El campo :attribute field must have between :min and :max items.',
        'file' => 'El campo :attribute field must be between :min and :max kilobytes.',
        'numeric' => 'El campo :attribute field must be between :min and :max.',
        'string' => 'El campo :attribute field must be between :min and :max characters.',
    ],
    'boolean' => 'El campo :attribute field must be true or false.',
    'can' => 'El campo :attribute field contains an unauthorized value.',
    'confirmed' => 'El campo :attribute field confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'El campo :attribute field must be a valid date.',
    'date_equals' => 'El campo :attribute field must be a date equal to :date.',
    'date_format' => 'El campo :attribute field must match the format :format.',
    'decimal' => 'El campo :attribute field must have :decimal decimal places.',
    'declined' => 'El campo :attribute field must be declined.',
    'declined_if' => 'El campo :attribute field must be declined when :other is :value.',
    'different' => 'El campo :attribute field and :other must be different.',
    'digits' => 'El campo :attribute field must be :digits digits.',
    'digits_between' => 'El campo :attribute field must be between :min and :max digits.',
    'dimensions' => 'El campo :attribute field has invalid image dimensions.',
    'distinct' => 'El campo :attribute field has a duplicate value.',
    'doesnt_end_with' => 'El campo :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'El campo :attribute field must not start with one of the following: :values.',
    'email' => 'El campo :attribute field must be a valid email address.',
    'ends_with' => 'El campo :attribute field must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'El campo :attribute field must be a file.',
    'filled' => 'El campo :attribute field must have a value.',
    'gt' => [
        'array' => 'El campo :attribute field must have more than :value items.',
        'file' => 'El campo :attribute field must be greater than :value kilobytes.',
        'numeric' => 'El campo :attribute field must be greater than :value.',
        'string' => 'El campo :attribute field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'El campo :attribute field must have :value items or more.',
        'file' => 'El campo :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => 'El campo :attribute field must be greater than or equal to :value.',
        'string' => 'El campo :attribute field must be greater than or equal to :value characters.',
    ],
    'image' => 'El campo :attribute field must be an image.',
    'in' => 'El campo selected :attribute is invalid.',
    'in_array' => 'El campo :attribute field must exist in :other.',
    'integer' => 'El campo :attribute field must be an integer.',
    'ip' => 'El campo :attribute field must be a valid IP address.',
    'ipv4' => 'El campo :attribute field must be a valid IPv4 address.',
    'ipv6' => 'El campo :attribute field must be a valid IPv6 address.',
    'json' => 'El campo :attribute field must be a valid JSON string.',
    'lowercase' => 'El campo :attribute field must be lowercase.',
    'lt' => [
        'array' => 'El campo :attribute field must have less than :value items.',
        'file' => 'El campo :attribute field must be less than :value kilobytes.',
        'numeric' => 'El campo :attribute field must be less than :value.',
        'string' => 'El campo :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'El campo :attribute field must not have more than :value items.',
        'file' => 'El campo :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'El campo :attribute field must be less than or equal to :value.',
        'string' => 'El campo :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'El campo :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'El campo :attribute field must not have more than :max items.',
        'file' => 'El campo :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'El campo :attribute field must not be greater than :max.',
        'string' => 'El campo :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => 'El campo :attribute no debe tener más de than :max digitos.',
    'mimes' => 'El campo :attribute field must be a file of type: :values.',
    'mimetypes' => 'El campo :attribute field must be a file of type: :values.',
    'min' => [
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
        'file' => 'El campo :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'min_digits' => 'El campo :attribute field must have at least :min digits.',
    'missing' => 'El campo :attribute field must be missing.',
    'missing_if' => 'El campo :attribute field must be missing when :other is :value.',
    'missing_unless' => 'El campo :attribute field must be missing unless :other is :value.',
    'missing_with' => 'El campo :attribute field must be missing when :values is present.',
    'missing_with_all' => 'El campo :attribute field must be missing when :values are present.',
    'multiple_of' => 'El campo :attribute field must be a multiple of :value.',
    'not_in' => 'El campo seleccionado :attribute es inválido.',
    'not_regex' => 'El campo :attribute tiene un formato inválido.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'password' => [
        'letters' => 'El campo :attribute field must contain at least one letter.',
        'mixed' => 'El campo :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'El campo :attribute field must contain at least one number.',
        'symbols' => 'El campo :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'El campo :attribute field must be present.',
    'prohibited' => 'El campo :attribute field is prohibited.',
    'prohibited_if' => 'El campo :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'El campo :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'El campo :attribute field prohibits :other from being present.',
    'regex' => 'El campo :attribute field format is invalid.',
    'required' => 'El campo :attribute es requerido.',
    'required_array_keys' => 'El campo :attribute field must contain entries for: :values.',
    'required_if' => 'El campo :attribute field is required when :other is :value.',
    'required_if_accepted' => 'El campo :attribute field is required when :other is accepted.',
    'required_unless' => 'El campo :attribute field is required unless :other is in :values.',
    'required_with' => 'El campo :attribute field is required when :values is present.',
    'required_with_all' => 'El campo :attribute field is required when :values are present.',
    'required_without' => 'El campo :attribute field is required when :values is not present.',
    'required_without_all' => 'El campo :attribute field is required when none of :values are present.',
    'same' => 'El campo :attribute field must match :other.',
    'size' => [
        'array' => 'El campo :attribute field must contain :size items.',
        'file' => 'El campo :attribute field must be :size kilobytes.',
        'numeric' => 'El campo :attribute field must be :size.',
        'string' => 'El campo :attribute field must be :size characters.',
    ],
    'starts_with' => 'El campo :attribute field must start with one of the following: :values.',
    'string' => 'El campo :attribute field must be a string.',
    'timezone' => 'El campo :attribute field must be a valid timezone.',
    'unique' => 'El :attribute ya ha sido registrado.',
    'uploaded' => 'El :attribute fallo al subirse.',
    'uppercase' => 'El :attribute field must be uppercase.',
    'url' => 'El campo :attribute field must be a valid URL.',
    'ulid' => 'El campo :attribute field must be a valid ULID.',
    'uuid' => 'El campo :attribute field must be a valid UUID.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
