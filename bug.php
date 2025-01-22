```php
function processData(array $data): array {
    $result = [];
    foreach ($data as $item) {
        if (is_array($item)) {
            $result[] = processData($item); // Recursive call for nested arrays
        } elseif (is_string($item) && strlen($item) > 0) {
            $result[] = strtoupper($item); 
        }
    }
    return $result;
}

$data = [
    "apple",
    "banana",
    ["orange", "grape", ""],
    123, //This will cause an error
    ["kiwi", ["mango", "pineapple"]],
];

$processedData = processData($data);
print_r($processedData); 
```