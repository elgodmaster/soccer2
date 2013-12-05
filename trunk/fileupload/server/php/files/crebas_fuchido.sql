/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/5/2012 7:11:29 PM                         */
/*==============================================================*/


drop table if exists TBL_CAT_RESULT;

drop table if exists TBL_CAT_ROLE;

drop table if exists TBL_DOCUMENT;

drop table if exists TBL_DOCUMENT_PLAYER;

drop table if exists TBL_DOCUMENT_TEAM;

drop table if exists TBL_MATCH_GAME;

drop table if exists TBL_MATCH_RESULT;

drop table if exists TBL_PLAYER;

drop table if exists TBL_PLAYER_RESULT;

drop table if exists TBL_PLAY_GROUND;

drop table if exists TBL_TEAM;

drop table if exists TBL_TEAM_PLAYER;

drop table if exists TBL_TOURNAMENT;

/*==============================================================*/
/* Table: TBL_CAT_RESULT                                        */
/*==============================================================*/
create table TBL_CAT_RESULT
(
   ID                   int not null,
   NAME                 varchar(50),
   DESCRIPTION          varchar(100),
   ACTIVE               smallint,
   primary key (ID)
);

/*==============================================================*/
/* Table: TBL_CAT_ROLE                                          */
/*==============================================================*/
create table TBL_CAT_ROLE
(
   ID                   int not null,
   NAME                 varchar(50),
   DESCRIPTION          varchar(100),
   ACTIVE               smallint,
   primary key (ID)
);

/*==============================================================*/
/* Table: TBL_DOCUMENT                                          */
/*==============================================================*/
create table TBL_DOCUMENT
(
   ID                   integer not null auto_increment,
   NAME                 varchar(100),
   TYPE_DOCUMENT        smallint,
   DESCRIPTION          varchar(200),
   primary key (ID)
);

/*==============================================================*/
/* Table: TBL_DOCUMENT_PLAYER                                   */
/*==============================================================*/
create table TBL_DOCUMENT_PLAYER
(
   ID_DOCUMENT          integer,
   ID_PLAYER            int,
   PATH                 varchar(300),
   SIZE                 integer,
   NAME                 varchar(100)
);

/*==============================================================*/
/* Table: TBL_DOCUMENT_TEAM                                     */
/*==============================================================*/
create table TBL_DOCUMENT_TEAM
(
   ID_DOCUMENT          integer,
   ID_TEAM              int,
   PATH                 varchar(300),
   SIZE                 integer,
   NAME                 varchar(100)
);

/*==============================================================*/
/* Table: TBL_MATCH_GAME                                        */
/*==============================================================*/
create table TBL_MATCH_GAME
(
   ID                   int not null auto_increment,
   PLAY_GROUND_ID       int,
   VISITOR              int,
   TOURNAMENT_ID        int,
   LOCAL                int,
   SCHEDULE             datetime,
   ACTIVE               smallint,
   primary key (ID)
);

/*==============================================================*/
/* Table: TBL_MATCH_RESULT                                      */
/*==============================================================*/
create table TBL_MATCH_RESULT
(
   RESULT_ID            int not null,
   MATCH_ID             int not null,
   TOTAL_LOCAL          int,
   TOTAL_VISITOR        int,
   COMMENT              varchar(500),
   primary key (RESULT_ID, MATCH_ID)
);

/*==============================================================*/
/* Table: TBL_PLAYER                                            */
/*==============================================================*/
create table TBL_PLAYER
(
   ID                   int not null auto_increment,
   NAME                 varchar(50),
   BIRTH                date,
   PHONE                varchar(50),
   EMAIL                varchar(50),
   ADDRESS              varchar(300),
   FACE_BOOK            varchar(50),
   TWITER               varchar(50),
   GENDER               smallint,
   ACTIVE               smallint,
   primary key (ID)
);

/*==============================================================*/
/* Table: TBL_PLAYER_RESULT                                     */
/*==============================================================*/
create table TBL_PLAYER_RESULT
(
   RESULT_ID            int not null,
   PLAYER_ID            int not null,
   MATCH_ID             int not null,
   TOTAL                int,
   DESCRIPTION          varchar(300),
   primary key (RESULT_ID, PLAYER_ID, MATCH_ID)
);

/*==============================================================*/
/* Table: TBL_PLAY_GROUND                                       */
/*==============================================================*/
create table TBL_PLAY_GROUND
(
   ID                   int not null auto_increment,
   NAME                 varchar(50),
   DESCRIPTION          varchar(100),
   ADDRESS              varchar(100),
   PHONE_NUMBER         varchar(30),
   ACTIVE               smallint,
   MAP_STRING           varchar(500),
   primary key (ID)
);

