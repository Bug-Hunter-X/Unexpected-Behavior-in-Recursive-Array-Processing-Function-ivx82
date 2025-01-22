```php
function processData(array $data): array {
    $result = [];
    foreach ($data as $item) {
        if (is_array($item)) {
            $result[] = processData($item); // Recursive call
        } elseif (is_string($item) && strlen($item) > 0) {
            $result[] = strtoupper($item); 
        } elseif ($item !== null){ //Handle other data types or throw exceptions for improved error handling.
            //Handle other data types, or add error logging
            error_log('Encountered a non-string, non-array value:' . var_export($item, true));
        }
    }
    return $result;
}

$data = [
    "apple",
    "banana",
    ["orange", "grape", ""],
    123,
    ["kiwi", ["mango", "pineapple"]],
];

$processedData = processData($data);
print_r($processedData); 
```