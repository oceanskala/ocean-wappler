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
      }
    ]
  },
  "exec": {
    "steps": [
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