create database dentaldb;
Show databases;
use dentaldb;
Show tables;


-- patient table --
create table patient(
ppsn int(6) unsigned auto_increment,
fname varchar(10) NOT NULL,
surname varchar(10) NOT NULL,
dob date NOT NULL,
phonenum int NOT NULL,
address varchar(30) NOT NULL,
dentXray LONGBLOB DEFAULT NULL,
dentXray_Path varchar(20) DEFAULT NULL,
treatment varchar(20) NOT NULL,
PRIMARY KEY (ppsn),
FOREIGN KEY (treatment) references appointment(treatment));


Insert into patient values 
(001, 'Mike', 'Kol', '1988-03-02', 882561748, 'Ennis, Clare', load_file('c:/Patients/xray_1.jpg'), '/xray_1.jpg', "Wisdom, Teeth"), 
(002, 'Larry', 'Stevie', '1989-06-12', 875934678, 'Miltown, Clare', load_file('c:/Patients/xray_2.jpg'), '/xray_2.jpg', "Whitening"), 
(003, 'Stan', 'ONeil', '1998-01-13', 159756325, 'Ballybane, Galway', load_file('c:/Patients/xray_3.jpg'), '/xray_3.jpg', "CheckUp"),
(004, 'Joe', 'Col', '2000-02-02', 167895216, 'Blanchardstown, Dublin', load_file('c:/Patients/xray_4.jpg'), '/xray_4.jpg', "Whitening"), 
(005, 'Hillary', 'Fitz', '1998-01-01', 873233234, 'Neenagh, Tipperary', load_file('c:/Patients/xray_5.jpg'), '/xray_5.jpg', "Check up ");


create table appointment (
ppsn Int(6) unsigned auto_increment,
time datetime NOT NULL,
treatment varchar(45) NOT NULL,
owesmoney varchar(45) NOT NULL,
followup varchar(45) NOT NULL,
PRIMARY KEY (treatment),
FOREIGN KEY (ppsn) references patient(ppsn)
);

Insert into appointment values
(001, '2021-06-01 09:00:00', 'Wisdom tooth', 'No', 'Yes'),
(002, '2021-03-02 10:00:00', 'Whitening', 'Yes', 'No'),
(003, '2021-05-03 11:00:00', 'CheckUp', 'No', 'Yes'),
(004, '2022-02-02 12:00:00', 'Clean', 'Yes', 'No'),
(005, '2022-01-03 13:00:00', 'RootCanal', 'No', 'Yes');

create table payment (
ppsn Int(6) unsigned auto_increment,
cost int NOT NULL,
method varchar(15) NOT NULL,
PRIMARY KEY (method),
FOREIGN KEY (ppsn) references patient(ppsn),
FOREIGN KEY (cost) references bill(cost)
);

Insert into payment values
(001, '120.00', 'Cheque'),
(002, '110.00', 'Card'),
(003, '95.00', 'Cash'),
(004, '110.00', 'Transfer'),
(005, '90.00', 'BillPay');

create table bill (
ppsn Int(6) unsigned auto_increment,
cost int NOT NULL,
treatment varchar(45) NOT NULL,
phoneno int NOT NULL,
PRIMARY KEY (cost),
FOREIGN KEY (ppsn) references patient(ppsn),
FOREIGN KEY (treatment) references appointment(treatment)
);

Insert into bill values
(001, '120.00', 'Wisdom tooth', 882561748),
(002, '110.00', 'Whitening', 875934678),
(003, '95.00', 'CheckUp', 159756325),
(004, '112.00', 'Clean', 167895216),
(005, '90.00', 'RootCanal', 873233234);

create table specialist (
name varchar(45) NOT NULL,
ppsn Int(6) unsigned auto_increment,
treatment varchar(45) NOT NULL,
PRIMARY KEY (name),
FOREIGN KEY (ppsn) references patient(ppsn),
FOREIGN KEY (treatment) references appointment(treatment)
);

Insert into specialist values
('Dr. Barry', 001, 'Wisdom tooth'),
('Dr. Moynihan', 003, 'Wisdom tooth'),
('Dr. Bret', 005, 'RootCanal');

create table treatment (
ppsn Int(6) unsigned auto_increment,
dentalreport varchar(45) NOT NULL,
PRIMARY KEY (dentalreport),
FOREIGN KEY (ppsn) references patient(ppsn)
);

Insert into treatment values
(001, 'Wisdom tooth to be pulled'),
(003, 'Wisdom tooth to be extracted'),
(005, 'Rootcanal');

