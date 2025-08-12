<h1>Database Queries are Here</h1>
<h3>Table Create Queries</h3>
<p>
Create table Trains(
	tr_number int primary key, 
	tr_name varchar(50) not null, 
	tr_catagory varchar (10) not null, 
	offday varchar(10),
	up_down enum ('up', 'down') not null
);
<br>
Create table seats(
    tr_number int not null, 
    AC_Barth int not null,  
    AC_S int not null, 
    Snigdha int not null, 
    S_chair int not null, 
    FOREIGN KEY (tr_number) REFERENCES trains (tr_number)ON DELETE CASCADE ON UPDATE CASCADE,
	primary key(tr_number)
);
<br>
CREATE TABLE all_Station(
	st_id int PRIMARY KEY AUTO_INCREMENT,
	st_name varchar(50) not null
);
<br>
Create Table Stations(
	st_id int not null, 
	tr_number int not null, 
	Arraival_time time not null, 
	departure_time time not null,
      far_AC_Barth int,
      far_AC_S int,
      far_Snigdha int,
      far_S_chair int not null,
	foreign key(tr_number) references trains(tr_number)ON DELETE CASCADE ON UPDATE CASCADE, 
	foreign key(st_id) references all_Station(st_id)ON DELETE CASCADE ON UPDATE CASCADE, 
	primary key(st_id,tr_number) 
);

<br>
Create table Route(
	tr_number int not null, 
	dep_station varchar(50) not null, 
	destination varchar(50) not null, 
	foreign key(tr_number) references Trains(tr_number)ON DELETE CASCADE ON UPDATE CASCADE,
	primary key(tr_number)
);

<br>
Create table Users(
	user_id int primary key, 
	user_name varchar(30) not null, 
	gender enum ('M', 'F'), 
	city varchar(20) not null, 
	phone_number varchar(11) not null, 
	u_password varchar(20) not null
);
<br>
Create table admin(
	user_id int primary key, 
	user_name varchar(30) not null,
    salary int(11) not null,
    jod date not null,
    designation varchar (50) not null,
	gender enum ('M', 'F'), 
	address varchar(300) not null, 
	phone_number varchar(11) not null, 
	u_password varchar(20) not null
);
<br>
Create table Tickets(
	ticket_id int not null AUTO_INCREMENT, 
	user_id int not null, 
	tr_number int not null, 
	seat_type enum ('AC_Barth','AC_S','Snigdha','S_chair') not null, 
	seat_number int not null check (seat_number<5),
	journey_date date not null, 
	Booking_date timestamp not null DEFAULT CURRENT_TIMESTAMP,
      st_st_id int not null,
      end_st_id int not null,
     FOREIGN KEY(st_st_id)REFERENCES all_station(st_id)ON DELETE CASCADE ON UPDATE CASCADE,
     FOREIGN KEY(end_st_id)REFERENCES all_station(st_id)ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (user_id) REFERENCES users(user_id)ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (tr_number) REFERENCES trains(tr_number)ON DELETE CASCADE ON UPDATE CASCADE, 
	PRIMARY KEY(ticket_id,user_id,journey_date)
);
<br>
CREATE TABLE Passenger(
	P_id int NOT null PRIMARY KEY AUTO_INCREMENT, 
	user_id int not null, ticket_id int not null, 
	booking_date date, 
	FOREIGN KEY (user_id) REFERENCES users(user_id) 
	ON DELETE CASCADE ON UPDATE CASCADE, 
	FOREIGN KEY (ticket_id) REFERENCES tickets(ticket_id)
	ON DELETE CASCADE ON UPDATE CASCADE
);

<br>

CREATE TABLE books(
    ticket_id int not null,
    Confirmation ENUM('Confirmed','Not Confirmed'),
    far int not null,
    Booking_date timestamp not null,
    FOREIGN KEY(ticket_id) REFERENCES tickets(ticket_id)ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(ticket_id)
    );
<br>

CREATE TABLE cancel(
    serial int PRIMARY KEY AUTO_INCREMENT,
    user_id int not null,
    ticket_id int UNIQUE,
    cancle_date timestamp DEFAULT CURRENT_TIMESTAMP
    );</p>

