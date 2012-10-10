-- create company table
CREATE TABLE crowels.company (
	ticker varchar(25) NOT NULL,
	company_name varchar(25),
	street varchar(100),
	city varchar(25),
	state varchar(25),
	zip varchar(25),
	country varchar(25) NOT NULL,
	PRIMARY KEY (ticker)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- create transaction table
CREATE TABLE crowels.transactions (
	ticker varchar(25) NOT NULL,
	date date DEFAULT 0000-00-00 NOT NULL,
	open decimal(10),
	high decimal(25),
	low decimal(25),
	close decimal(10),
	volume int(10),
	PRIMARY KEY (ticker,date)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE crowels.transactions
	ADD FOREIGN KEY (ticker) 
	REFERENCES company (TICKER);

<<<<<<< HEAD
-- for MySQL the default value of 'date' may cause error, try '1000-01-01' instead of '0000-00-00' or just delete the 'DEFAULT 0000-00-00'.
=======
-- create searches table

CREATE TABLE `searches` (
  `query` varchar(25) NOT NULL,
  `date_performed` date NOT NULL,
  `username` varchar(25) NOT NULL,
  `results` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`query`,`date_performed`,`username`),
  KEY `username` (`username`),
  CONSTRAINT `searches_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

-- create users table (MD5 hash)
CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `register_date` date NOT NULL,
  `login_date` date DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `passwd` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1



>>>>>>> Updated with additional tables for users and search history
