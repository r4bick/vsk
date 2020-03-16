create table migration(
    id serial primary key,
    name varchar unique not null,
    created_at integer not null
);