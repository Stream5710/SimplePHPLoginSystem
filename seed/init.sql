USE test;
GRANT ALL PRIVILEGES ON *.* TO 'test';
DROP USER IF EXISTS 'connector'@'localhost';
CREATE USER 'connector'@'localhost' IDENTIFIED BY '12345';
GRANT SELECT, INSERT, UPDATE, DELETE ON test.* TO 'connector'@'localhost';
FLUSH PRIVILEGES;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id BIGINT NOT NULL AUTO_INCREMENT,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);