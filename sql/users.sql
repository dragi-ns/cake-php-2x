DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

INSERT INTO users (username, password, role, created)
    VALUES ('dragi-ns', 'totally-not-plain-password', 'admin', NOW());

INSERT INTO users (username, password, role, created)
    VALUES ('user', 'plain-password', 'author', NOW());