<h3>Insert SQL</h3>
<p>
INSERT INTO `trains`(`tr_number`, `tr_name`, `tr_catagory`, `offday`, `up_down`) VALUES 
(101,'Sirajganj Express','Inter City','Friday','up'),
(102,'Sirajganj Express','Inter City','Friday','down'),
(103,'Silk City Express','Inter City','Saturday','up'),
(104,'Silk City Express','Inter City','Saturday','down'),
(105,'Padma Express','Inter City','Sunday','up'),
(106,'Padma Express','Inter City','Sunday','down'),
(110,'Rajshahi Express','Local Mail','n/a','up'),
(111,'Rajshahi Express','Local Mail','n/a','down'),
(201,'Chittagong Express','Local Mail','n/a','up'),
(202,'Chittagong Express','Local Mail','n/a','down'),
(203,'Sonarbangla Express','Inter City','Monday','up'),
(204,'Sonarbangla Express','Inter City','Monday','down'),
(205,'Kalni Express','Inter City','Tuesday','UP'),
(206,'Kalni Express','Inter City','Tuesday','Down'),
(207,'Upaban Express','Inter City','Tuesday','up'),
(208,'Upaban Express','Inter City','Tuesday','down');
<br>
INSERT INTO `seats`(`tr_number`, `AC_Barth`, `AC_S`, `Snigdha`, `S_chair`) VALUES 
(101,100,150,120,500),
(102,100,150,120,500),
(103,150,180,200,800),
(104,150,180,200,800),
(105,90,200,220,900),
(106,90,200,220,900),
(110,0,0,0,1200),
(111,0,0,0,1200),
(201,0,0,0,1200),
(202,0,0,0,1200),
(203,300,500,500,700),
(204,300,500,500,700),
(207,7,15,120,500),
(208,7,15,120,500);
<br>
INSERT INTO `all_station`(`st_id`, `st_name`) VALUES 
(2001,'Dhaka'),
(2002,'Kaoran Bazar'),
(2003,'Dhaka Cantonment'),
(2004,'Gazipur'),
(2005,'Tangail'),
(2006,'BBSE'),
(2007,'BBSW'),
(2008,'SH M Monsur Ali');
INSERT INTO `all_station`(`st_name`) VALUES 
( 'Ullapara'),
( 'Nator'),
( 'Ishwardi'),
( 'Rajshahi'),
( 'Rangpur'),
( 'Dinazpur'),
( 'Valuka'),
( 'Voirob'),
( 'Bug'),
( 'B baria'),
( 'Chittagong'),
( 'Noapara'),
( 'Shaistaganj'),
( 'Bhanugach'),
( 'Sylhet');
<br>

INSERT INTO `stations`(`st_id`, `tr_number`, `Arraival_time`, `departure_time`, `far_AC_Barth`, `far_AC_S`, `far_Snigdha`, `far_S_chair`) VALUES 
(2008,101,'20:00:00','7:00:00',0,0,0,0),
(2007,101,'7:20:00','7:25:00',50,45,40,25),
(2005,101,'8:5:00','8:10:00',250,200,180,100),
(2001,101,'11:10:00','16:00:00',450,380,350,245),
(2001,102,'11:10:00','16:00:00',0,0,0,0),
(2005,102,'17:45:00','17:50:00',250,200,180,100),
(2006,102,'18:15:00','18:35:00',300,245,220,125),
(2008,102,'20:00:00','7:00:00',450,380,350,245),
(2019,203,'18:00:00','10:00:00',0,0,0,0),
(2018,203,'11:30:00','11:35:00',120,110,100,50),
(2003,203,'12:50:00','12:55:00',500,450,400,260),
(2001,203,'13:20:00','14:00:00',500,450,400,260),
(2001,204,'13:20:00','14:00:00',0,0,0,0),
(2003,204,'14:25:00','14:30:00',0,0,0,0),
(2018,204,'15:45:00','15:50:00',480,340,300,210),
(2019,204,'16:20:00','10:00:00',500,450,400,260),

(2023,207,'24:00:00','02:00:00',0,0,0,0),
(2022,207,'02:30:00','02:35:00',100,80,50,25),
(2018,207,'04:30:00','04:35:00',400,360,300,150),
(2015,207,'05:35:00','05:40:00',600,500,400,200),
(2001,207,'07:10:00','19:00:00',800,650,500,250),

(2001,208,'07:10:00','19:00:00',0,0,0,0),
(2015,208,'20:30:00','20:35:00',200,150,100,50),
(2018,208,'21:35:00','21:40:00',400,290,200,100),
(2022,208,'23:35:00','23:40:00',700,570,450,225),
(2023,208,'24:00:00','02:00:00',800,690,500,300);

<br>

INSERT INTO `route`(`tr_number`, `dep_station`, `destination`) VALUES 
(101,'SH M Monsur Ali','Dhaka'),
(102,'Dhaka','SH M Monsur Ali'),
(103,'Rajshahi','Dhaka'),
(104,'Dhaka','Rajshahi'),
(105,'Dinazpur','Dhaka'),
(106,'Dhaka','Dinazpur'),
(110,'Rajshahi','Dhaka'),
(111,'Dhaka','Rajshahi'),
(201,'Chittagong','Dhaka'),
(202,'Dhaka','Chittagong'),
(203,'Chittagong','Dhaka'),
(204,'Dhaka','Chittagong'),
(207,'Syhlet','Dhaka'),
(208,'Dhaka','Sylhet');
<br>
INSERT INTO `user`(`user_id`, `user_name`, `gender`, `city`, `phone_number`, `u_password`) VALUES 
(801,'Tushar Ahmmed','M','Dhaka','01783001045','123456'),
(802,'Delwar Hossen','M','Kustia','01783001415','123456'),
(803,'Badrul Nasim','M','Khulna','01738071041','123645'),
(804,'Rukhsana Parvin','F','Sirajganj','01961281944','369258'),
(805,'Sabiha Falak','F','Sirajganj','01911194086','147852');
<br>


