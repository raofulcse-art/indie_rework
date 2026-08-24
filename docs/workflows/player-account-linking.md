# Player account-linking workflow

Status: Draft

```text
Pending -> Accepted
        -> Rejected
        -> Cancelled
        -> Expired
```

## Proposed rules

1. The request identifies exactly one unlinked player and one eligible user.
2. Only one active request for the same player/user pair may exist.
3. Acceptance links the player and user atomically after rechecking uniqueness.
4. Terminal requests cannot be accepted or otherwise reopened.
5. All responses retain actor and timestamp information.

## Decisions required

- Who may initiate a request: player, team staff, administrator, or all three?
- Who must approve each type of request?
- What happens to other pending requests once one is accepted?
- How long does a request remain valid?
