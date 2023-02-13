<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "$_GET": [
      {
        "type": "text",
        "name": "filter"
      },
      {
        "type": "text",
        "name": "sort"
      },
      {
        "type": "text",
        "name": "dir"
      }
    ]
  },
  "exec": {
    "steps": {
      "name": "query",
      "module": "dbconnector",
      "action": "select",
      "options": {
        "connection": "devOcean",
        "sql": {
          "type": "SELECT",
          "columns": [],
          "params": [
            {
              "operator": "equal",
              "type": "expression",
              "name": ":P1",
              "value": "{{$_GET.filter}}",
              "test": ""
            }
          ],
          "table": {
            "name": "filepath"
          },
          "primary": "id",
          "joins": [],
          "wheres": {
            "condition": "AND",
            "rules": [
              {
                "id": "filepath.serialno",
                "field": "filepath.serialno",
                "type": "string",
                "operator": "equal",
                "value": "{{$_GET.filter}}",
                "data": {
                  "table": "filepath",
                  "column": "serialno",
                  "type": "text",
                  "columnObj": {
                    "type": "string",
                    "maxLength": 255,
                    "primary": false,
                    "nullable": true,
                    "name": "serialno"
                  }
                },
                "operation": "="
              }
            ],
            "conditional": null,
            "valid": true
          },
          "query": "SELECT *\nFROM filepath\nWHERE serialno = :P1 /* {{$_GET.filter}} */",
          "orders": []
        }
      },
      "output": true,
      "meta": [
        {
          "type": "number",
          "name": "id"
        },
        {
          "type": "text",
          "name": "serialno"
        },
        {
          "type": "text",
          "name": "pdf"
        },
        {
          "type": "text",
          "name": "img"
        },
        {
          "type": "text",
          "name": "video"
        },
        {
          "type": "text",
          "name": "audio"
        },
        {
          "type": "text",
          "name": "html"
        },
        {
          "type": "number",
          "name": "section"
        }
      ],
      "outputType": "array"
    }
  }
}
JSON
);
?>