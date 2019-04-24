---
title: QuickBooks Clearing Journal Entries
layout: post
category: blog
tags:
- QuickBooks

---
{% include JB/setup %}

Journal entries sometimes impact accounts that are meant to only be handled using standardized objects (e.g., Invoices, Payments, Bills).
This can happen when shifting expense/income to an appropriate fiscal period via adjusting entries.
Even when they zero out, they can remain in some reports.

## Unpaid Bills Report

Remove offsetting journal entries against the AP account (no payment is actually due).

1. Go to pay bills area
2. Each zeroed journal entry should have a credit associated to them, which you would apply to the respective vendor
3. This clears the payable so that it does not appear in unpaid bills

## Open Invoices

Remove offsetting journal entries against the AR account (no payment is actually due).

1. Go to Receive Payments
2. Each zeroed journal entry should have an entry on the payment
3. Click "Discounts and Credits" to select the offsetting journal entries
4. "Save & Close" the $0 payment to mark both entries as applied

For variants of this same problem, <a href="https://www.accountingweb.com/technology/accounting-software/clearing-zero-balances-in-quickbooks-accounts-receivable-aging">see this post</a>.
