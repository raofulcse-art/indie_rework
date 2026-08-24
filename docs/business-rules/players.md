# Player business rules

Status: Draft

## BR-PLAYER-001 — Profile without account

A player profile may be created without a linked user account.

## BR-PLAYER-002 — Unique account link

A user account may be linked to at most one player profile, and a player profile may
be linked to at most one user account.

## BR-PLAYER-003 — Roster history

Leaving, release, or transfer must preserve historical roster membership rather than
delete it.

## BR-PLAYER-004 — Team squad number

A squad number belongs to a roster membership, not permanently to the player.

## BR-PLAYER-005 — Captaincy

Captain and vice-captain are roster designations. They do not grant management
permissions unless a separate accepted rule explicitly says so.

## Open questions

- Can one player be active on multiple teams simultaneously?
- Must squad numbers be unique among active members of a team?
- Who may create an unlinked player profile?
- What evidence is required to approve an account-link request?
