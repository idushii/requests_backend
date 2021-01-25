-- convert Laravel migrations to raw SQL scripts --

-- migration:2014_10_12_100000_create_password_resets_table --
create table `password_resets` (
  `email` varchar(255) not null, 
  `token` varchar(255) not null, 
  `created_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `password_resets` 
add 
  index `password_resets_email_index`(`email`);

-- migration:2019_08_19_000000_create_failed_jobs_table --
create table `failed_jobs` (
  `id` bigint unsigned not null auto_increment primary key, 
  `uuid` varchar(255) not null, 
  `connection` text not null, 
  `queue` text not null, 
  `payload` longtext not null, 
  `exception` longtext not null, 
  `failed_at` timestamp default CURRENT_TIMESTAMP not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `failed_jobs` 
add 
  unique `failed_jobs_uuid_unique`(`uuid`);

-- migration:2021_01_22_095542_create_record_requests_table --
create table `record_requests` (
  `id` bigint unsigned not null auto_increment primary key, 
  `session_id` bigint unsigned not null, 
  `status` enum('pending', 'error', 'done') not null default 'pending', 
  `status_code` int not null, 
  `bloc_action_id` bigint unsigned not null, 
  `method` enum('POST', 'GET', 'DELETE', 'PUT') not null default 'POST', 
  `duration` int not null, 
  `params` varchar(255) not null, 
  `payload` varchar(255) not null, 
  `created_at` date not null, 
  `response_at` date not null, 
  `url` varchar(255) not null, 
  `headers_response` varchar(255) not null, 
  `headers` varchar(255) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2021_01_22_095624_create_record_blocs_table --
create table `record_blocs` (
  `id` bigint unsigned not null auto_increment primary key, 
  `name` varchar(255) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2021_01_22_095653_create_record_bloc_actions_table --
create table `record_bloc_actions` (
  `id` bigint unsigned not null auto_increment primary key, 
  `bloc_id` bigint unsigned not null, 
  `name` varchar(255) not null, 
  `payload` varchar(255) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2021_01_22_095719_create_session_records_table --
create table `session_records` (
  `id` bigint unsigned not null auto_increment primary key, 
  `device_id` bigint unsigned not null, 
  `created_at` timestamp null, `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2021_01_22_095753_create_device_records_table --
create table `device_records` (
  `id` bigint unsigned not null auto_increment primary key, 
  `datetime_last_active` date not null, 
  `active_session_id` int not null, 
  `device_name` varchar(255) not null, 
  `device_version` varchar(255) not null, 
  `identifier` varchar(255) not null, 
  `product` varchar(255) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2021_01_22_095827_create_user_favorite_devices_table --
create table `user_favorite_devices` (
  `id` bigint unsigned not null auto_increment primary key, 
  `user_id` bigint unsigned not null, 
  `device_id` bigint unsigned not null, 
  `created_at` date not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2021_01_22_135801_create_record_bloc_events_table --
create table `record_bloc_events` (
  `id` bigint unsigned not null auto_increment primary key, 
  `bloc_id` bigint unsigned not null, 
  `bloc_action_id` bigint unsigned not null, 
  `event_name` varchar(255) not null, 
  `payload` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

-- migration:2021_01_22_140000_create_users_table --
create table `users` (
  `id` bigint unsigned not null auto_increment primary key, 
  `last_request_id` bigint unsigned not null, 
  `login` varchar(255) not null, 
  `email` varchar(255) not null, 
  `token` varchar(255) null, 
  `password` varchar(255) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';
alter table 
  `users` 
add 
  unique `users_login_unique`(`login`);
alter table 
  `users` 
add 
  unique `users_email_unique`(`email`);

-- migration:2021_01_25_022706_references --
alter table 
  `record_requests` 
add 
  constraint `record_requests_session_id_foreign` foreign key (`session_id`) references `session_records` (`id`) on delete cascade;
alter table 
  `record_requests` 
add 
  constraint `record_requests_bloc_action_id_foreign` foreign key (`bloc_action_id`) references `record_bloc_actions` (`id`) on delete cascade;
alter table 
  `record_bloc_actions` 
add 
  constraint `record_bloc_actions_bloc_id_foreign` foreign key (`bloc_id`) references `record_blocs` (`id`) on delete cascade;
alter table 
  `session_records` 
add 
  constraint `session_records_device_id_foreign` foreign key (`device_id`) references `device_records` (`id`) on update cascade;
alter table 
  `user_favorite_devices` 
add 
  constraint `user_favorite_devices_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade;
alter table 
  `user_favorite_devices` 
add 
  constraint `user_favorite_devices_device_id_foreign` foreign key (`device_id`) references `device_records` (`id`) on update cascade;
alter table 
  `record_bloc_events` 
add 
  constraint `record_bloc_events_bloc_id_foreign` foreign key (`bloc_id`) references `record_blocs` (`id`) on update cascade;
alter table 
  `record_bloc_events` 
add 
  constraint `record_bloc_events_bloc_action_id_foreign` foreign key (`bloc_action_id`) references `record_bloc_actions` (`id`) on update cascade;
alter table 
  `users` 
add 
  constraint `users_last_request_id_foreign` foreign key (`last_request_id`) references `record_requests` (`id`) on update cascade;
