create database Moodle;

use Moodle;

create table message(
course varchar(6),
prof_id int(11),
message varchar(1000),
message_time varchar(100),
mess_time int(32),

);

create table profs( 
prof_id int(11) primary key not null,
prof_psswd varchar(32) not null,
name varchar(100) not null,
course varchar(6),
course_addtime varchar(100),

);

create table studs( 
stud_id int(11) not null,
stud_psswd varchar(32) not null,
name varchar(32) not null,
course_picked varchar(6),
time_picked varchar(100),
course_removed tinyint(1),
time_removed varchar(100),
curs_time int(32),
);