INSERT INTO `tickets`( `user_id`, `tr_number`, `seat_type`, `seat_number`, `journey_date`, `age`, `st_st_id`, `end_st_id`) VALUES 
(801,101,'AC_Barth',4,'2022-04-28',24,2008,2001),
(803,204,'Snigdha',3,'2022-04-25',23,2003,2019);
<br>
INSERT INTO `tickets`( `user_id`, `tr_number`, `seat_type`, `seat_number`, `journey_date`, `age`, `st_st_id`, `end_st_id`) VALUES 
(801,101,'AC_Barth',4,'2022-04-28',24,2008,2001),
(803,204,'Snigdha',3,'2022-04-25',23,2003,2019),
(805,207,'AC_Barth',4,'2022-05-25',19,2023,2001),
(802,207,'AC_Barth',4,'2022-05-25',23,2023,2001);
  
</p>
<h3>Queries</h3>
<p>
>>>>>>>>>>>>>>>>>>>>>>>>>    The station where atleast one train has a stopage	 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
SELECT distinct all_station.st_name FROM all_station 
INNER JOIN stations ON all_station.st_id = stations.st_id;

>>>>>>>>>>>>>>>>>> tarain  station details <<<<<<<<<<<<<<<<<<

SELECT trains.tr_name, trains.up_down, all_station.st_name, stations.Arraival_time, stations.departure_time FROM trains INNER JOIN
stations ON trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id ORDER BY stations.departure_time;

>>>>>>>>>>>>>>>>>>>> a specific train stops which stations<<<<<<<<<<<<<<<<<<<<<<<<

SELECT all_station.st_name FROM all_station WHERE all_station.st_id in
(SELECT stations.st_id FROM stations WHERE stations.tr_number = 207);

>>>>>>>>>>>>>>>>>>>>>>>>>>>>> nirdisto  Train kothay thame ar kokhon thame <<<<<<<<<<<<<<<<<

SELECT trains.tr_name, trains.up_down, all_station.st_name, stations.Arraival_time, stations.departure_time FROM trains INNER JOIN
stations ON trains.tr_number = stations.tr_number and trains.tr_number = 207
INNER JOIN all_station ON stations.st_id = all_station.st_id ORDER BY stations.departure_time;


SELECT trains.tr_name, all_station.st_name, stations.Arraival_time, stations.departure_time FROM trains INNER JOIN
stations ON trains.tr_number = stations.tr_number INNER JOIN all_station ON stations.st_id = all_station.st_id;

>>>>> The stations arraival time, departure_time where a up and down train stops <<<<<<<<

SELECT trains.tr_name, trains.up_down, all_station.st_name, stations.Arraival_time, stations.departure_time FROM trains 
INNER JOIN
stations ON trains.tr_number = stations.tr_number INNER JOIN all_station ON stations.st_id = all_station.st_id 
ORDER BY stations.departure_time;

>>>>> The stations arraival time, departure_time where a down train stops <<<<<<<<

SELECT trains.tr_name, trains.up_down, all_station.st_name, stations.Arraival_time, stations.departure_time FROM trains 
INNER JOIN stations ON trains.up_down = 'down' AND trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id ORDER BY stations.Arraival_time;

>>>>> The stations arraival time, departure_time where Sonarbangla down Train stops <<<<<<<<

SELECT trains.tr_name, trains.up_down, all_station.st_name, stations.Arraival_time, stations.departure_time FROM trains 
INNER JOIN stations ON trains.up_down = 'down' AND trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sonarbangla Express' 
ORDER BY stations.Arraival_time;

>>>>>>> Where sirajganj Express Up train stops but down train dose not stop <<<<<<<<< 

