# Indie Football documentation

This directory is the source of truth for the product's intended behaviour. Code,
database migrations, issues, and tests should trace back to the accepted rules here.

## Start here

1. Read [Product vision](product/vision.md) and [MVP scope](product/scope.md).
2. Use the [Glossary](product/glossary.md) whenever a domain term is unclear.
3. Consult the relevant file under `business-rules/` before implementing a feature.
4. Consult `workflows/` for multi-step processes and state transitions.
5. Record lasting technical choices under `decisions/`.
6. Read [development decisions](descions.md) and [application flow](flow.md) when
	tracing implementation intent or file-level behavior.
7. Track implementation work with GitHub issues and the GitHub Project.

## Document status

- **Draft**: open questions remain; do not treat the behaviour as final.
- **Accepted**: approved and ready to implement and test.
- **Superseded**: replaced by a newer rule or decision.
- **Deprecated**: intentionally no longer applicable.

## Traceability

Every feature should follow this chain:

```text
Product goal -> Business rule -> GitHub issue -> Code -> Automated test
```

Business rules use stable identifiers such as `BR-TEAM-001`. Reference these IDs in
issue descriptions, pull requests, and test names where practical.

## Change process

1. Capture a new idea as a GitHub issue in **Inbox**.
2. Update the relevant rule or workflow and resolve its open questions.
3. Mark the rule **Accepted** only after the product decision is made.
4. Add acceptance criteria and rule IDs to the issue, then move it to **Ready**.
5. Implement, test, and review the feature against the accepted documentation.
6. Update documentation in the same pull request whenever behaviour changes.
