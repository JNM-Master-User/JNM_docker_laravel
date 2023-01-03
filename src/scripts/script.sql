create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                        not null,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    expires_at     timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table users
(
    id                char(36)     not null,
    email             varchar(255) not null,
    email_verified_at timestamp    null,
    password          varchar(255) not null,
    remember_token    varchar(100) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint users_email_unique
        unique (email),
    constraint users_id_unique
        unique (id)
)
    collate = utf8mb4_unicode_ci;

create table allotments
(
    id           char(36)     not null,
    name         varchar(255) not null,
    address      varchar(255) not null,
    date         date         not null,
    path_picture varchar(255) not null,
    `desc`       text         null,
    created_at   timestamp    null,
    updated_at   timestamp    null,
    created_by   char(36)     not null,
    updated_by   char(36)     not null,
    constraint allotments_id_unique
        unique (id),
    constraint allotments_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint allotments_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table bookings_users_allotments
(
    id           char(36)  not null,
    id_user      char(36)  not null,
    id_allotment char(36)  not null,
    created_at   timestamp null,
    updated_at   timestamp null,
    created_by   char(36)  not null,
    updated_by   char(36)  not null,
    constraint bookings_users_allotments_id_unique
        unique (id),
    constraint bookings_users_allotments_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint bookings_users_allotments_id_allotment_foreign
        foreign key (id_allotment) references allotments (id)
            on delete cascade,
    constraint bookings_users_allotments_id_user_foreign
        foreign key (id_user) references users (id)
            on delete cascade,
    constraint bookings_users_allotments_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table events
(
    id                     char(36)     not null,
    id_institution_manager varchar(255) null,
    name                   varchar(255) not null,
    address                varchar(255) not null,
    date                   date         not null,
    path_picture           varchar(255) not null,
    `desc`                 text         null,
    created_at             timestamp    null,
    updated_at             timestamp    null,
    created_by             char(36)     not null,
    updated_by             char(36)     not null,
    id_event_belong        char(36)     null,
    constraint events_id_unique
        unique (id),
    constraint events_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint events_id_event_belong_foreign
        foreign key (id_event_belong) references events (id)
            on delete cascade,
    constraint events_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table bookings_users_events
(
    id         char(36)  not null,
    id_user    char(36)  not null,
    id_event   char(36)  not null,
    created_at timestamp null,
    updated_at timestamp null,
    created_by char(36)  not null,
    updated_by char(36)  not null,
    constraint bookings_users_events_id_unique
        unique (id),
    constraint bookings_users_events_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint bookings_users_events_id_event_foreign
        foreign key (id_event) references events (id)
            on delete cascade,
    constraint bookings_users_events_id_user_foreign
        foreign key (id_user) references users (id)
            on delete cascade,
    constraint bookings_users_events_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table institutions
(
    id           char(36)     not null,
    name         varchar(255) not null,
    address      varchar(255) not null,
    path_picture varchar(255) not null,
    `desc`       text         null,
    created_at   timestamp    null,
    updated_at   timestamp    null,
    created_by   char(36)     not null,
    updated_by   char(36)     not null,
    constraint institutions_id_unique
        unique (id),
    constraint institutions_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint institutions_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table navigos
(
    id         char(36)  not null,
    zone       int       not null,
    created_at timestamp null,
    updated_at timestamp null,
    created_by char(36)  not null,
    updated_by char(36)  not null,
    constraint navigos_id_unique
        unique (id),
    constraint navigos_zone_unique
        unique (zone),
    constraint navigos_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint navigos_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table partners
(
    id           char(36)     not null,
    name         varchar(255) not null,
    company      varchar(255) not null,
    path_picture varchar(255) not null,
    created_at   timestamp    null,
    updated_at   timestamp    null,
    created_by   char(36)     not null,
    updated_by   char(36)     not null,
    constraint partners_id_unique
        unique (id),
    constraint partners_path_picture_unique
        unique (path_picture),
    constraint partners_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint partners_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table poles
(
    id         char(36)     not null,
    name       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    created_by char(36)     not null,
    updated_by char(36)     not null,
    constraint poles_id_unique
        unique (id),
    constraint poles_name_unique
        unique (name),
    constraint poles_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint poles_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table roles
(
    id         char(36)     not null,
    name       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    created_by char(36)     not null,
    updated_by char(36)     not null,
    constraint roles_id_unique
        unique (id),
    constraint roles_name_unique
        unique (name),
    constraint roles_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint roles_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table contacts
(
    id         char(36)     not null,
    id_pole    char(36)     not null,
    id_role    char(36)     not null,
    name       varchar(255) not null,
    last_name  varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    created_by char(36)     not null,
    updated_by char(36)     not null,
    constraint contacts_id_unique
        unique (id),
    constraint contacts_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint contacts_id_pole_foreign
        foreign key (id_pole) references poles (id)
            on delete cascade,
    constraint contacts_id_role_foreign
        foreign key (id_role) references roles (id)
            on delete cascade,
    constraint contacts_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table services
(
    id         char(36)     not null,
    name       varchar(255) not null,
    `desc`     text         null,
    created_at timestamp    null,
    updated_at timestamp    null,
    created_by char(36)     not null,
    updated_by char(36)     not null,
    constraint services_id_unique
        unique (id),
    constraint services_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint services_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table benefits_partners_services
(
    id          char(36)  not null,
    id_partners char(36)  not null,
    id_services char(36)  not null,
    created_at  timestamp null,
    updated_at  timestamp null,
    created_by  char(36)  not null,
    updated_by  char(36)  not null,
    constraint benefits_partners_services_id_unique
        unique (id),
    constraint benefits_partners_services_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint benefits_partners_services_id_partners_foreign
        foreign key (id_partners) references partners (id)
            on delete cascade,
    constraint benefits_partners_services_id_services_foreign
        foreign key (id_services) references services (id)
            on delete cascade,
    constraint benefits_partners_services_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table subscriptions_users_navigos
(
    id         char(36)  not null,
    id_user    char(36)  not null,
    id_navigo  char(36)  not null,
    card_id    int       not null,
    created_at timestamp null,
    updated_at timestamp null,
    created_by char(36)  not null,
    updated_by char(36)  not null,
    constraint subscriptions_users_navigos_card_id_unique
        unique (card_id),
    constraint subscriptions_users_navigos_id_navigo_unique
        unique (id_navigo),
    constraint subscriptions_users_navigos_id_unique
        unique (id),
    constraint subscriptions_users_navigos_id_user_unique
        unique (id_user),
    constraint subscriptions_users_navigos_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint subscriptions_users_navigos_id_navigo_foreign
        foreign key (id_navigo) references navigos (id)
            on delete cascade,
    constraint subscriptions_users_navigos_id_user_foreign
        foreign key (id_user) references users (id)
            on delete cascade,
    constraint subscriptions_users_navigos_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table tournaments
(
    id              char(36)     not null,
    name            varchar(255) not null,
    date            date         not null,
    date_end_upload date         not null,
    `desc`          text         null,
    created_at      timestamp    null,
    updated_at      timestamp    null,
    created_by      char(36)     not null,
    updated_by      char(36)     not null,
    constraint tournaments_id_unique
        unique (id),
    constraint tournaments_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint tournaments_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table participations_institutions_tournaments
(
    id             char(36)  not null,
    id_institution char(36)  not null,
    id_tournament  char(36)  not null,
    created_at     timestamp null,
    updated_at     timestamp null,
    created_by     char(36)  not null,
    updated_by     char(36)  not null,
    constraint participations_institutions_tournaments_id_unique
        unique (id),
    constraint participations_institutions_tournaments_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint participations_institutions_tournaments_id_institution_foreign
        foreign key (id_institution) references institutions (id)
            on delete cascade,
    constraint participations_institutions_tournaments_id_tournament_foreign
        foreign key (id_tournament) references tournaments (id)
            on delete cascade,
    constraint participations_institutions_tournaments_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table transports
(
    id           char(36)     not null,
    name         varchar(255) not null,
    path_picture varchar(255) not null,
    created_at   timestamp    null,
    updated_at   timestamp    null,
    created_by   char(36)     not null,
    updated_by   char(36)     not null,
    constraint transports_id_unique
        unique (id),
    constraint transports_path_picture_unique
        unique (path_picture),
    constraint transports_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint transports_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table users_sensitive_data
(
    id                  char(36)     not null,
    id_user             char(36)     not null,
    name                varchar(255) not null,
    last_name           varchar(255) not null,
    date_of_birth       date         not null,
    phone_number        varchar(255) null,
    address             varchar(255) null,
    zip_code            varchar(255) null,
    path_picture        varchar(255) not null,
    id_institution_user char(36)     null,
    created_at          timestamp    null,
    updated_at          timestamp    null,
    created_by          char(36)     not null,
    updated_by          char(36)     not null,
    constraint users_sensitive_data_id_user_unique
        unique (id_user),
    constraint users_sensitive_data_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint users_sensitive_data_id_institution_user_foreign
        foreign key (id_institution_user) references institutions (id)
            on delete set null,
    constraint users_sensitive_data_id_user_foreign
        foreign key (id_user) references users (id)
            on delete cascade,
    constraint users_sensitive_data_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table users_status
(
    id         char(36)     not null,
    type       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    created_by char(36)     not null,
    updated_by char(36)     not null,
    constraint users_status_id_unique
        unique (id),
    constraint users_status_type_unique
        unique (type),
    constraint users_status_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint users_status_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table definitions_users_users_status
(
    id             char(36)  not null,
    id_user        char(36)  not null,
    id_user_status char(36)  not null,
    created_at     timestamp null,
    updated_at     timestamp null,
    created_by     char(36)  not null,
    updated_by     char(36)  not null,
    constraint definitions_users_users_status_id_unique
        unique (id),
    constraint definitions_users_users_status_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint definitions_users_users_status_id_user_foreign
        foreign key (id_user) references users (id)
            on delete cascade,
    constraint definitions_users_users_status_id_user_status_foreign
        foreign key (id_user_status) references users_status (id)
            on delete cascade,
    constraint definitions_users_users_status_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create table videos
(
    id           char(36)     not null,
    title        varchar(255) not null,
    path_youtube varchar(255) not null,
    created_at   timestamp    null,
    updated_at   timestamp    null,
    created_by   char(36)     not null,
    updated_by   char(36)     not null,
    constraint videos_id_unique
        unique (id),
    constraint videos_path_youtube_unique
        unique (path_youtube),
    constraint videos_created_by_foreign
        foreign key (created_by) references users (id)
            on delete cascade,
    constraint videos_updated_by_foreign
        foreign key (updated_by) references users (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;


