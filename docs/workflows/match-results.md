# Match-result workflow

Status: Draft

```text
Scheduled
   -> Awaiting results
      -> Partially submitted
         -> Published (matching submissions)
         -> Disputed (conflicting submissions)
            -> Published (authorized resolution)

Scheduled/Awaiting results -> Postponed
Scheduled/Awaiting results -> Cancelled
Published -> Published (audited correction)
```

## Proposed transition rules

| From | Event | To | Actor |
| --- | --- | --- | --- |
| Scheduled | Match becomes eligible for results | Awaiting results | System or tournament admin |
| Awaiting results | First team submits | Partially submitted | Authorized team representative |
| Partially submitted | Second matching result | Published | System |
| Partially submitted | Second conflicting result | Disputed | System |
| Disputed | Resolve dispute | Published | Tournament or system admin |
| Published | Correct result with reason | Published | Authorized administrator |

## Invariants

- Only participating teams can submit.
- Published scores are the sole source for standings and winner calculation.
- Conflicting submissions are never silently overwritten.
- Every administrative correction is auditable.

## Decisions required

- When does a scheduled match begin accepting submissions?
- Can a submission be changed, and until which transition?
- Is one submission sufficient after a timeout?
- Which administrator role has final authority?
