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