-- use webk;
create table if not exists user
(
    id     int auto_increment primary key,
    login  varchar(15) not null,
    psswrd varchar(100) not null,
    email  varchar(50) not null,
    phone  varchar(11)
    is_moderator
);

create table if not exists review
(
    id              int auto_increment primary key,
    header          varchar(100) not null,
    create_datetime datetime     not null,
    trailer_link    varchar(300) not null,
    poster_blob     mediumblob   not null,
    content         text         not null,
    user_id         int,
    foreign key (user_id) references user (id) on delete cascade
);

create table comment
(
    id              int auto_increment primary key,
    content         varchar(10000) not null,
    create_datetime datetime       not null,
    user_id         int,
    foreign key (user_id) references user (id) on delete cascade
);