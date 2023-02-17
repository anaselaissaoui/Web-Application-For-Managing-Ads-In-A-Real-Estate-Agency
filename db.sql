

CREATE DATABASE gestimmo;

USE gestimmo;


CREATE TABLE client (
    id_client  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    LName    VARCHAR(50),
    Name VARCHAR(20),
    Email   VARCHAR(20),
    Password     VARCHAR(20),
    PhoneN  VARCHAR(20)
    
);

CREATE TABLE  Annonce(
    id_annonce  INT NOT NULL  AUTO_INCREMENT,
    Title VARCHAR(20),
    Price  DECIMAL,
    offerDate DATE,
    id_client INT,
    L_M_Date DATE,
    Address VARCHAR(40),
    Category VARCHAR(20),
    offerType VARCHAR(20),
    PRIMARY KEY (id_annonce),
    FOREIGN KEY (id_client) REFERENCES client(id_client)
    
    
);

CREATE TABLE  images(
    id_images INT NOT NULL  AUTO_INCREMENT,
    image VARCHAR(500),
    is_Principale BOOLEAN,
    id_annonce INT,
    PRIMARY KEY (id_images),
  	FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce)
);




INSERT INTO annonce (Title, Surface,City,Address, Price, offerDate, L_M_Date,  Category, offerType) VALUES
('Modern 2-Bedroom Apartment in the Heart of the City', 70,'New York', '123 Main St', 220000, '2023-02-10', '2023-02-10',  'Apartment', 'Sale'),
  ('Spacious 3-Bedroom House with a Private Garden', 150,'Chicago','456 Park Ave', 450000, '2023-02-11', '2023-02-11', 'House', 'Sale'),
  ('Luxurious 4-Bedroom Villa with a Swimming Pool', 300,'San Francisco', '789 Ocean Dr', 1000000, '2023-02-12','2023-02-12', 'Villa', 'Sale'),
  ('Stylish 1-Bedroom Apartment in a Quiet Neighborhood', 50,'Los Angeles','111 Elm St', 150000, '2023-02-13','2023-02-13', 'Apartment', 'Sale'),
  ('Cozy 2-Bedroom House with a Fireplace', 100,'Boston','222 Maple Ave', 300000, '2023-02-14','2023-02-14',  'House', 'Rental'),
  ('Charming 3-Bedroom Villa with Ocean Views', 200,'San Antonio','333 Beach Rd', 800000, '2023-02-15', '2023-02-15',  'Villa', 'Sale'),
  ('Renovated 2-Bedroom Apartment with a Balcony', 60,'New York','444 Cherry Ln', 180000, '2023-02-16','2023-02-16',  'Apartment', 'Rental'),
  ('Quaint 1-Bedroom House with a Garden', 80, 'Houston','555 Pine St', 200000,'2023-02-17','2023-02-17',  'House', 'Sale'),
  ('Spacious 4-Bedroom Villa with a Terrace', 250,'Las Vegas','666 Sunset Blvd', 700000, '2023-02-18','2023-02-18',  'Villa', 'Rental'),
  ('Modern 3-Bedroom Apartment with a View of the Park', 90,'Seattle','777 Forest Ave', 250000, '2023-02-19','2023-02-19',  'Apartment', 'Sale');


  INSERT INTO client (LName, Name, Email, Password, PhoneN) VALUES
  ('Smith', 'John', 'john.smith@example.com', 'password123', '555-1234'),
  ('Doe', 'Jane', 'jane.doe@example.com', 'password456', '555-5678'),
  ('Johnson', 'Mark', 'mark.johnson@example.com', 'password789', '555-2468'),
  ('Williams', 'Jessica', 'jessica.williams@example.com', 'passwordabc', '555-1357'),
  ('Brown', 'Michael', 'michael.brown@example.com', 'passworddef', '555-3690');