<?php

require 'vendor/autoload.php';

$code = <<<'CODE'
<?php

function test($foo)
{
    var_dump($foo);
}
CODE;

//$code2 = file_get_contents('./')

$parser = (new \PhpParser\ParserFactory)->create(\PhpParser\ParserFactory::PREFER_PHP7);
try {
    $ast = $parser->parse($code);
} catch (Error $error) {
    echo "Parse error: {$error->getMessage()}\n";
    return;
}

$dumper = new \PhpParser\NodeDumper;
echo $dumper->dump($ast) . "\n";
