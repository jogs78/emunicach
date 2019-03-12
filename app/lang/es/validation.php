<?php

return array(

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

	"accepted"             => "El campo :attribute debe ser aceptado.",
	"active_url"           => "El campo :attribute no corresponde a una URL válida.",
	"after"                => "El campo :attribute debe ser una fecha posterior al :date.",
	"alpha"                => "El campo :attribute sólo puede contener letras.",
	"alpha_dash"           => "El campo :attribute sólo puede contener letras, números, y guiones.",
	"alpha_num"            => "El campo :attribute sólo puede contener letras y números.",
	"array"                => "El campo :attribute debe ser un arreglo.",
	"before"               => "El campo :attribute debe ser una fecha antes :date.",
	"between"              => array(
		"numeric" => "El campo :attribute debe estar entre :min y :max.",
		"file"    => "El campo :attribute debe tener entre :min y :max kilobytes.",
		"string"  => "El campo :attribute debe estar entre :min y :max caracteres.",
		"array"   => "El campo :attribute debe tener entre :min y :max elementos.",
	),
	"confirmed"            => "El campo :attribute no coincide.",
	"date"                 => "El campo :attribute no es una fecha válida.",
	"date_format"          => "El campo :attribute no coincide con el formato :format.",
	"different"            => "El campo :attribute y :other deben ser diferentes.",
	"digits"               => "El campo :attribute debe tener :digits dígitos.",
	"digits_between"       => "El campo :attribute debe tener entre :min y :max dígitos.",
	"email"                => "El campo :attribute debe ser una dirección de correo electrónico válida.",
	"exists"               => "El :attribute no existe.",
	"image"                => "El campo :attribute debe ser una imagen.",
	"in"                   => "El campo seleccionado :attribute es inválido.",
	"integer"              => "El campo :attribute debe ser un número entero.",
	"ip"                   => "El campo :attribute debe ser una dirección IP válida.",
	"max"                  => array(
		"numeric" => "El campo :attribute no puede ser mayor que :max.",
		"file"    => "El campo :attribute no puede ser mayor que :max kilobytes.",
		"string"  => "El campo :attribute no puede ser mayor que :max caractéres.",
		"array"   => "El campo :attribute no puede tener más de :max elementos.",
	),
	"mimes"                => "El campo :attribute debe ser un archivo de tipo: :values.",
	"min"                  => array(
		"numeric" => "El campo :attribute debe ser al menos :min.",
		"file"    => "El campo :attribute debe ser de al menos :min kilobytes.",
		"string"  => "El campo :attribute debe ser de al menos :min caracteres.",
		"array"   => "El campo :attribute debe tener al menos :min elementos.",
	),
	"not_in"               => "El campo seleccionado :attribute es inválido.",
	"numeric"              => "El campo :attribute debe ser un número.",
	"regex"                => "El formato del campo :attribute es inválido.",
	"required"             => "El campo :attribute es obligatorio.",
	"required_if"          => "El campo :attribute es obligatorio cuando :other es :value.",
	"required_with"        => "El campo :attribute es obligatorio cuando :values es presente.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "El campo :attribute y :other deben coincidir.",
	"size"                 => array(
		"numeric" => "El campo :attribute debe tener un tamaño de :size.",
		"file"    => "El campo :attribute debe ser :size kilobytes.",
		"string"  => "El campo :attribute debe tener :size caracteres.",
		"array"   => "El campo :attribute debe contener :size elementos.",
	),
	"unique"               => "El campo :attribute ya ha sido registrado.",
	"url"                  => "El formato del campo :attribute es inválido.",

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

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

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
	'attributes' => array(
            
        ),

);
