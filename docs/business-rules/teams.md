# Team business rules

Status: Draft

## BR-TEAM-001 — Team creation

An eligible authenticated user may create a team. The creator becomes an owner in
the same successful operation.

## BR-TEAM-002 — Required ownership

A team must always have at least one active owner. The final owner cannot leave, be
removed, or be demoted until another owner is appointed.

## BR-TEAM-003 — Staff uniqueness

A user may hold only one active staff membership record for a given team.

## BR-TEAM-004 — Team name uniqueness

Team names are unique according to the database's agreed case-sensitivity rules.

## BR-TEAM-005 — Staff authority

Owners may manage owners and managers. Manager capabilities must be explicitly
listed in the authorization matrix and enforced through policies.

## Open questions

- Can a team have multiple owners?
- Can managers invite other managers?
- Should deleted teams be restorable, and by whom?
- May a user own or manage multiple teams?
