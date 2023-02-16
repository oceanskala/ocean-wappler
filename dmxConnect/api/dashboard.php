<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "$_GET": [
      {
        "type": "text",
        "name": "sort"
      },
      {
        "type": "text",
        "name": "dir"
      },
      {
        "type": "text",
        "name": "offset"
      },
      {
        "type": "text",
        "name": "limit"
      }
    ]
  },
  "exec": {
    "steps": [
      {
        "name": "activeNetwork",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "devOcean",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "smartContracts",
                "column": "id"
              },
              {
                "table": "smartContracts",
                "column": "networkk"
              },
              {
                "table": "smartContracts",
                "column": "symbol"
              }
            ],
            "params": [],
            "table": {
              "name": "smartContracts"
            },
            "primary": "id",
            "joins": [],
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "smartContracts.activated",
                  "field": "smartContracts.activated",
                  "type": "string",
                  "operator": "equal",
                  "value": "1",
                  "data": {
                    "table": "smartContracts",
                    "column": "activated",
                    "type": "text",
                    "columnObj": {
                      "type": "enum",
                      "enumValues": [
                        "0",
                        "1"
                      ],
                      "default": "'0'",
                      "maxLength": 1,
                      "primary": false,
                      "nullable": false,
                      "name": "activated"
                    }
                  },
                  "operation": "="
                }
              ],
              "conditional": null,
              "valid": true
            },
            "query": "SELECT id, networkk, symbol\nFROM smartContracts\nWHERE activated = '1'"
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
            "name": "networkk"
          },
          {
            "type": "text",
            "name": "symbol"
          }
        ],
        "outputType": "array"
      },
      {
        "name": "elementCount",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "devOcean",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "pdf",
                "column": "serialno",
                "alias": "elements",
                "aggregate": "COUNT"
              }
            ],
            "params": [],
            "table": {
              "name": "pdf"
            },
            "primary": "id",
            "joins": [],
            "groupBy": [],
            "query": "SELECT COUNT(serialno) AS elements\nFROM pdf"
          }
        },
        "output": true,
        "meta": [
          {
            "type": "text",
            "name": "elements"
          }
        ],
        "outputType": "array"
      },
      {
        "name": "nftCount",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "devOcean",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "pdf",
                "column": "serialno",
                "alias": "nftCount",
                "aggregate": "COUNT"
              }
            ],
            "params": [],
            "table": {
              "name": "pdf"
            },
            "primary": "id",
            "joins": [],
            "groupBy": [],
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "pdf.hasNft",
                  "field": "pdf.hasNft",
                  "type": "string",
                  "operator": "not_equal",
                  "value": "0",
                  "data": {
                    "table": "pdf",
                    "column": "hasNft",
                    "type": "text",
                    "columnObj": {
                      "type": "string",
                      "default": "'0'",
                      "maxLength": 50,
                      "primary": false,
                      "nullable": true,
                      "name": "hasNft"
                    }
                  },
                  "operation": "<>"
                }
              ],
              "conditional": null,
              "valid": true
            },
            "query": "SELECT COUNT(serialno) AS nftCount\nFROM pdf\nWHERE hasNft <> '0'"
          }
        },
        "output": true,
        "meta": [
          {
            "type": "text",
            "name": "nftCount"
          }
        ],
        "outputType": "array"
      }
    ]
  }
}
JSON
);
?>