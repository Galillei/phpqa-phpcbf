Configure phpqa.yml for using phpcbf code fixer:
```yaml
phpcbf:
    # alternatively you can use an array to define multiple standards (https://github.com/squizlabs/PHP_CodeSniffer/wiki/Usage#specifying-a-coding-standard)
    standard: PSR2
    # number of allowed errors is compared with warnings+errors, or just errors from checkstyle.xml
    ignoreWarnings: false
    outputMode: 2
  #in section tools
tool:
    phpcbf: Edge\QA\Tools\Analyzer\Phpcbf
```
Now you can use it.
There is error when phpqa create report, if phpcbf fixed errors there is display only 1 coount error.
But if we go to web version we will see correct information