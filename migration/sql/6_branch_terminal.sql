create table branch_terminal(
    id_branch integer references branch (id),
    id_terminal integer references terminal (id),
    primary key (id_branch, id_terminal)
);