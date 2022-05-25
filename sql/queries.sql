/* Create the table of categories with current categories */
INSERT INTO categories (name, eng_name) VALUES
    ('Доски и лыжи', 'boards'),
    ('Крепления', 'attachment'),
    ('Ботинки', 'boots'),
    ('Одежда', 'clothing'),
    ('Инструменты', 'tools'),
    ('Разное', 'other');

/* Create the table of users */
INSERT INTO users (email, name, password, contacts) VALUES
    ('keks@gmail.com', 'keks', '12578g', 'https://tlgg.ru/keks'),
    ('catnotdog@yandex.ru', 'your_cat', 'gav057', 'https://tlgg.ru/your_cat'),
    ('kotik@mail.ru', 'kot_ik', '3pv007', 'https://tlgg.ru/kot_ik');

/* Create the table of items with current items */
INSERT INTO items (name, description, image, first_price, expiry_date, step_bet, author_id, winner_id, category_id) VALUES
    (
      '2014 Rossignol District Snowboard',
      NULL,
      'img/lot-1.jpg',
      10999,
      '2022-05-22',
      500,
      (SELECT id FROM users WHERE name = 'keks'),
      NULL,
      (SELECT id FROM categories WHERE eng_name = 'boards')
    ),
    (
      'DC Ply Mens 2016/2017 Snowboard',
      NULL,
      'img/lot-2.jpg',
      159999,
      '2022-05-23',
      1500,
      (SELECT id FROM users WHERE name = 'your_cat'),
      NULL,
      (SELECT id FROM categories WHERE eng_name = 'boards')
    ),
    (
      'Крепления Union Contact Pro 2015 года размер L/XL',
      NULL,
      'img/lot-3.jpg',
      8000,
      '2022-05-24',
      500,
      (SELECT id FROM users WHERE name = 'keks'),
      NULL,
      (SELECT id FROM categories WHERE eng_name = 'attachment')
    ),
    (
      'Ботинки для сноуборда DC Mutiny Charocal',
      NULL,
      'img/lot-4.jpg',
      10999,
      '2022-05-25',
      500,
      (SELECT id FROM users WHERE name = 'kot_ik'),
      NULL,
      (SELECT id FROM categories WHERE eng_name = 'boots')
    ),
    (
      'Куртка для сноуборда DC Mutiny Charocal',
      NULL,
      'img/lot-5.jpg',
      7500,
      '2022-05-26',
      500,
      (SELECT id FROM users WHERE name = 'kot_ik'),
      NULL,
      (SELECT id FROM categories WHERE eng_name = 'clothing')
    ),
    (
      'Маска Oakley Canopy',
      NULL,
      'img/lot-6.jpg',
      5400,
      '2022-05-27',
      200,
      (SELECT id FROM users WHERE name = 'your_cat'),
      NULL,
      (SELECT id FROM categories WHERE eng_name = 'other')
    );

/* Create the table of bets */
INSERT INTO bets (price, user_id, item_id) VALUES
    (
      6000,
      (SELECT id FROM users WHERE name = 'kot_ik'),
      (SELECT id FROM items WHERE name = 'Маска Oakley Canopy')
    ),
    (
      5800,
      (SELECT id FROM users WHERE name = 'keks'),
      (SELECT id FROM items WHERE name = 'Маска Oakley Canopy')
    ),
    (
      9000,
      (SELECT id FROM users WHERE name = 'your_cat'),
      (SELECT id FROM items WHERE name = 'Крепления Union Contact Pro 2015 года размер L/XL')
    );

/* Take all categories */
SELECT * FROM categories;

/* Take the newest and opened items */
SELECT i.name, first_price, image, price, c.name FROM items i
    JOIN bets b ON b.item_id = i.id
    JOIN categories c ON i.category_id = c.id
    WHERE expiry_date > CURRENT_TIMESTAMP
    ORDER BY expiry_date DESC;

/* Take items by its ID */
SELECT i.name, description, image, first_price, expiry_date, step_bet, u.name, c.name
    FROM items i
    JOIN users u ON i.user_id = u.id
    JOIN categories c ON i.category_id = c.id
    WHERE i.id = 2;

/* Update item_name by its ID */
UPDATE items SET name = 'Крепления Union Contact Pro 2015 года размер S/M'
    WHERE id = 3;

/* Take the list of bets for the item */
SELECT i.name, price, u.name FROM bets b
    JOIN items i ON b.item_id = i.id
    JOIN users u ON b.user_id = u.id
    WHERE i.id = 6
    ORDER BY b.dt_add ASC;
