Create table orders( order_Id Int primary key AUTO_INCREMENT, name VARCHAR(100), quantity int not null,  mid int, price decimal(6, 2) not null, id int not null, foreign key(id) REFERENCES users(id) ON DELETE CASCADE
       ON UPDATE CASCADE, foreign key(mid) REFERENCES menu(mid) ON DELETE CASCADE
       ON UPDATE CASCADE);
