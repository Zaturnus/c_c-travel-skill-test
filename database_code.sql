CREATE TABLE `c_c-sports-club`.`members` (
  `member_id` INT NOT NULL AUTO_INCREMENT,
  `given_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NOT NULL,
  `phone_num1` VARCHAR(45) NOT NULL,
  `phone_num2` VARCHAR(45) NULL DEFAULT 'N/A',
  `phone_num3` VARCHAR(45) NULL DEFAULT 'N/A',
  `email_address1` VARCHAR(45) NOT NULL,
  `email_address2` VARCHAR(45) NULL DEFAULT 'N/A',
  `email_address3` VARCHAR(45) NULL DEFAULT 'N/A',
  `membership_categ` INT NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `date_joined` DATE GENERATED ALWAYS AS (CURRENT_DATE) VIRTUAL,
  PRIMARY KEY (`member_id`));

CREATE TABLE `test`.`roster` (
  `member_id` INT NOT NULL,
  `year` DATE GENERATED ALWAYS AS (CURRENT_DATE) VIRTUAL,
  `member_paid_amnt` INT NOT NULL,
  `member_paid_date` DATE NOT NULL,
  PRIMARY KEY (`member_id`));

INSERT INTO roster(
   `member_id`,
   `year`,
   `member_paid_amnt`,
   `member_paid_date`
)
VALUES(
    '1',
    '2023',
    '200',
    '2023-06-23'
);

INSERT INTO members(
    `given_name`,
    `last_name`,
    `birth_date`,
    `phone_num1`,
    `phone_num2`,
    `phone_num3`,
    `email_address1`,
    `email_address2`,
    `email_address3`,
    `membership_categ`,
    `address`
)
VALUES(
    'first',
    'last',
    '2000-01-01',
    '09999999999',
    '09999999999',
    '09999999999',
    'a@email.com',
    'b@email.com',
    'c@email.com',
    'membership_categ',
    'address'
)

DELETE FROM members WHERE member_id='';
DELETE FROM roster WHERE member_id='';

UPDATE members
SET 
    `given_name` = '',
    `last_name` = '',
    `birth_date` = '',
    `phone_num1` = '',
    `phone_num2` = '',
    `phone_num3` = '',
    `email_address1` = '',
    `email_address2` = '',
    `email_address3` = '',
    `membership_categ` = '',
    `address` = ''
WHERE member_id = '';

SELECT 
members.member_id,
members.given_name,
members.last_name,
roster.member_paid_amnt,
roster.member_paid_date,
YEAR(roster.year) as year
FROM members LEFT JOIN roster 
ON members.member_id=roster.member_id