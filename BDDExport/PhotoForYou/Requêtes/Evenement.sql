DELIMITER //

CREATE EVENT mise_a_jour_categorie
ON SCHEDULE EVERY 5 minute
DO
  UPDATE photos
  SET categorie = TRIM(BOTH ',' FROM REPLACE(categorie, ',Les nouveautes', ''))
  WHERE categorie LIKE '%Les nouveautes%'
    AND date_creation <= NOW() - INTERVAL 2 minute;

//

DELIMITER ;
