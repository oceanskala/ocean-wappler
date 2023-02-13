<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "$_GET": [
      {
        "type": "text",
        "name": "section"
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
              "value": "{{$_GET.section}}",
              "test": ""
            }
          ],
          "table": {
            "name": "pdf"
          },
          "primary": "id",
          "joins": [],
          "orders": [],
          "wheres": {
            "condition": "AND",
            "rules": [
              {
                "id": "pdf.section",
                "field": "pdf.section",
                "type": "double",
                "operator": "equal",
                "value": "{{$_GET.section}}",
                "data": {
                  "table": "pdf",
                  "column": "section",
                  "type": "number",
                  "columnObj": {
                    "type": "integer",
                    "primary": false,
                    "nullable": true,
                    "name": "section"
                  }
                },
                "operation": "="
              }
            ],
            "conditional": null,
            "valid": true
          },
          "query": "SELECT *\nFROM pdf\nWHERE section = :P1 /* {{$_GET.section}} */"
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
          "name": "MFS"
        },
        {
          "type": "text",
          "name": "ipns"
        },
        {
          "type": "text",
          "name": "transferWallet"
        },
        {
          "type": "text",
          "name": "transactionHash"
        },
        {
          "type": "text",
          "name": "transferHash"
        },
        {
          "type": "number",
          "name": "tokenId"
        },
        {
          "type": "number",
          "name": "fee"
        },
        {
          "type": "number",
          "name": "transferFee"
        },
        {
          "type": "text",
          "name": "hasNft"
        },
        {
          "type": "text",
          "name": "ipnsStatus"
        },
        {
          "type": "number",
          "name": "version"
        },
        {
          "type": "text",
          "name": "cronjob_status"
        },
        {
          "type": "datetime",
          "name": "timedate"
        },
        {
          "type": "datetime",
          "name": "NFTtimedate"
        },
        {
          "type": "text",
          "name": "_network"
        },
        {
          "type": "text",
          "name": "requestedNetwork"
        },
        {
          "type": "boolean",
          "name": "nftRequest"
        },
        {
          "type": "boolean",
          "name": "hasStock"
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