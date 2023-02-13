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
      "name": "nftListPage",
      "module": "dbconnector",
      "action": "select",
      "options": {
        "connection": "devOcean",
        "sql": {
          "type": "SELECT",
          "columns": [
            {
              "table": "pdf",
              "column": "serialno"
            },
            {
              "table": "pdf",
              "column": "ipns"
            },
            {
              "table": "pdf",
              "column": "transactionHash"
            },
            {
              "table": "pdf",
              "column": "transferWallet"
            },
            {
              "table": "pdf",
              "column": "tokenId"
            },
            {
              "table": "pdf",
              "column": "_network"
            }
          ],
          "params": [],
          "table": {
            "name": "pdf"
          },
          "primary": "id",
          "joins": [],
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
          "query": "SELECT serialno, ipns, transactionHash, transferWallet, tokenId, `_network`\nFROM pdf\nWHERE hasNft <> '0'"
        }
      },
      "output": true,
      "meta": [
        {
          "type": "text",
          "name": "serialno"
        },
        {
          "type": "text",
          "name": "ipns"
        },
        {
          "type": "text",
          "name": "transactionHash"
        },
        {
          "type": "text",
          "name": "transferWallet"
        },
        {
          "type": "number",
          "name": "tokenId"
        },
        {
          "type": "text",
          "name": "_network"
        }
      ],
      "outputType": "array"
    }
  }
}
JSON
);
?>