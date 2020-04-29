Create table orders( order_Id Int primary key AUTO_INCREMENT, name VARCHAR(100), quantity int not null,  mid int UNIQUE, price decimal(6, 2) not null, id int not null, foreign key(id) REFERENCES users(id), foreign key(mid) REFERENCES menu(mid) )
