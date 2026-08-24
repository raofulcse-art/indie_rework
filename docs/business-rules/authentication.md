# Authentication business rules

Status: Draft

## BR-AUTH-001 — Protected operations

Creating or modifying teams, players, tournaments, fixtures, or results requires an
authenticated account.

## BR-AUTH-002 — Email verification

An account must have a verified email before performing organization or competition
management actions.

## BR-AUTH-003 — User and player separation

A user account and a player profile are separate records. Linking them must use the
account-linking workflow rather than assuming that every user is a player.

## Open questions

- Is registration public or invitation-only?
- Which read-only pages are available to guests?
- Is email verification required before a user can accept an invitation?
