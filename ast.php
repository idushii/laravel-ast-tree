<?php

require 'vendor/autoload.php';

use Roave\BetterReflection\BetterReflection;

$classInfo = (new BetterReflection())
    ->reflector()
    ->reflectClass(App\Http\Controllers\ServiceItemController::class);

$ast = $classInfo->getMethod('show')->getAst();

$res = $ast->getParams();

foreach ($res as $key => $value) {
    $variableType = join('\\', $value->type->jsonSerialize()['parts']);
    $variableName = $value->var->jsonSerialize()['name'] . "\n";


    if ($variableType != 'Illuminate\Http\Request') {
        $classInfo2 = (new BetterReflection())
            ->reflector()
            ->reflectClass($variableType);

        $res = ($classInfo2->getDocComment());
        file_put_contents('res.json', json_encode($res));
    }

}

//file_put_contents('res.json', json_encode($res));

