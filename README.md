# PHP array utility functions.

This is a set of utility functions for array alteration and handling.

They all follow the same naming conventions as the default methods in the form of `array_*`.

## Functions

#### `array_delete(array &$array, $key)`

Deletes entry from array and return its value.

_NB: This method modifies the original variable._

#### `array_get(array &$array, $key)`

Lookup entry in array by key and return its value, returns `false` if not found.

_NB: This method modifies the original variable._

#### ```array_flatten(array $array)```

Make multidimensional array flat.

#### `array_pick(array $array, $keys[, $key[, $key]])`

Return array with only the keys in `$keys`.

#### `array_reject(array $array, $keys[, $key[, $key]])`

Return array without the keys in `$keys`.
This is the inverse of `array_pick`

## Contributing

1. Fork it ( https://github.com/fetch/php-array-utils/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request
