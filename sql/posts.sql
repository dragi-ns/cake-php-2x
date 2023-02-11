DROP TABLE IF EXISTS posts;

CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    user_id INT(11)
);

INSERT INTO posts (title, body, created, user_id)
    VALUES ('The title', 'This is the post body.', NOW(), 1);
INSERT INTO posts (title, body, created, user_id)
    VALUES ('A title once again', 'And the post body follows.', NOW(), 2);
INSERT INTO posts (title, body, created, user_id)
    VALUES ('Title strikes back', 'This is really exciting! Not.', NOW(), 2);