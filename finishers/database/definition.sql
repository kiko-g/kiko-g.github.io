DROP TABLE IF EXISTS finishers;
CREATE TABLE finishers (
	player_name TEXT UNIQUE PRIMARY KEY,
	finisher_count INTEGER NOT NULL
);

INSERT INTO finishers(player_name, finisher_count) VALUES ('frankie', 73);
INSERT INTO finishers(player_name, finisher_count) VALUES ('levels', 59);
INSERT INTO finishers(player_name, finisher_count) VALUES ('open_user', 214);
