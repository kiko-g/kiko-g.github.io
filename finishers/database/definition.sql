DROP TABLE IF EXISTS finishers;
CREATE TABLE finishers (
	player_name TEXT UNIQUE PRIMARY KEY,
	finisher_count INTEGER NOT NULL
);

INSERT INTO finishers(player_name, finisher_count) VALUES ('Frankie', 72);
INSERT INTO finishers(player_name, finisher_count) VALUES ('Levels', 58);
