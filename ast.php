<?php

require 'vendor/autoload.php';

$code = <<<'CODE'
<?php

function test($foo)
{
    var_dump($foo);
}
CODE;

$code2 = file_get_contents('app/Http/Resources/ObjectItemResource.php');

$parser = (new \PhpParser\ParserFactory)->create(\PhpParser\ParserFactory::PREFER_PHP7);
try {
    $ast = $parser->parse($code2);
} catch (Error $error) {
    echo "Parse error: {$error->getMessage()}\n";
    return;
}

$dumper = new \PhpParser\NodeDumper;
file_put_contents('res.json', json_encode($ast));
echo $dumper->dump($ast) . "\n";
