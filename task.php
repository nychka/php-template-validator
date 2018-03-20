<?php
/**
 * Create validation component that will be able to validate:
 * - associative arrays
 * - std objects
 * - objects (you can use https://github.com/symfony/property-access to access properties by calling getters)
 *
 * While developing, please use Template Method design pattern for validation rules and any other suitable ones.
 * Please find an example below of how this component might be used. Feel free to implement your own vision.
 *
 * As examples you can examine https://github.com/Respect/Validation and https://symfony.com/doc/3.4/validation.html components
 *
 * Will be plus if you cover your component with Tests.
 *
 * You can address this task individually or in groups.
 *
 * Please put your component to GitHub and send a link to me Maksym_Odanets@epam.com not later than 22.04.2018
 * For all questions and suggestions use Skype channel https://join.skype.com/izkIK2fsm7qq
 */

$request = [
    'name' => 'Max',
    'birth-date' => '1984-08-11',
    'email' => 'Maksym_Odanets@epam.com',
    'password' => '111111'
];

$rules = [
    'name' => [
        new Rules\Required(),
        new Rules\Type('string'),
    ],
    'birth-date' => [
        new Rules\Date('Y-m-d'),
        new Rules\Age(18)
    ],
    'email' => [
        new Rules\Required(),
        new Rules\Email(),
    ],
    'password' => [
        new Rules\Required(),
        new Rules\Type('string'),
        new Rules\Password()
    ]
];

$validator = new Validator($rules);

if ($validator->validate()) {
    echo 'Ok';
} else {
    var_dump($validator->errors());
}