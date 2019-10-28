
# MailBox-PHP

<p align="center">
<a href="https://opensource.org/licenses/MIT">
    <img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="PHP imap">
</a>
<a href="https://www.php.net/manual/pt_BR/book.imap.php">
    <img src="https://img.shields.io/packagist/php-v/php-imap/php-imap/3.0.8.svg" alt="PHP imap">
</a>
</p>

### Features
    
    * Connect to mailbox by IMAP, using PHP IMAP extension
    * Read emails with attachments and inline images
    * Get emails filtered or sorted by custom criteria
    * Mark emails as seen/unseen

### Dependencies
    
    * PHP 5.6, 7.0, 7.1, 7.2 or 7.3
    * PHP imap extension must be present; so make sure this line is active in your php.ini: extension=php_imap.dll
    * Composer
    * PhpUnit

## About MailBox

To start using the project it is necessary to configure the file "config.json" according to the desired parameters, and suitable for the process to be done.

### Getting Started Example
            {
                "data_mailbox": {
                    "host": "domainteste.com.br",
                    "protocol": "imap",
                    "socket": 143,
                    "user": "username@domainteste.com.br",
                    "password": "passw@1234"
                },
                "search_filter": {
                    "criterion": "FROM",
                    "data": "remetente@domain.com"
                },
                "storage": {
                    "name": "storage",
                    "path": "storage/"
                },
                "api": {
                    "url": "domainteste.com.br",
                    "socket": "8080",
                    "token": "d9b628848260c8a765cdb9cd357988ff"
                },
                "listparam": ["Nome", "Endereço", "Valor", "Vencimento"]
            }

#### search_filter

+ Parameters Search:
   * BCC "string" - match messages with "string" in the Bcc: field
   * FROM "string" - match messages with "string" in the From: field
   * SUBJECT "string" - match messages with "string" in the Subject:
   * TO "string" - match messages with "string" in the To:

  Multiplos Data

        "search_filter": {
            "criterion": "FROM",
            "data":[
                       "remetente@domain.com",
                       "remetente2@domain.com"
                    ]
        },

## Folders Struct

    ├── app: diretório base
    │   ├── Controllers: diretório dos controllers
    │   │   |── ApiController.php
    |   |   └── MailboxController.php 
    │   └── Models: diretório de Models
    │       |── Api.php
    │       ├── File.php
    │       ├── Mail.php
    │       └── Mailbox.php
    ├── config: diretório funções genéricas
    │   |── Autoload.php
    │   └── App.php
    ├── config.json: arquivo onde definiremos os parametros a serem seguidos
    ├── index.php: arquivo onde definiremos as rotas
    └── init.php: arquivo de inicialização

## Files and Methods Struct

    ├── App: 
    │   ├── Controllers: Controllers
    │   │   |── ApiController
    │   │   |   |── __construct
    │   │   |   |── __destruct
    │   │   |   └── Conection
    |   |   └── MailboxController
    │   │       └── __construct
    │   └── Models: Models
    │       |── Api
    |       │   |── setStream
    |       │   |── getStream
    |       │   ├── setSocket
    |       │   ├── getSocket
    |       │   ├── setURL
    |       │   ├── getURL
    |       │   ├── setBody
    |       │   ├── getBody
    |       │   ├── setRequest
    |       │   └── getRequest
    │       ├── File
    |       │   ├── __construct
    |       │   ├── createFile
    |       │   ├── setPath
    |       │   ├── getPath
    |       │   ├── setFile
    |       │   └── getFile
    │       ├── Mail.php
    |       │   ├── setHost
    |       │   ├── setProtocol
    |       │   ├── setSocket
    |       │   ├── setUser
    |       │   ├── setPassword
    |       │   ├── getHost
    |       │   ├── getProtocol
    |       │   ├── getSocket
    |       │   ├── getUser
    |       │   ├── getPassword
    |       │   └── getProtocolConnection
    │       └── Mailbox
    |           ├── __construct
    |           ├── __destruct
    |           ├── mailbox_open
    |           ├── mailbox_search
    |           ├── getMailbox_list
    |           ├── setMailbox_list
    |           ├── readBody
    |           └── mailbox_anexo
    └── config: funções genéricas
        |── Autoload
        │   └── __Autoload
        └── App
            └── __App

## License

The is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).