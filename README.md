# Function Handler

**Handle your data by saved containers.**

## Example Usage

```php
include "FunctionHandler.php";

FunctionHandler::addFunction('lower', function ($x) {
    return mb_strtolower($x);
});

FunctionHandler::addFunction('trim_spaces', function ($x) {
    return trim($x);
});

FunctionHandler::addContainer('tag', array('lower', 'trim_spaces'));

$data = '     Tag1   ';
$data = FunctionHandler::handle($data, 'tag');
echo $data;

// Print : tag1
```

## addFunction(tag, function)
The purpose of this method is to save functions by tag.

**Example**
```php
FunctionHandler::addFunction('lower', function ($x) {
    return mb_strtolower($x);
});
```

## addContainer(tag, array of functions)
The purpose of this method is to save containers with functions by tag.

**Example**
```php
FunctionHandler::addContainer('tag', array('lower'));
```

## handle(data, container tag)
The purpose of this method is to save containers with functions by tag.

**Example**
```php
$data = '     Tag1   ';
echo FunctionHandler::handle($data, 'tag');

// Print : tag1
```

You can use array instead of string.

**Example**
```php
$data = array(
    '     Tag1   ',
    '     Tag2   ',
    '     Tag3   '
);
$data = FunctionHandler::handle($data, 'tag');
print_r($data);

// Print : ['tag1', 'tag2', 'tag3']
```