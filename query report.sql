-- Tampilkan 3 kamar hotel yang paling banyak direservasi 
SELECT 
    r.id AS room_id,
    r.name AS room_name,
    h.name AS hotel_name,
    COUNT(bd.id) AS reservation_count
FROM 
    rooms r
JOIN 
    hotels h ON r.hotels_id = h.id
JOIN 
    booking_details bd ON r.id = bd.rooms_id
GROUP BY 
    r.id, r.name, h.name
ORDER BY 
    reservation_count DESC
LIMIT 3;

-- Pelanggan dengan poin terbanyak
SELECT 
    u.id AS user_id,
    u.name AS user_name,
    SUM(p.points) AS total_points
FROM 
    users u
JOIN 
    points p ON u.id = p.users_id
GROUP BY 
    u.id, u.name
ORDER BY 
    total_points DESC;

-- Pelanggan dengan booking terbanyak
SELECT
    u.id AS user_id,
    u.name AS user_name,
    COUNT(b.id) AS total_bookings
FROM
    users u
JOIN
    bookings b ON u.id = b.users_id
GROUP BY
    u.id, u.name
ORDER BY
    total_bookings DESC;

-- Select Hotel (CITY)
SELECT *
FROM hotels
WHERE citys_id = 1; 

-- Select Hotel (TYPE)
SELECT h.*
FROM hotels h
JOIN hotel_types ht ON h.hotel_types_id = ht.id
WHERE ht.id = 2;

-- Select Room (TYPE)
SELECT *
FROM rooms
WHERE room_types_id = 1;

-- Select Available Room
SELECT r.id AS room_id, r.name AS room_name
FROM rooms r
LEFT JOIN booking_details bd ON r.id = bd.rooms_id
WHERE r.hotels_id = 11
  AND (bd.id IS NULL OR bd.check_out <= NOW())
GROUP BY r.id, r.name;

-- Select hotels with a certain amount of rating from the latest
Select * from (SELECT * FROM laraluxdb.hotel_user_reviews having rating >= 4) table_rating order by table_rating.created_at desc limit 3;