

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

  UPDATE annonce 
SET Title = CASE Title 
                     WHEN 'Modern 2-Bedroom Apa' THEN 'Modern 2-Bedroom Apartment in the Heart of the City'
                     WHEN 'Spacious 3-Bedroom H' THEN 'Spacious 3-Bedroom House with a Private Garden'
                     WHEN 'Luxurious 4-Bedroom ' THEN 'Luxurious 4-Bedroom Villa with a Swimming Pool'
                     WHEN 'Stylish 1-Bedroom Ap' THEN 'Stylish 1-Bedroom Apartment in a Quiet Neighborhood'
                     WHEN 'Cozy 2-Bedroom House' THEN 'Cozy 2-Bedroom House with a Fireplace'
                     WHEN 'Charming 3-Bedroom V' THEN 'Charming 3-Bedroom Villa with Ocean Views'
                     WHEN 'Renovated 2-Bedroom ' THEN 'Renovated 2-Bedroom Apartment with a Balcony'
                     WHEN 'Quaint 1-Bedroom Hou' THEN 'Quaint 1-Bedroom House with a Garden'
                     WHEN 'Spacious 4-Bedroom V' THEN 'Spacious 4-Bedroom Villa with a Terrace'
                     WHEN 'Modern 3-Bedroom Apa' THEN 'Modern 3-Bedroom Apartment with a View of the Park'
                     ELSE Title 
                   END;


  INSERT INTO client (LName, Name, Email, Password, PhoneN) VALUES
  ('Smith', 'John', 'john.smith@example.com', 'password123', '555-1234'),
  ('Doe', 'Jane', 'jane.doe@example.com', 'password456', '555-5678'),
  ('Johnson', 'Mark', 'mark.johnson@example.com', 'password789', '555-2468'),
  ('Williams', 'Jessica', 'jessica.williams@example.com', 'passwordabc', '555-1357'),
  ('Brown', 'Michael', 'michael.brown@example.com', 'passworddef', '555-3690');

  INSERT INTO images (image, is_Principale, id_annonce) VALUES
  ('./img/A1.jpg', TRUE, '1'),
  ('./img/A2.jpg', FALSE, '1'),
  ('./img/A3.jpg', FALSE, '1'),
  ('./img/A4.jpg', FALSE, '1'),
  ('./img/B1.jpg', TRUE, '2'),
  ('./img/B2.jpg', FALSE, '2'),
  ('./img/B3.jpg', FALSE, '2'),
  ('./img/B4.jpg', FALSE, '2'),
  ('./img/C1.jpg', TRUE, '3'),
  ('./img/C2.jpg', FALSE, '3'),
  ('./img/C3.jpg', FALSE, '3'),
  ('./img/C4.jpg', FALSE, '3'),
  ('./img/D1.jpg', TRUE, '4'),
  ('./img/D2.jpg', FALSE, '4'),
  ('./img/D3.jpg', FALSE, '4'),
  ('./img/D4.jpg', FALSE, '4');

INSERT INTO images (image, is_Principale, id_annonce) VALUES 
('./img/E1.jpg', TRUE, '5'),
  ('./img/E2.jpg', FALSE, '5'),
  ('./img/E3.jpg', FALSE, '5'),
  ('./img/E4.jpg', FALSE, '5');
