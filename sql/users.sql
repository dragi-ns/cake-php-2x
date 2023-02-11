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
    VALUES ('dragi-ns', '$2a$10$zi6JaQnXsCHMT2zCUHSc0eiqphIsVHprT2UmeBuyxCVLnFzAlqsf6', 'admin', NOW());

INSERT INTO users (username, password, role, created)
    VALUES ('user', '$2a$10$zi6JaQnXsCHMT2zCUHSc0eiqphIsVHprT2UmeBuyxCVLnFzAlqsf6', 'author', NOW());