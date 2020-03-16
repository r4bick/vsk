create table bank_terminal(
    id_bank integer references bank (id),
    id_terminal integer references terminal (id),
    primary key (id_bank, id_terminal)
);