drop database if exists heatah;
create database heatah /*!40100 default character set utf8 */;
use heatah;

CREATE TABLE creator (
creator_id int,
matches_played int,
creator_name varchar(50) DEFAULT 'Heatah Fajita',
#most_used_pokemon varchar(50),
PRIMARY KEY(creator_id)
#FOREIGN KEY (most_used_pokemon) REFERENCES pokemon_overall(name)
);

CREATE TABLE playstyle (
playstyle_id int,
playstyle_name varchar(50),
PRIMARY KEY(playstyle_id)
#some playstyles include: balance, offense, bulky offense, hyper offense, semi-stall, stall, 
#weather, rain, sun, sand, hail, terrain, trick room, webs, baton pass, Volt-Turn 
);

CREATE TABLE roles (
role_id int,
role_name varchar(50),
PRIMARY KEY(role_id)
#some roles include: pivot, wallbreaker, mega, z-move user, dynamax abuser, setup, sweeper, 
#physical attacker, special attacker, mixed attacker, physically defensive, special defensive, mixed defensive, 
#phasing, status inflicter, weather setter, sun setter, rain setter, sand setter, hail setter, terrain setter,
#hazard setter, stealth rock setter, spikes setter, toxic spikes setter, sticky web setter, trick room setter
#trapper, specific counter, weather abuser, terrain abuser, lure, nuke, cleric, revenge killer, lead, suicide lead
#hazard removal, spinner, defogger, spinblocker, glass cannon, stallbreaker, cleaner, FEAR, tank, hax, focus(?),
#rest-talk
);

CREATE TABLE pokemon_overall (
pokemon_name varchar(50),
PRIMARY KEY(pokemon_name)
);

CREATE TABLE pokemon_individual (
pokemon_name varchar(50),
gender char,
item varchar(25) DEFAULT 'None',
ability varchar(25) DEFAULT 'None',
#moveset_id int,
HP_EVs int DEFAULT 0,
Atk_EVs int DEFAULT 0,
Def_EVs int DEFAULT 0,
SpAtk_EVs int DEFAULT 0,
SpDef_EVs int DEFAULT 0,
Spd_EVs int DEFAULT 0,
nature varchar(7) DEFAULT 'Serious',
HP_IVs int DEFAULT 31,
Atk_IVs int DEFAULT 31,
Def_IVs int DEFAULT 31,
SpAtk_IVs int DEFAULT 31,
SpDef_IVs int DEFAULT 31,
Spd_IVs int DEFAULT 31,
pokemon_indiv_id varchar(36),
PRIMARY KEY(pokemon_indiv_id),
FOREIGN KEY(pokemon_name) REFERENCES pokemon_overall(pokemon_name)
#FOREIGN KEY(moveset_id) REFERENCES moveset
);

CREATE TABLE images (
focus_image_id int,
focus_image_path varchar(255),
focus_pokemon_name varchar(50),
PRIMARY KEY(focus_image_id),
FOREIGN KEY(focus_pokemon_name) REFERENCES pokemon_overall(pokemon_name)
);


CREATE TABLE moveset (
pokemon_id int,
move_id int
#FOREIGN KEY(pokemon_id) REFERENCES pokemon_individual(pokemon_indiv_id)
#moveset is used to join pokemon_individual with move_id.  For each pokemon_id there will be four moves
);

CREATE TABLE moves (
move_id int,
move_name varchar(30),
PRIMARY KEY(move_id)
);

CREATE TABLE team (
team_id int,
team_name varchar(255),
debut_episode int,
url varchar(255),
note varchar(255),
creator_id int,
summary varchar(255),
num_matches int DEFAULT 1,
num_wins int DEFAULT 0,
playstyle_id int,
image_url varchar(255),
#image_id int,
format SET('gen5ou', 'gen6ou', 'gen7ou', 'gen8ou'),
PRIMARY KEY(team_id),
FOREIGN KEY(creator_id) REFERENCES creator(creator_id),
FOREIGN KEY(playstyle_id) REFERENCES playstyle(playstyle_id)
#FOREIGN KEY (image_id) REFERENCES images(focus_image_id)
);

CREATE TABLE team_member (
team_id int,
pokemon_id int,
role_id int,
FOREIGN KEY(pokemon_id) REFERENCES pokemon_individual(pokemon_indiv_id),
FOREIGN KEY(team_id) REFERENCES team(team_id),
FOREIGN KEY(role_id) REFERENCES roles(role_id)
);

CREATE TABLE matches (
match_id int,
player_id int,
team_used int,
result SET('win', 'loss'),
pokemon_remaining int,
turns int DEFAULT 0,
lead_pokemon varchar(50),
mistake_count int DEFAULT 0,
PRIMARY KEY(match_id),
FOREIGN KEY(player_id) REFERENCES creator(creator_id),
FOREIGN KEY(team_used) REFERENCES team(team_id),
FOREIGN KEY(lead_pokemon) REFERENCES pokemon_overall(pokemon_name)
);

-- Episode int,
-- Name varchar(255),
-- TeamID int,
-- pokepaste varchar(255),
-- member1 varchar(25),
-- member2 varchar(25),
-- member3 varchar(25),
-- member4 varchar(25),
-- member5 varchar(25),
-- member6 varchar(25),
-- #notes varchar(500),
-- creator varchar(20),
-- PRIMARY KEY (TeamID)

