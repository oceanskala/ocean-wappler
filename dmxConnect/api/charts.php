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
    "steps": {
      "name": "doughnat",
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
              "alias": "guitar",
              "aggregate": "COUNT"
            },
            {
              "table": "pdf",
              "column": "hasNft",
              "alias": "nft",
              "aggregate": ""
            }
          ],
          "params": [],
          "table": {
            "name": "pdf"
          },
          "primary": "id",
          "joins": [],
          "groupBy": [
            {
              "table": "pdf",
              "column": "hasNft"
            }
          ],
          "wheres": {
            "condition": "OR",
            "rules": [
              {
                "id": "pdf.hasNft",
                "field": "pdf.hasNft",
                "type": "string",
                "operator": "equal",
                "value": "has",
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
                "operation": "=",
                "table": "pdf"
              },
              {
                "id": "pdf.hasNft",
                "field": "pdf.hasNft",
                "type": "string",
                "operator": "equal",
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
                "operation": "=",
                "table": "pdf"
              },
              {
                "id": "pdf.hasNft",
                "field": "pdf.hasNft",
                "type": "string",
                "operator": "equal",
                "value": "transferred",
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
                "operation": "=",
                "table": "pdf"
              }
            ],
            "conditional": null,
            "valid": true
          },
          "query": "SELECT COUNT(serialno) AS guitar, hasNft AS nft\nFROM pdf\nWHERE hasNft = 'has' OR hasNft = '0' OR hasNft = 'transferred'\nGROUP BY hasNft"
        }
      },
      "output": true,
      "meta": [
        {
          "type": "text",
          "name": "guitar"
        },
        {
          "type": "text",
          "name": "nft"
        }
      ],
      "outputType": "array"
    }
  }
}
JSON
);
?>