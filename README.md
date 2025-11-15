# colony
Co-Op Procedurally generated RTS Colony survival

Includes:

A* pathfinding tests

Binary heap performance tests

Bot AI behavior tests

GameEngine tick-loop integration tests

🗺️ Gameplay Overview
🧑‍🌾 Colonists

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

Trees

Stone

Fields (wheat, barley, vegetables)

Forageables

🏗️ Buildings

Stockpiles

Houses

Workshops

Farms

Storage huts

Walls and defenses

🧭 A* Pathfinding

Custom binary min-heap (~40% faster than SplPriorityQueue)

Terrain weights (mud, grass, roads)

Diagonal movement

Early exit optimization

🤝 Contributing

Contributions are welcome!

Fork the repo

Create a feature branch

Submit a PR

Include test coverage where appropriate

📅 Planned Features (Roadmap)
🌱 Gameplay

Temperature system & seasons

Hunting & wildlife

Illness + medicine

Bandit raids

Diplomacy/reputation system

⚙️ Systems

Save/load multiple worlds

Deeper colonist AI (psych traits, work priorities RimWorld-style)

Auto-designated work zones

Blueprint system for buildings

🌐 Multiplayer Enhancements

Player factions

Territory

Shared trade economy

⭐ Support the Project

If you'd like to support development:

⭐ Star the repo

🍴 Contribute code

🧪 Help test the simulation

📣 Share ideas and feature requests
