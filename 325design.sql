/*
Darby Lawrence
CS 325 Fall 2017
11/12/17

Modified by: Andy Chan
1/28/2018
*/

drop table What_in_food;
drop table Sale_line_item;
drop table Stock_pricing;
drop table Provider;
drop table Stock;
drop table Sale;
drop table Food;
drop table Beverages;
drop table Menu;
drop table Customer;
drop table Staff;




/*
To keep a record of the staff.
*/

create table Staff 
(empl_id		char(10), 
empl_lname		varchar2(30), 
empl_fname		varchar2(30), 
wage_hr			decimal(6,2),
primary key (empl_id));

/*
To keep a record of customers.
*/

create table Customer 
(cust_id		varchar2(15), 
cust_lname		varchar2(30), 
cust_phone 		varchar(20), 
primary key (cust_id));


/*
To know what is on the menu.
*/

create table Menu 
(menu_item_id		varchar2(10), 
primary key (menu_item_id));


/*
To record what beverages are on the menu and their price per the size of the specific beverage.
*/

create table Beverages 
(bev_id		varchar2(30),
bev_name 	varchar2(30),
bev_size		char(1) check(bev_size in ('S','M','L')), 
bev_price		decimal(6,2), 
menu_item_id		varchar2(10), 
primary key (bev_id),
foreign key (menu_item_id) references menu);


/*
To record the food items on the menu and their pricing.
*/

create table Food 
(food_item		varchar2(30), 
food_price		decimal(6,2), 
menu_item_id		varchar2(10), 
primary key (food_item),
foreign key (menu_item_id) references menu);


/*
To record what sales have been made when, to who and by which staff member.
*/

create table Sale 
(sale_id		varchar2(25), 
cust_id			varchar2(15), 
sale_date		date, 
empl_id			char(10), 
primary key (sale_id),
foreign key (cust_id) references customer,
foreign key (empl_id) references staff);


/*
To record what items are in stock. 
Unit is to tell the unit of the qty_in_stock such as oz. etc.
*/

create table Stock 
(stock_item		varchar2(25), 
qty_in_stock		integer, 
unit			varchar2(25), 
primary key (stock_item));



/*
To record the providers and how to contact them.
*/

create table Provider 
(prov_name		varchar2(25), 
prov_phone		varchar2(15), 
prov_e_mail		varchar2(30), 
primary key (prov_name));



/*
What do each of the stock items cost/what do the providers charge.
*/

create table Stock_pricing 
(stock_item		varchar2(25), 
price_per_unit		decimal(6,2), 
prov_name		varchar2(25), 
primary key (stock_item),
foreign key (stock_item) references stock, 
foreign key (prov_name) references provider);


/*
To record what was being sold in each sale.
*/

create table Sale_line_item 
(sale_id		varchar2(25), 
menu_item_id		varchar2(10), 
qty_item		integer, 
primary key (sale_id, menu_item_id),
foreign key (sale_id) references sale, 
foreign key (menu_item_id) references menu);

/*
To record what are the menu items made from (what is in the food).
*/

create table What_in_food 
(food_item		varchar2(30), 
stock_item		varchar2(25), 
primary key (food_item, stock_item),
foreign key (food_item) references food,
foreign key (stock_item) references stock);