/*==============================================================*/
/* Table: TBL_TEAM                                              */
/*==============================================================*/
create table TBL_TEAM
(
   ID                   int not null auto_increment,
   NAME                 varchar(50),
   ADDRESS              varchar(100),
   DESCRIPTION          varchar(100),
   EMAIL                varchar(50),
   CREATION_DATE        date,
   ACTIVE               smallint,
   primary key (ID)
);

/*==============================================================*/
/* Table: TBL_TEAM_PLAYER                                       */
/*==============================================================*/
create table TBL_TEAM_PLAYER
(
   PLAYER_ID            int not null,
   TEAM_ID              int not null,
   ROLE_ID              int not null,
   ADD_DATE             date,
   ACTIVE               smallint,
   primary key (PLAYER_ID, TEAM_ID)
);

/*==============================================================*/
/* Table: TBL_TOURNAMENT                                        */
/*==============================================================*/
create table TBL_TOURNAMENT
(
   ID                   int not null auto_increment,
   NAME                 varchar(100),
   DESCRIPTION          varchar(500),
   START_DATE           date,
   END_DATE             date,
   ACTIVE               smallint,
   primary key (ID)
);

alter table TBL_DOCUMENT_PLAYER add constraint FK_REFERENCE_14 foreign key (ID_DOCUMENT)
      references TBL_DOCUMENT (ID) on delete restrict on update restrict;

alter table TBL_DOCUMENT_PLAYER add constraint FK_REFERENCE_15 foreign key (ID_PLAYER)
      references TBL_PLAYER (ID) on delete restrict on update restrict;

alter table TBL_DOCUMENT_TEAM add constraint FK_REFERENCE_16 foreign key (ID_DOCUMENT)
      references TBL_DOCUMENT (ID) on delete restrict on update restrict;

alter table TBL_DOCUMENT_TEAM add constraint FK_REFERENCE_17 foreign key (ID_TEAM)
      references TBL_TEAM (ID) on delete restrict on update restrict;

alter table TBL_MATCH_GAME add constraint FK_REFERENCE_5 foreign key (VISITOR)
      references TBL_TEAM (ID) on delete restrict on update restrict;

alter table TBL_MATCH_GAME add constraint FK_REFERENCE_6 foreign key (TOURNAMENT_ID)
      references TBL_TOURNAMENT (ID) on delete restrict on update restrict;

alter table TBL_MATCH_GAME add constraint FK_REFERENCE_7 foreign key (LOCAL)
      references TBL_TEAM (ID) on delete restrict on update restrict;

alter table TBL_MATCH_GAME add constraint FK_REFERENCE_8 foreign key (PLAY_GROUND_ID)
      references TBL_PLAY_GROUND (ID) on delete restrict on update restrict;

alter table TBL_MATCH_RESULT add constraint FK_REFERENCE_10 foreign key (MATCH_ID)
      references TBL_MATCH_GAME (ID) on delete restrict on update restrict;

alter table TBL_MATCH_RESULT add constraint FK_REFERENCE_9 foreign key (RESULT_ID)
      references TBL_CAT_RESULT (ID) on delete restrict on update restrict;

alter table TBL_PLAYER_RESULT add constraint FK_REFERENCE_11 foreign key (RESULT_ID)
      references TBL_CAT_RESULT (ID) on delete restrict on update restrict;

alter table TBL_PLAYER_RESULT add constraint FK_REFERENCE_12 foreign key (PLAYER_ID)
      references TBL_PLAYER (ID) on delete restrict on update restrict;

alter table TBL_PLAYER_RESULT add constraint FK_REFERENCE_13 foreign key (MATCH_ID)
      references TBL_MATCH_GAME (ID) on delete restrict on update restrict;

alter table TBL_TEAM_PLAYER add constraint FK_REFERENCE_1 foreign key (PLAYER_ID)
      references TBL_PLAYER (ID) on delete restrict on update restrict;

alter table TBL_TEAM_PLAYER add constraint FK_REFERENCE_2 foreign key (TEAM_ID)
      references TBL_TEAM (ID) on delete restrict on update restrict;

alter table TBL_TEAM_PLAYER add constraint FK_REFERENCE_3 foreign key (ROLE_ID)
      references TBL_CAT_ROLE (ID) on delete restrict on update restrict;

