# ADR-0003 — Database definition strategy

Status: Proposed
Date: 2026-08-24

## Context

`database/database.sql` documents the intended tables and columns but is not
executable SQL and does not fully define constraints or deletion behaviour.

## Proposed decision

- Keep `database/database.sql` as an early design reference.
- Treat Laravel migrations as the executable database source of truth.
- Add models, factories, and tests alongside each related migration group.
- Let package-owned migrations, such as Spatie Permission's migration, define their
  package tables instead of duplicating them manually.

## Consequences

The reference schema must not be run directly. Differences discovered during
implementation should be resolved deliberately and documented.
