# ADR-0001 — Frontend stack

Status: Proposed
Date: 2026-08-24

## Context

The Laravel project needs authentication scaffolding and an application UI. Laravel
offers Livewire and Inertia-based React, Vue, and Svelte starter kits.

## Proposed decision

Use Laravel's Livewire starter kit to keep most application development in PHP while
retaining reactive UI capabilities.

## Consequences

- The team needs Laravel, Blade, Livewire, and Tailwind knowledge.
- The application avoids maintaining a separate SPA architecture.
- This project should not add Breeze as new scaffolding.

## Decision required

Accept Livewire or replace this proposal with the selected frontend stack before
authentication and feature UI work begins.
