# Cryptography :- A set of libraries to provide cryptography support to php
## Features
* Multiple Algorithum Support
* Installable thorugh composer
* Multilanguage Exceptions
* Easy Setup and use
## Why should you use
We have been working on many encryption methods and implementing them into the project. The basic idea of this library is to make your project secure enough for your customers. You can store important information like credentials etc.
## How to use
### Installation
Install using composer
`composer require optiwariindia/cryptography`
#### Initialize

`$crypt=new optiwariindia\cryptography();`

#### List Supported Algorithms
`print_r($crypt->listAlgo());`

#### Encrypt
`$crypt->algo("AES-128-CBC");`

`$iv=$crypt->iv();`

`$crypt->key("SuperSecretKey");`

`list($cypher,$tag)=$crypt->encrypt("message");`

#### Decrypt 
`$crypt->algo("AES-128-CBC");`

`$iv=$crypt->iv();`

`$crypt->key("SuperSecretKey");`

`$text=$crypt->decrypt($cypher,$tag);`
