PHPScalarTypeHinting
====================

Adds scalar type hinting to php, using the error handler. No hassle, just works.

Installation
====================

Just add ```include('PHPScalarTypeHinting.php');``` to your default includes and you are set. Alternatively, if you are already using a custom error handler, just copy the function defined in PHPScalarTypeHinting.php to the start of 
your error handler.

Usage
=====================

Just use type hinting like you would expect type hinting to work:

Strings:
```php
function hello(string $person){
  echo "Hello $person";
}
hello("Kay"); //'Hello Kay'

hello(2);//Error
hello(array());//Error
```
Integers
```php
function incAndPrint(int $val){//Or integer
  var_dump($val + 1);
}

incAndPrint(1);//'int(2)'
```
Special parent classes are also possible:
```php

function setValue(object $object, string $value){
  $object->$value = 'hello';
}

$foo = new stdClass();
setValue($foo, 'bar');
echo $foo->bar;//'hello'
```

```php
function incAndPrint(numeric $val){
  var_dump($val + 1);
}

incAndPrint(1.1);//'double(2.1)'
```

Overview of the added types for type hinting
=====================

|Keyword | Allowed Types                     |
|--------|-----------------------------------|
|int     | integer                           |
|integer | integer                           |
|float   | float                             |
|double  | float                             |
|real    | float                             |
|bool    | boolean                           |
|boolean | boolean                           |
|string  | string                            |
|numeric | integer or float                  |
|scalar  | integer, float, boolean or string |
|object  | object                            |
