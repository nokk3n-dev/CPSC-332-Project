create database if not exists aem;

use aem;

drop table if exists user;

-- User Table
CREATE TABLE user (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Fname VARCHAR(50),
    Lname VARCHAR(50),
    Email VARCHAR(100) UNIQUE,
    Password VARCHAR(255) UNIQUE,
    PhoneNumber VARCHAR(20)
);

drop table if exists University;

-- University Table
CREATE TABLE University (
    UniversityID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100)
);

drop table if exists Venue;

-- Venue Table
CREATE TABLE Venue (
    VenueID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    ZipCode VARCHAR(20),
    City VARCHAR(100),
    Address VARCHAR(255),
    UniversityID INT,
    FOREIGN KEY (UniversityID) REFERENCES University(UniversityID)
);

drop table if exists event;

-- Event Table
CREATE TABLE event (
    EventID INT AUTO_INCREMENT PRIMARY KEY,
    StartTime TIME,
    EndTime TIME,
    StartDate DATE,
    EndDate DATE,
    Description TEXT,
    Status ENUM('Published', 'Unpublished'),
    SubmissionDeadline DATE,
    Name VARCHAR(100),
    MaxCapacity INT,
    VenueID INT,
    UniversityID INT,
    Address VARCHAR(255),
    City VARCHAR(100),
    State VARCHAR(100),
    ZipCode VARCHAR(20),
    FOREIGN KEY (VenueID) REFERENCES Venue(VenueID),
    FOREIGN KEY (UniversityID) REFERENCES University(UniversityID)
);

drop table if exists presenter;

-- Presenter Table
CREATE TABLE presenter (
    PresenterID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    Affiliation VARCHAR(100),
    PresenterName VARCHAR(100),
    FOREIGN KEY (UserID) REFERENCES user(UserID)
);

drop table if exists EventPresenter;

-- EventPresenter Table (Many-to-Many Relationship between Event and Presenter)
CREATE TABLE EventPresenter (
    EventID INT,
    PresenterID INT,
    PRIMARY KEY (EventID, PresenterID),
    FOREIGN KEY (EventID) REFERENCES event(EventID),
    FOREIGN KEY (PresenterID) REFERENCES presenter(PresenterID)
);

drop table if exists sponsor;

-- Sponsor Table
CREATE TABLE sponsor (
    SponsorID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    Name VARCHAR(100),
    Level VARCHAR(50),
    FOREIGN KEY (UserID) REFERENCES user(UserID)
);

drop table if exists EventSponsor;

-- EventSponsor Table (Many-to-Many Relationship between Event and Sponsor)
CREATE TABLE EventSponsor (
    EventID INT,
    SponsorID INT,
    PRIMARY KEY (EventID, SponsorID),
    FOREIGN KEY (EventID) REFERENCES event(EventID),
    FOREIGN KEY (SponsorID) REFERENCES sponsor(SponsorID)
);

drop table if exists KeynoteSpeaker;

-- KeynoteSpeaker Table
CREATE TABLE KeynoteSpeaker (
    SpeakerID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    Name VARCHAR(100),
    Affiliation VARCHAR(100),
    FOREIGN KEY (UserID) REFERENCES user(UserID)
);

drop table if exists EventKeynoteSpeaker;

-- EventKeynoteSpeaker Table (Many-to-Many Relationship between Event and KeynoteSpeaker)
CREATE TABLE EventKeynoteSpeaker (
    EventID INT,
    SpeakerID INT,
    PRIMARY KEY (EventID, SpeakerID),
    FOREIGN KEY (EventID) REFERENCES event(EventID),
    FOREIGN KEY (SpeakerID) REFERENCES KeynoteSpeaker(SpeakerID)
);

INSERT INTO user (Fname, Lname, Email, Password, PhoneNumber) 
VALUES ('admin', '', 'admin@example.com', 'flanksteak', '123456789');

INSERT INTO University (UniversityID, Name) VALUES ('0001', 'University of Southern California');

INSERT INTO Venue (VenueID, Name, ZipCode, City, Address, UniversityID) 
VALUES ('0001', 'USC Football Stadium', '90089', 'Los Angeles', '123 Main Street', '0001');