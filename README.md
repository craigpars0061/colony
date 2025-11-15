# Medieval Colony Sim
## Integrated Map Generation Code


**Medieval Colony survival RTS powered by Laravel & Livewire**

This repository contains a working foundation for a persistent, server-authoritative colony simulation inspired by RimWorld,
adapted to a medieval setting. It includes a procedural map generator, A* pathfinding with diagonal movement and weighted terrain,
a server-side GameEngine tick loop, BotManager AI with farming cycles and multi-worker coordination, and initial colony systems.

> Note: This bundle provides code skeletons and implementations but does not include Composer-installed vendor files.
Run `composer install` inside the project to fetch dependencies and enable the full Laravel runtime.

## Quick start (development)

Requirements: Docker + Docker Compose OR PHP 8.1, Composer, MySQL, Redis

Using Docker Compose:
```bash
# build and start containers (dev)
docker compose -f docker-compose.dev.yml up -d --build

# enter app container
docker exec -it mcs_app_dev bash

# inside container:
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve --host=0.0.0.0 --port=8000
```

Without Docker (local PHP development):
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## What is included (high level)
- Procedural map generator (app/Services/MapGenerator.php)
- GameEngine with tick loop and colony hooks (app/Services/GameEngine.php)
- A* Pathfinder (app/Services/Pathfinder.php) with MinHeap
- BotManager AI (app/Services/BotManager.php)
- Harvesting logic & Construction services (app/Services)
- Colonist systems: NeedsSystem, JobScheduler, ColonistManager (app/Services)
- WorkGivers: Lumber, Harvest, Haul
- Migrations for games, players, maps, tiles, units, commands, resource_nodes, colonists, tasks, items, recipes
- PHPUnit tests scaffolding (tests/)
- Docker development + production compose files

See `docs/` for the procedural map visuals and logo (drop your banner in docs/banner.png)

## Next steps
1. Run composer to install Laravel and Livewire.
2. Run migrations and seeders.
3. Start the scheduler & queue worker to process ticks and jobs.
4. Open the game UI and connect multiple clients to observe server-authoritative simulation.

I have merged an external map generation toolkit into `app/Helpers/` which includes:
- Perlin/Noise-based heightmap generation
- MapDatabase helpers, Cell and Map repositories
- Workflows implemented as Artisan console commands to generate and process tiles step-by-step

### Available Artisan commands (from the integrated mapgen)
- `php artisan map:1init` - generate heightmap and initial map data
- `php artisan map:2firststep-tiles` - process tiles from heightmap into tile types
- `php artisan map:3mountain` - mountain processing step
- `php artisan map:4water` - water processing step
- and other processing commands found under `app/Console/Commands/`

### How to use
1. Ensure the `app/Helpers` directory is present (it was merged into the project).  
2. Run the commands in order to build the map into your DB / map model:  

```bash
php artisan map:1init
php artisan map:2firststep-tiles
php artisan map:3mountain
php artisan map:4water
```

3. Review `resources/views/mapgen/` for a minimal UI to preview progress (optional).

### Notes on integration
- The mapgen uses its own MapDatabase and Cell models under `app/Helpers/MapDatabase/`. If you wish to map these directly to your game's `tiles` and `resource_nodes` tables, I can add an importer that converts generated Cells into Eloquent `Tile` and `ResourceNode` rows. Tell me if you'd like me to implement that importer (recommended).
- The map generator supports deterministic seeds. Pass seed options via the console commands (check command options in `app/Console/Commands/`).

## Co-Op Procedurally generated RTS Colony survivalW

That is the idea anyways

Includes:

- A* pathfinding
- GameEngine tick-loop integration
- Procedurally Generated Terrain

🗺️ Gameplay Overview 🧑‍🌾 Colonists

Each colonist has:

Stats

Mood

Needs

Skills

Current job state

Pathfinding agent

🔁 Tick Loop

The entire simulation ticks at 250 ms intervals:

Update colonists

Process jobs

Evaluate states

Move units

Harvest/build

Sync to clients

🌾 Resources

- Trees
- Stone
- Fields (wheat, barley, vegetables)
- Forageables

🏗️ Buildings

- Stockpiles
- Houses
- Workshops
- Farms
- Storage huts
- Walls and defenses

🧭 A* Pathfinding

- Custom binary min-heap (~40% faster than SplPriorityQueue)
- Terrain weights (mud, grass, roads)
- Diagonal movement
- Early exit optimization

🤝 Contributing

- Contributions are welcome!
- Fork the repo
- Create a feature branch
- Submit a PR
- Include test coverage where appropriate

📅 Planned Features (Roadmap) 🌱 Gameplay

- Temperature system & seasons
- Hunting & wildlife
- Illness + medicine
- Bandit raids
- Diplomacy/reputation system

⚙️ Systems

- Save/load multiple worlds
- Deeper colonist AI (psych traits, work priorities RimWorld-style)
- Auto-designated work zones
- Blueprint system for buildings

🌐 Multiplayer Enhancements

- Player factions
- Territory
- Shared trade economy

⭐ Support the Project

- If you'd like to support development:

​	⭐ Star the repo

​	🍴 Contribute code

​	🧪 Help test the simulation

​	📣 Share ideas and feature requests
