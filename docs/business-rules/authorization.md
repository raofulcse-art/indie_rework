# Authorization rules and matrix

Status: Draft

Global roles and permissions are managed with Spatie Laravel Permission. Team owner
and manager membership is stored in `team_staff`. Laravel policies combine global
permissions with resource-specific team membership.

| Action | Authenticated user | Team manager | Team owner | Tournament admin | System admin |
| --- | ---: | ---: | ---: | ---: | ---: |
| Create a team | Proposed: Yes | Yes | Yes | Yes | Yes |
| Edit a team | No | Proposed: Yes | Yes | No | Yes |
| Delete a team | No | No | Proposed: Yes | No | Yes |
| Manage team staff | No | No | Yes | No | Yes |
| Manage team roster | No | Proposed: Yes | Yes | No | Yes |
| Create a tournament | No | No | No | Proposed: Yes | Yes |
| Schedule tournament matches | No | No | No | Proposed: Yes | Yes |
| Submit a team result | No | Proposed: Yes | Yes | No | Yes |
| Resolve a dispute | No | No | No | Proposed: Yes | Yes |
| Correct a published result | No | No | No | Proposed: Yes | Yes |

Values marked `Proposed` require explicit acceptance before implementation.
