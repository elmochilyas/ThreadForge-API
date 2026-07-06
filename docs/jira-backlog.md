# ThreadForge Jira Backlog

This local backlog mirrors the project user stories and can be copied into Jira if an external project is required.

## Epic: Secure Headless API

- `feat(auth): implement Sanctum registration, login, logout`
- `feat(auth): protect API routes with bearer tokens`
- `test(auth): cover token issue, revocation, and unauthorized access`

## Epic: Campaign Blueprint Management

- `feat(blueprints): create style-rule CRUD endpoints`
- `feat(blueprints): include raw content and generated post counts`
- `test(blueprints): enforce ownership and validation`

## Epic: Async AI Generation

- `feat(content): submit raw content for queued processing`
- `feat(ai): implement structured post generation agent`
- `feat(queue): persist generated posts from background job`
- `test(content): assert endpoint returns 202 and pushes queue job`
- `test(ai): assert structured output is persisted through casts`

## Epic: Generated Post Lifecycle

- `feat(posts): list and show generated posts`
- `feat(posts): update status draft archived posted`
- `test(posts): enforce ownership and valid states`

## Epic: Ghostwriter Assistant

- `feat(agent): add contextual ghostwriter chat endpoint`
- `feat(tools): add getCampaignRules database tool`
- `feat(tools): add getPostHistory database tool`
- `feat(memory): persist and continue conversation state`
- `test(agent): assert tool calling and conversation persistence`

## Epic: Delivery Documentation

- `docs(api): document endpoints with Scribe PHPDoc`
- `docs(project): add README, MCD, and MLD`
- `chore(docs): generate Scribe documentation`
