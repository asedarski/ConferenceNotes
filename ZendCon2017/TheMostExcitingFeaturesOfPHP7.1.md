# The Most Exciting Features of PHP 7.1
## Enrico Zimuel - @ezimuel
- Released Dec. 1, 2016
- Last stable release Sept. 2017
- 7.1 fixed 376 bugs
- 12 new features
- 13 new functions
- 36 new global constants
- 20 backward incompatible changes
- 2 deprecated features
- 16 changed functions
- New Features
    - Nullable Types
        - For parameters and return values
        - Prefix the type name with a `?`
        - `null` can be passed as an argument or a return value
    - Void Return Type
        - Specify that a function doesn't return anything
        - Strict way to define a function that a function returns nothing
    - Array Destructuring
        - ex.
            ```
            $data = [['foo' 'bar', 'baz']];
            [$a, $b] = $data[0];
            var_dump($a, $b); // string(3) "foo", string (3) "bar"
            ```
    - Support For Keys
        - Specify keys in `list()` or it's new shorthand `[]` syntax
        - Cannot mix `list()` and `[]`
    - Iterable
        - Added the iterable pseudo-type
        - Accepts an array or Traversable
        - Accepted as a parameter or a return type
    - Class Constant Visibility
        - Ability to specify the visibility of a constant of a class
        - By default it is public
    - Multiple Catch
        - `catch (ExceptionA | ExceptionB $e)` - Handle Exceptions A or B in this block
    - Negative Offsets
        - `var_dump("abcdef"[-2]); // string(1) "e"`
        - `var_dump("abcdef"[-7]); // string(0) "", PHP Notice`
        - `var_dump(strpos("aabbcc", "b", -3)); // int(3)`
    - Asynchronus Signal Handling
        - `pcntl_async_signals()` - enable asynchronus signal handling without using ticks
        - `true` turns on async signals
    - Closure from Callable
    - OpenSSL AEAD
        - Authenticated Encrypt with Associated Data
        - Encrypt and Authenticate at the same time
        - Supports GCM and CCM encryption modes
        - GCM is 3x faster than CCM
        - 3 more parameters to `openssl_encrypt()`
        - 2 more parameters to `openssl_decrypt()`
    - HTTP/2 Server Push
        - Server push has been added to Curl 7.46+
        - `curl_multi_setopt()` function with `CURLMOPT_PUSHFUNCTION` constant
- New Hash Functions
    - `hash_hkdf()` to support HKDF (RFC 5869)
    - Added SHA3 support
- More to come with PHP 7.2
    - GA: Nov. 20, 2017
    - More security support
[Website](https://www.zimuel.it/)
