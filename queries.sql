/* Create the list of categories with current categories */
INSERT INTO categories (name, eng_name) VALUES
    ('Доски и лыжи', 'boards'),
    ('Крепления', 'attachment'),
    ('Ботинки', 'boots'),
    ('Одежда', 'clothing'),
    ('Инструменты', 'tools'),
    ('Разное', 'other');

/* Create the list of users */
INSERT INTO users (email, name, password, contacts) VALUES
    ('keks@gmail.com', 'keks', '12578g', 'https://tlgg.ru/keks'),
    ('catnotdog@yandex.ru', 'your_cat', 'gav057', 'https://tlgg.ru/your_cat'),
    ('kotik@mail.ru', 'kot_ik', '3pv007', 'https://tlgg.ru/kot_ik');

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
