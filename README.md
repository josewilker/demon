D.E.M.O.N
---

DEMON is a pure system to build autonomous applications for small or live computers, created by José Wilker.

### Installation

To start using the DEMON check if settings.json are in your base folder.

settings.json

```
{
    "name" : "DEMON",
    "version" : "0.0.1",
    "base_path" : "{base_path}", // demon base path
    "path_data" : "{base_path_data}", // demon base path data
    "smart_api_url_base" : "{smart_api_url_base}",
    "smart_api_url" : "{smart_api_url}",
    "smart_api_user" : "{smart_api_user}",
    "smart_api_key" : "{smart_api_key}",
    "smart_api_schema" : "{smart_api_schema}",
    "smart_api_app" : "{smart_api_app}"
}

```

**Properties:**

Name | Description
---- | -----
Name | Name of your DEMON
version | Version of your DEMON
base_path | Path base on system
path_data | Path to store static files
smart_api_url_base | url base of SMART
smart_api_url | direct url SMART
smart_api_key | direct key SMART
smart_api_schema | app schema on SMART
smart_api_app | api app on SMART

### Controls (start|stop|reboot)

You can control a lot of actions in your system.

* Start

```
bash dscreen.sh
```

When start the service, the demon creates a new cli window to show up data.

* Stop

```
bash dkill.sh
```

When the demon is running, you can kill all processes at same time.

* Reboot

```
bash dreboot.sh
```

### Packages

If you want extend your system capabilities maybe you can find new package to help or you can create it.

#### Installing new package

You can install a package cloning it from the DEMON package repository.

#### Stratucture folders

```
DEMON
|- data
|- demons
|- examples
|- logs
|- scripts
|- dkill.sh
|- dscreen.sh
|- dreboot.sh
|- README.md
|- run.php
|- settings.json
```

### Data

Static Files

### Logs

The default folder to store logs. If you want change path to the logs folder you can setup it on settings file (settings.json).

### Examples

On this folder you may find a lot of examples.


-----

@Author José Wilker <jose.wilker@smartapps.com.br>