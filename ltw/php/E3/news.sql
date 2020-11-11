CREATE TABLE users (
  username VARCHAR PRIMARY KEY,
  password VARCHAR,
  name VARCHAR
);

CREATE TABLE news (
  id INTEGER PRIMARY KEY,
  title VARCHAR,
  published INTEGER, -- date when the article was published in epoch format
  tags VARCHAR, -- comma separated tags
  username VARCHAR REFERENCES users, -- who wrote the article
  introduction VARCHAR,
  fulltext VARCHAR
);

CREATE TABLE comments (
  id INTEGER PRIMARY KEY,
  news_id INTEGER REFERENCES news,
  username VARCHAR REFERENCES users,
  published INTEGER, -- date when news item was published in epoch format
  text VARCHAR
);

-- All passwords are 1234 in SHA-1 format
INSERT INTO users VALUES ("dominic", "7110eda4d09e062aa5e4a390b0a572ac0d2c0220", "Dominic Woods");
INSERT INTO users VALUES ("zachary", "7110eda4d09e062aa5e4a390b0a572ac0d2c0220", "Zachary Young");
INSERT INTO users VALUES ("alicia", "7110eda4d09e062aa5e4a390b0a572ac0d2c0220", "Alicia Hamilton");
INSERT INTO users VALUES ("abril", "7110eda4d09e062aa5e4a390b0a572ac0d2c0220", "Abril Cooley");

INSERT INTO news VALUES (NULL,
  'Lorem ipsum dolor sit amet, consectetur',
  1507901651,
  'politics,economy',
  'abril',
  'Nulla facilisi.',
  'Aliquam justo nibh.');

INSERT INTO news VALUES (NULL,
  'Donec placerat tempor ex sit amet',
  1508074451,
  'local,life',
  'alicia',
  'Nam aliquet leo vel ',
  'Morbi bibendum volutpat pellentesque.');

INSERT INTO news VALUES (NULL,
  'Vivamus fermentum dui nisi, at posuere',
  1508160851,
  'nature,science',
  'zachary',
  'Donec magna sapien',
  'Nullam et arcu non tellus.');

INSERT INTO news VALUES (NULL,
  'Quisque a dapibus magna, non scelerisque',
  1508247278,
  'transports,vehicles',
  'dominic',
  'Etiam massa magn.',
  'Duis condimentum metus.');

INSERT INTO comments VALUES (NULL,
  4,
  'dominic',
  1508247532,
  'Aliquam maximus commodo dui.'
);

INSERT INTO comments VALUES (NULL,
  4,
  'abril',
  1508247632,
  'Duis scelerisque purus.'
);

INSERT INTO comments VALUES (NULL,
  3,
  'alicia',
  1508247132,
  'Phasellus.'
);
