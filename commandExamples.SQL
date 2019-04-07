INSERT INTO `movies` (`MovieID`, `MovieName`, `MovieYear`) VALUES (NULL, 'Black Panther', '2018');
INSERT INTO `movies` (`MovieID`, `MovieName`, `MovieYear`) VALUES (NULL, 'Avengers End Game', '2019');
DELETE FROM `movies` WHERE MovieName = "Black Panther"
INSERT INTO `movies` (`MovieID`, `MovieName`, `MovieYear`) VALUES (NULL, 'Black Panther', '2018');
INSERT INTO `movies` (`MovieID`, `MovieName`, `MovieYear`) VALUES (NULL, 'Avengers End Game', '2019');
SELECT `MovieID`, `MovieName`, `MovieYear` FROM `movies` WHERE MovieYear=2018
UPDATE `movies` SET `MovieName`='Black Panther is Back',`MovieYear`=2019 WHERE MovieName='Black Panther'