create table transaction(
    id serial primary key,
    id_terminal integer references terminal (id) null,
    value integer not null,
    commission integer null,
    date varchar not null
);