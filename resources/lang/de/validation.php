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

    'accepted' => 'Das Feld :attribute muss akzeptiert werden.',
    'accepted_if' => 'Das Feld :attribute muss akzeptiert werden, wenn :other :value ist.',
    'active_url' => 'Das Feld :attribute ist keine gültige URL.',
    'after' => 'Das Feld :attribute muss ein Datum nach :date sein.',
    'after_or_equal' => 'Das Feld :attribute muss ein Datum nach oder gleich :date sein.',
    'alpha' => 'Das Feld :attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das Feld :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das Feld :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das Feld :attribute muss ein Array sein.',
    'ascii' => 'Das Feld :attribute darf nur ASCII-Zeichen enthalten.',
    'before' => 'Das Feld :attribute muss ein Datum vor :date sein.',
    'before_or_equal' => 'Das Feld :attribute muss ein Datum vor oder gleich :date sein.',
    'between' => [
        'array' => 'Das Feld :attribute muss zwischen :min und :max Elemente enthalten.',
        'file' => 'Die Datei :attribute muss zwischen :min und :max Kilobytes groß sein.',
        'numeric' => 'Das Feld :attribute muss zwischen :min und :max liegen.',
        'string' => 'Das Feld :attribute muss zwischen :min und :max Zeichen enthalten.',
    ],
    'boolean' => 'Das Feld :attribute muss wahr oder falsch sein.',
    'confirmed' => 'Die Bestätigung für das Feld :attribute stimmt nicht überein.',
    'current_password' => 'Das Passwort ist nicht korrekt.',
    'date' => 'Das Feld :attribute ist kein gültiges Datum.',
    'date_equals' => 'Das Feld :attribute muss ein Datum gleich :date sein.',
    'date_format' => 'Das Feld :attribute entspricht nicht dem Format :format.',
    'decimal' => 'Das Feld :attribute muss :decimal Dezimalstellen haben.',
    'declined' => 'Das Feld :attribute muss abgelehnt werden.',
    'declined_if' => 'Das Feld :attribute muss abgelehnt werden, wenn :other :value ist.',
    'different' => 'Die Felder :attribute und :other müssen unterschiedlich sein.',
    'digits' => 'Das Feld :attribute muss :digits Ziffern enthalten.',
    'digits_between' => 'Das Feld :attribute muss zwischen :min und :max Ziffern enthalten.',
    'dimensions' => 'Das Bild :attribute hat ungültige Abmessungen.',
    'distinct' => 'Das Feld :attribute hat einen doppelten Wert.',
    'doesnt_end_with' => 'Das Feld :attribute darf nicht mit den folgenden Werten enden: :values.',
    'doesnt_start_with' => 'Das Feld :attribute darf nicht mit den folgenden Werten beginnen: :values.',
    'email' => 'Das Feld :attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das Feld :attribute muss mit einem der folgenden Werte enden: :values.',
    'enum' => 'Der ausgewählte :attribute ist ungültig.',
    'exists' => 'Der ausgewählte :attribute ist ungültig.',
    'file' => 'Das Feld :attribute muss eine Datei sein.',
    'filled' => 'Das Feld :attribute muss einen Wert enthalten.',
    'gt' => [
        'array' => 'Das Feld :attribute muss mehr als :value Elemente enthalten.',
        'file' => 'Die Datei :attribute muss größer als :value Kilobytes sein.',
        'numeric' => 'Das Feld :attribute muss größer als :value sein.',
        'string' => 'Das Feld :attribute muss länger als :value Zeichen sein.',
    ],
    'gte' => [
        'array' => 'Das Feld :attribute muss :value oder mehr Elemente enthalten.',
        'file' => 'Die Datei :attribute muss größer oder gleich :value Kilobytes sein.',
        'numeric' => 'Das Feld :attribute muss größer oder gleich :value sein.',
        'string' => 'Das Feld :attribute muss :value oder mehr Zeichen enthalten.',
    ],
    'image' => 'Das Feld :attribute muss ein Bild sein.',
    'in' => 'Der ausgewählte :attribute ist ungültig.',
    'in_array' => 'Das Feld :attribute existiert nicht in :other.',
    'integer' => 'Das Feld :attribute muss eine ganze Zahl sein.',
    'ip' => 'Das Feld :attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Das Feld :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das Feld :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das Feld :attribute muss ein gültiger JSON-String sein.',
    'lowercase' => 'Das Feld :attribute muss kleinbuchstaben enthalten.',
    'lt' => [
        'array' => 'Das Feld :attribute muss weniger als :value Elemente enthalten.',
        'file' => 'Die Datei :attribute muss kleiner als :value Kilobytes sein.',
        'numeric' => 'Das Feld :attribute muss kleiner als :value sein.',
        'string' => 'Das Feld :attribute muss kürzer als :value Zeichen sein.',
    ],
    'lte' => [
        'array' => 'Das Feld :attribute darf nicht mehr als :value Elemente enthalten.',
        'file' => 'Die Datei :attribute muss kleiner oder gleich :value Kilobytes sein.',
        'numeric' => 'Das Feld :attribute muss kleiner oder gleich :value sein.',
        'string' => 'Das Feld :attribute muss kleiner oder gleich :value Zeichen sein.',
    ],
    'mac_address' => 'Das Feld :attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'array' => 'Das Feld :attribute darf nicht mehr als :max Elemente enthalten.',
        'file' => 'Die Datei :attribute darf nicht größer als :max Kilobytes sein.',
        'numeric' => 'Das Feld :attribute darf nicht größer als :max sein.',
        'string' => 'Das Feld :attribute darf nicht länger als :max Zeichen sein.',
    ],
    'max_digits' => 'Das Feld :attribute darf nicht mehr als :max Ziffern enthalten.',
    'mimes' => 'Das Feld :attribute muss eine Datei vom Typ : :values sein.',
    'mimetypes' => 'Das Feld :attribute muss eine Datei vom Typ : :values sein.',
    'min' => [
        'array' => 'Das Feld :attribute muss mindestens :min Elemente enthalten.',
        'file' => 'Die Datei :attribute muss mindestens :min Kilobytes groß sein.',
        'numeric' => 'Das Feld :attribute muss mindestens :min sein.',
        'string' => 'Das Feld :attribute muss mindestens :min Zeichen enthalten.',
    ],
    'min_digits' => 'Das Feld :attribute muss mindestens :min Ziffern enthalten.',
    'missing' => 'Das Feld :attribute muss fehlen.',
    'missing_if' => 'Das Feld :attribute muss fehlen, wenn :other :value ist.',
    'missing_unless' => 'Das Feld :attribute muss fehlen, es sei denn, :other ist in :values enthalten.',
    'missing_with' => 'Das Feld :attribute muss fehlen, wenn :values vorhanden ist.',
    'missing_with_all' => 'Das Feld :attribute muss fehlen, wenn :values vorhanden sind.',
    'multiple_of' => 'Das Feld :attribute muss ein Vielfaches von :value sein.',
    'not_in' => 'Der ausgewählte :attribute ist ungültig.',
    'not_regex' => 'Das Format des Feldes :attribute ist ungültig.',
    'numeric' => 'Das Feld :attribute muss eine Zahl sein.',
    'password' => [
        'letters' => 'Das Feld :attribute muss mindestens einen Buchstaben enthalten.',
        'mixed' => 'Das Feld :attribute muss mindestens einen Großbuchstaben und einen Kleinbuchstaben enthalten.',
        'numbers' => 'Das Feld :attribute muss mindestens eine Zahl enthalten.',
        'symbols' => 'Das Feld :attribute muss mindestens ein Symbol enthalten.',
        'uncompromised' => 'Das angegebene :attribute ist in einem Datenleck aufgetaucht. Bitte wählen Sie ein anderes :attribute.',
    ],
    'present' => 'Das Feld :attribute muss vorhanden sein.',
    'prohibited' => 'Das Feld :attribute ist verboten.',
    'prohibited_if' => 'Das Feld :attribute ist verboten, wenn :other :value ist.',
    'prohibited_unless' => 'Das Feld :attribute ist verboten, es sei denn, :other ist in :values enthalten.',
    'prohibits' => 'Das Feld :attribute verbietet :other, vorhanden zu sein.',
    'regex' => 'Das Format des Feldes :attribute ist ungültig.',
    'required' => 'Das Feld :attribute ist erforderlich.',
    'required_array_keys' => 'Das Feld :attribute muss Einträge für :values enthalten.',
    'required_if' => 'Das Feld :attribute ist erforderlich, wenn :other :value ist.',
    'required_if_accepted' => 'Das Feld :attribute ist erforderlich, wenn :other akzeptiert wird.',
    'required_unless' => 'Das Feld :attribute ist erforderlich, es sei denn, :other ist in :values enthalten.',
    'required_with' => 'Das Feld :attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all' => 'Das Feld :attribute ist erforderlich, wenn :values vorhanden sind.',
    'required_without' => 'Das Feld :attribute ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => 'Das Feld :attribute ist erforderlich, wenn keine der :values vorhanden ist.',
    'same' => 'Die Felder :attribute und :other müssen übereinstimmen.',
    'size' => [
        'array' => 'Das Feld :attribute muss :size Elemente enthalten.',
        'file' => 'Die Datei :attribute muss :size Kilobytes groß sein.',
        'numeric' => 'Das Feld :attribute muss :size sein.',
        'string' => 'Das Feld :attribute muss :size Zeichen enthalten.',
    ],
    'starts_with' => 'Das Feld :attribute muss mit einem der folgenden Werte beginnen: :values.',
    'string' => 'Das Feld :attribute muss eine Zeichenfolge sein.',
    'timezone' => 'Das Feld :attribute muss eine gültige Zeitzone sein.',
    'unique' => 'Die :attribute wurde bereits verwendet.',
    'uploaded' => 'Das Hochladen des Feldes :attribute ist fehlgeschlagen.',
    'uppercase' => 'Das Feld :attribute muss großbuchstaben enthalten.',
    'url' => 'Das Format des Feldes :attribute ist ungültig.',
    'ulid' => 'Das Feld :attribute muss eine gültige ULID sein.',
    'uuid' => 'Das Feld :attribute muss eine gültige UUID sein.',

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
