# Tournament business rules

Status: Draft

## BR-TOURNAMENT-001 — Valid schedule window

When both dates exist, a tournament's end date cannot be earlier than its start date.

## BR-TOURNAMENT-002 — Unique enrollment

A team may be enrolled only once in the same tournament.

## BR-TOURNAMENT-003 — Match participants

The home and away teams in a match must be different. For tournament matches, both
teams must be enrolled in that tournament.

## BR-TOURNAMENT-004 — Historical integrity

Removing a team from a tournament must not silently destroy published match history.

## Open questions

- Who may create and administer a tournament?
- Does enrollment require acceptance by the team?
- Can teams withdraw after fixtures are scheduled?
- Which tournament formats are included in the MVP?
