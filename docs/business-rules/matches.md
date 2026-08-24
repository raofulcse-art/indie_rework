# Match business rules

Status: Draft

## BR-MATCH-001 — Participating teams

A match has exactly two distinct participating teams: one home and one away team.

## BR-MATCH-002 — Team submission limit

Each participating team may have at most one current result submission per match.

## BR-MATCH-003 — Authorized submission

A result may be submitted only by a user authorized to act for one of the match's
participating teams.

## BR-MATCH-004 — Matching results

When both teams submit the same home and away scores, the result may be published
automatically.

## BR-MATCH-005 — Conflicting results

When the two submissions differ, the match enters the disputed state and neither
submission becomes authoritative until the dispute is resolved.

## BR-MATCH-006 — Winner derivation

The winner is derived from the published score. A draw has no winner team.

## BR-MATCH-007 — Correction history

Changing or cancelling a published result requires an audit action containing the
actor, previous score, new score when applicable, reason, and timestamp.

## Open questions

- May a team edit its submission before the other team submits?
- What happens when only one team ever submits?
- Who may resolve disputes and correct published results?
- Are postponed and cancelled matches allowed to retain submissions?
