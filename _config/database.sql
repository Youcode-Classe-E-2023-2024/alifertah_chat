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

CREATE TABLE rooms (
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

CREATE TABLE room_user (
    room_id BIGINT,
    user_id BIGINT,
);

CREATE TABLE Invitation (
    invitation_id INT PRIMARY KEY,
    room_id BIGINT,
    invitation_link VARCHAR(255) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES Room(id),
);

CREATE TABLE friend_requests (
    request_id bigint auto_increment primary key,
    sender_id bigint not null,
    receiver_id bigint not null,
    status enum('pending', 'accepted', 'rejected') not null default 'pending',
    created_at timestamp default current_timestamp,
    foreign key (sender_id) references users(users_id),
    foreign key (receiver_id) references users(users_id)
);