# ADR-0002 — Authorization strategy

Status: Proposed
Date: 2026-08-24

## Context

The application needs platform-wide administrators as well as roles scoped to one
team. Treating both concepts as identical would make authorization difficult to
reason about.

## Proposed decision

- Use Spatie Laravel Permission for global roles and permissions.
- Use `team_staff` for team-specific owner and manager membership.
- Use Laravel policies to combine global authority and resource membership.
- Do not enable Spatie Teams mode initially.

## Consequences

- Team-specific checks belong in policies rather than route-only middleware.
- The authorization matrix must be reflected in policy tests.
- Captains do not receive management rights solely through roster designation.
