# Team invitation workflow

Status: Draft

```text
Pending -> Accepted
        -> Rejected
        -> Cancelled
        -> Expired
```

## Proposed rules

1. An authorized team staff member invites a specific registered user.
2. Only one pending invitation for the same user and team may exist at a time.
3. Only the invited user may accept or reject the invitation.
4. The inviter or an authorized owner may cancel a pending invitation.
5. An invitation cannot be acted on after its expiration time.
6. Accepting an invitation creates the appropriate team relationship atomically.

## Decisions required

- Which staff roles can send invitations?
- Is this workflow for staff, players, or both?
- What role does the invited user receive?
- How long does an invitation remain valid?