(SELECT all_station.st_name FROM trains 
INNER JOIN stations ON trains.up_down = 'up' AND trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sirajganj Express')
except
(SELECT all_station.st_name FROM trains 
INNER JOIN stations ON trains.up_down = 'down' AND trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sirajganj Express');

>>>>>>> Where sirajganj Express down train stops but up train dose not stop <<<<<<<<< 

(SELECT all_station.st_name FROM trains 
INNER JOIN stations ON trains.up_down = 'down' AND trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sirajganj Express')
except
(SELECT all_station.st_name FROM trains 
INNER JOIN stations ON trains.up_down = 'up' AND trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sirajganj Express');

>>>>>>> Where sirajganj Express and Sonarbangla Express stops <<<<<<<<< 

(SELECT DISTINCT all_station.st_name FROM trains 
INNER JOIN stations ON trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sonarbangla Express')
UNION
(SELECT DISTINCT all_station.st_name FROM trains 
INNER JOIN stations ON trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sirajganj Express');

>>>>>>> Where both sirajganj Express and Sonarbangla Express stops <<<<<<<<< 

(SELECT DISTINCT all_station.st_name FROM trains 
INNER JOIN stations ON trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sonarbangla Express')
intersect
(SELECT DISTINCT all_station.st_name FROM trains 
INNER JOIN stations ON trains.tr_number = stations.tr_number 
INNER JOIN all_station ON stations.st_id = all_station.st_id AND trains.tr_name = 'Sirajganj Express');

>>>>>>> All train's starting and ending stations <<<<<<<<< 

SELECT trains.tr_name, trains.up_down, route.dep_station AS Startings, route.destination AS Ending FROM trains,route 
WHERE trains.tr_number = route.tr_number;

>>>>>>> All train's AC, snigdha, schair, ac_bath seats <<<<<<<<<

SELECT DISTINCT trains.tr_name, seats.AC_Barth, seats.Singdha,seats.AC_S,seats.S_chair FROM trains 
INNER JOIN seats ON trains.tr_number = seats.tr_number;

>>>>>>> All train's are active today <<<<<<<<<

SELECT DISTINCT trains.tr_name, trains.offday FROM trains WHERE trains.offday != 'saturday';

>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> remaininng seats and off day for each trains <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT DISTINCT trains.tr_name,seats.AC_S,seats.AC_Barth,seats.Snigdha,seats.S_chair, trains.offday FROM trains,seats 
WHERE (trains.tr_number = seats.tr_number) AND (trains.offday != 'saturday') ;

>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Trains rout <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT trains.tr_name, trains.up_down, route.dep_station,route.destination FROM trains 
INNER JOIN route ON trains.tr_number = route.tr_number;

>>>>>>>>>>>>>>>>>>>>>>> People requested to buy tickets <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT user.user_name, user.gender,user.phone_number,tickets.journey_date,tickets.Booking_date FROM user,tickets WHERE user.user_id = tickets.user_id;

>>>>>>>>>>>>>>>>>>>>>>>> User details who canled tickets <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT * FROM user WHERE user.user_id IN (SELECT tickets.user_id FROM tickets WHERE tickets.ticket_id IN (SELECT cancel.ticket_id FROM cancel))


SELECT DISTINCT user.*, cancel.cancle_date FROM user,cancel WHERE user.user_id = cancel.user_id AND user.user_id IN 
(SELECT cancel.user_id FROM cancel);

>>>>>>>>>>>>>>>>>>>>>>>>Details for cancled ticket<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT DISTINCT user.*, cancel.cancle_date,tickets.seat_number,tickets.seat_type,tickets.journey_date,tickets.Booking_date 
FROM user,cancel,tickets WHERE (user.user_id = cancel.user_id AND user.user_id = tickets.user_id) AND user.user_id IN 
(SELECT cancel.user_id FROM cancel);

>>>>>>>>>>>>>>>>>>>>>>>>Details for cancled ticket with trains details <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT DISTINCT user.*, trains.tr_name, cancel.cancle_date,tickets.seat_number,tickets.seat_type,tickets.journey_date,tickets.Booking_date 
FROM user,cancel,tickets,trains
WHERE (tickets.tr_number = trains.tr_number) AND (user.user_id = cancel.user_id AND user.user_id = tickets.user_id) AND user.user_id IN 
(SELECT cancel.user_id FROM cancel);

>>>>>>>>>>>>>>>>>>>>>>>>>>>>> All the trains active all 6 days except friday.<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT trains.tr_name FROM trains WHERE trains.tr_name LIKE '%d%';
SELECT * FROM user where user.age > (SELECT AVG(user.age) FROM user);
SELECT COUNT(trains.tr_number) AS Total_Trains_Today FROM trains WHERE trains.offday != 'Friday';



>>>>>>>>>>>>>>>>>>>ticket price destination station and train then starting station and train<<<<<<<<<<<<<<<<<<<<<<<<

select
(SELECT stations.far_AC_S FROM stations WHERE stations.st_id = 2001 AND stations.tr_number = 101)
-
(SELECT stations.far_AC_S FROM stations WHERE stations.st_id = 2005 AND stations.tr_number = 101) as Ticket_Price;

>>>>>>>>>>>>>>>>>>>>>>>>> kon train a koto gulo seat ache<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

SELECT seats.tr_number, (seats.AC_S+seats.AC_Barth+seats.Snigdha+seats.S_chair) as total_seats FROM seats;




  
</p>
