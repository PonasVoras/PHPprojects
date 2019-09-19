# Raw PHP projects

``` sh
File writing console application 'FileWriter'

How it works:
  - Open Bin/ directory and load the 'start.php' script
  - Autoloader gets registered
  - If user input filename is present in the 'InputFiles' the algoritm starts
  - The format for output file is set in 'config.json' file
  - The result can be found in 'OutputFiles' directory
  
How to:
 - Add new formats ?
    - Create a class naming it 'Write' + format name. Implementing WriteInterface, ofcourse.
    - Head to 'config.json' and change "write_config_format" parameter
 -  Change file directories ?
    - Head to 'config.json'
  
Brief description:
  - No GMO, eco-friendly code, without using no libs.
  - GitHub was infact used
  - Code follows PSR-1 and PSR-2 standards
  - SOLID and DRY and KISS where used
  - Has a functioning PSR-4 compliant autoloader
  - Configuration file can be saved in a various formats
  - Hexagonal architecture was used
  - So far, files can be saved with CSV, XML, JSON formats, more can be added
  - It is easily modifiable and readable
  - Spits exceptions if one is not careful

```

