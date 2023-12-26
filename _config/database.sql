create table users
(
    users_id       bigint auto_increment
        primary key,
    users_email    varchar(255) not null,
    users_password text         not null,
    users_username varchar(255) null,
    constraint users_users_email_uindex
        unique (users_email),
    constraint users_users_id_uindex
        unique (users_id)
);

CREATE TABLE Rooms (
    room_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(255) NOT NULL,
);

CREATE TABLE Messages (
    message_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    room_id BIGINT,
    sender_id BIGINT,
    content TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES Rooms(room_id),
    FOREIGN KEY (sender_id) REFERENCES Users(users_id),
);

CREATE TABLE RoomUser (
    room_id INT,
    user_id INT,
    FOREIGN KEY (room_id) REFERENCES Rooms(room_id),
    FOREIGN KEY (user_id) REFERENCES users(users_id)
);
