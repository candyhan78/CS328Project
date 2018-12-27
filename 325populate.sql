spool 325result-contents.txt

delete from What_in_food;
delete from Sale_line_item;
delete from Stock_pricing;
delete from Provider;
delete from Stock;
delete from Sale;
delete from Food;
delete from Beverages;
delete from Menu;
delete from Customer;
delete from Staff;

/*
Staff (EMPL_ID, empl_lname, empl_fname, wage_hr)
-------------------------------------------------------------
*/

prompt staff

insert into staff
values
('1234567891', 'Smith', 'Joe', 12.50 
);
 
insert into staff
values
('1234563892', 'Doe', 'John', 12.60 
);

insert into staff
values
('1234567713', 'Johnson', 'Harry', 12.40 
);

insert into staff
values
('1224567864', 'Conner', 'Jane', 12.30 
);

insert into staff
values
('1254567595', 'Harper', 'Sam', 12.20 
);

insert into staff
values
('1234565556', 'Williams', 'Sarah', 12.35 
);

insert into staff
values
('1774567877', 'Davis', 'Lilly', 12.46 
);

insert into staff
values
('1834887898', 'Miller', 'Fanny', 12.57
);

insert into staff
values
('9244567899', 'Wilson', 'Tom', 12.77 
);

insert into staff
values
('1234561111', 'Brown', 'Karen', 12.11 
);

/*
Customer (CUST_ID, cust_lname, cust_phone, primary key (cust_id)
-------------------------------------------------------------
*/

prompt customer

insert into customer
values
('54321','Miller','(916)823-5555'
);

insert into customer
values
('544232','Stevenson','(916)844-5222'
);

insert into customer
values
('34323','Allen','(915)733-4433'
);

insert into customer
values
('212324','Wood','(316)777-6719'
);

insert into customer
values
('943575','Scott','(615)223-7891'
);

insert into customer
values
('894366','Evans','(530)889-8967'
);

insert into customer
values
('6474397','Green','(916)743-3492'
);

insert into customer
values
('67088','Carter','(716)345-9087'
);

insert into customer
values
('329879','Hamilton','(615)419-5725'
);

insert into customer
values
('2454320','Gray','(916)675-2355'
);

/*
Menu (MENU_ITEM_ID)
-------------------------------------------------------------
*/

prompt menu

insert into menu
values
('1');

insert into menu
values
('2');

insert into menu
values
('3');

insert into menu
values
('4');

insert into menu
values
('5');

insert into menu
values
('6');

insert into menu
values
('7');

insert into menu
values
('8');

insert into menu
values
('9');

insert into menu
values
('10');

insert into menu
values
('11');

insert into menu
values
('12');

insert into menu
values
('13');

insert into menu
values
('14');

insert into menu
values
('15');

insert into menu
values
('16');

insert into menu
values
('17');

insert into menu
values
('18');

insert into menu
values
('19');

insert into menu
values
('20');

/*
Beverages (bev_id, bev_name, bev_size, bev_price, menu_item_id)
        foreign key menu_item_id references menu
-------------------------------------------------------------
*/

prompt beverages

insert into beverages
values
('004567','Los Angeles','S',2.99, '1'
);

insert into beverages
values
('004568','Los Angeles','M',3.50, '2'
);

insert into beverages
values
('005569','Los Angeles','L',4.00, '3'
);

insert into beverages
values
('0063739','Tahoe','S',3.10, '4'
);

insert into beverages
values
('0063234','Tahoe','M',3.90, '5'
);

insert into beverages
values
('0063235','Tahoe','L',4.50, '6'
);

insert into beverages
values
('007851','Montana','S',3.00, '7'
);

insert into beverages
values
('007852','Montana','M',3.75, '8'
);

insert into beverages
values
('007853','Montana','S',4.15, '9'
);

insert into beverages
values
('007844','Fiji','S', 6.00, '10'
);

/*
Food (FOOD_ITEM, food_price, menu_item_id)
        foreign key menu_item_id references menu
-------------------------------------------------------------
*/

prompt food

insert into food
values
('Kale Salad', 7.00 , '11'
);

insert into food
values
('Kale Wrap', 8.00 , '12'
);

insert into food
values
('Grilled Kale', 7.50 , '13'
);

insert into food
values
('Kale Soup',6.80 , '14'
);

insert into food
values
('Kale Taco', 5.00 , '15'
);

insert into food
values
('Kale Frittata', 7.30 , '16'
);

insert into food
values
('Kale Chips', 6.75 , '17'
);

insert into food
values
('Kale Ravioli', 7.10 , '18'
);

insert into food
values
('Stir-Fried Kale', 6.45 , '19'
);

insert into food
values
('Chocolate-Dipped Kale', 7.45 , '20'
);

/*
Sale (SALE_ID, cust_id, sale_date, empl_id)
-------------------------------------------------------------
*/

prompt sale

insert into sale
values
('223451','54321','15-Jan-17','1234567891' 
);

insert into sale
values
('223452','544232','07-Feb-17', '1774567877'
);

insert into sale
values
('223453','34323','18-Mar-17', '9244567899'
);

insert into sale
values
('223454', '212324','24-Mar-17', '1224567864'
);

insert into sale
values
('223455', '943575','27-Mar-17', '1224567864'
);

insert into sale
values
('223456', '894366','02-Jun-17', '1234567891'
);

insert into sale
values
('223464', '212324','27-Jun-17', '9244567899'
);


insert into sale
values
('223457', '6474397','16-Jul-17', '1234561111'
);

insert into sale
values
('223458','67088','04-Aug-17', '1774567877'
);

insert into sale
values
('223462','544232','07-Aug-17', '1234561111'
);

insert into sale
values
('223459', '329879','30-Oct-17', '1234561111'
);

insert into sale
values
('223450', '2454320','21-Nov-17', '1234567891'
);


/*
Sale_line_item (SALE_ID, MENU_ITEM_ID, qty_item)
        foreign key sale_id references sale,
        foreign key menue_item references food
-------------------------------------------------------------
*/

prompt sale_line_item

insert into sale_line_item
values
('223451', '1', 2
);

insert into sale_line_item
values
('223451', '19', 2
);
 
insert into sale_line_item
values
('223452', '12', 5
);

insert into sale_line_item
values
('223452', '7', 7
);

insert into sale_line_item
values
('223452', '20', 11
);

insert into sale_line_item
values
('223453', '8', 1
);

insert into sale_line_item
values
('223453', '6', 2
);

insert into sale_line_item
values
('223453', '10', 5
);

insert into sale_line_item
values
('223454', '15', 1
);

insert into sale_line_item
values
('223455', '3', 6
);

insert into sale_line_item
values
('223455', '19', 7
);

insert into sale_line_item
values
('223456', '17', 3
);

insert into sale_line_item
values
('223464', '13', 4
);

insert into sale_line_item
values
('223464', '9', 7
);

insert into sale_line_item
values
('223457', '2', 1
);

insert into sale_line_item
values
('223458', '10', 6
);

insert into sale_line_item
values
('223458', '14', 2
);

insert into sale_line_item
values
('223462', '5', 1
);

insert into sale_line_item
values
('223462', '7', 1
);

insert into sale_line_item
values
('223459', '16', 12
);

insert into sale_line_item
values
('223459', '2', 12
);

insert into sale_line_item
values
('223450', '9', 3
);

/*
Stock (STOCK_ITEM, qty_in_stock, unit)
-------------------------------------------------------------
*/

prompt stock

insert into stock
values
('Kale', 400, 'Heads'
);

insert into stock
values
('Oil', 60 ,'Gal.'
);

insert into stock
values
('Rice', 70 ,'Lbs.'
);

insert into stock
values
('Egg', 40 ,'Cartons (12 per)'
);

insert into stock
values
('Taco Shell', 70 ,'Shells'
);

insert into stock
values
('Flour', 45 ,'Lbs.'
);

insert into stock
values
('Chocolate', 99 ,'Lbs.'
);

insert into stock
values
('Vegetable Stock', 60 ,'Gal.'
);

insert into stock
values
('Salt', 20 ,'Lbs.'
);

insert into stock
values
('Tomato', 35 ,'Ind.'
);

insert into stock
values
('Black Beans',45 ,'Lbs.'
);

insert into stock
values
('Los Angeles', 80 ,'Gal.'
);

insert into stock
values
('Tahoe', 145 ,'Gal.'
);

insert into stock
values
('Montana', 200 ,'Gal.'
);

insert into stock
values
('Fiji', 88 ,'Gal.'
);

/*
Provider (PROV_NAME, prov_phone, prov_e_mail)
-------------------------------------------------------------
*/
prompt provider

insert into provider
values
('North American Water','(615)983-0550','naw@ymailmail.com'
);

insert into provider
values
('Fiji Water Co.','(715)624-8844','fijiwater@gmail.com'
);

insert into provider
values
('Shady Tom','(436)523-2949','stgrower@hotmail.com'
);

insert into provider
values
('Crisco Foods','(315)788-4244','criscorep@gmail.com'
);

insert into provider
values
('General Mills','(789)368-2341','gmsource@gmail.com'
);

insert into provider
values
('Salt of the Earth','(945)887-2991','salty@gmail.com'
);

insert into provider
values
('Hershey','(410)679-2561','hershey@gmail.com'
);

/*
Stock_pricing (STOCK_ITEM, price_per_unit, prov_name)
        foreign key stock_item references stock,
        foreign key prov_name references provider
-------------------------------------------------------------
*/
prompt stock_pricing


insert into stock_pricing
values
('Kale', 20.00 , 'Shady Tom'
);

insert into stock_pricing
values
('Oil', 13.00 ,'Crisco Foods'
);

insert into stock_pricing
values
('Rice', 8.00 ,'General Mills'
);

insert into stock_pricing
values
('Egg', 5.00 ,'Crisco Foods'
);

insert into stock_pricing
values
('Taco Shell', 2.00 ,'General Mills'
);

insert into stock_pricing
values
('Flour', 4.00 ,'General Mills'
);

insert into stock_pricing
values
('Chocolate', 3.50 ,'Hershey'
);

insert into stock_pricing
values
('Vegetable Stock', 6.70 ,'Crisco Foods'
);

insert into stock_pricing
values
('Salt', 16.23 ,'Salt of the Earth'
);

insert into stock_pricing
values
('Tomato', 0.78 ,'Crisco Foods'
);

insert into stock_pricing
values
('Black Beans', 5.60 ,'General Mills'
);

insert into stock_pricing
values
('Los Angeles', 1.24 ,'North American Water'
);

insert into stock_pricing
values
('Tahoe', 3.50 ,'North American Water'
);

insert into stock_pricing
values
('Montana', 4.00 ,'North American Water'
);

insert into stock_pricing
values
('Fiji', 8.00 ,'Fiji Water Co.'
);

/*
What_in_food (FOOD_ITEM, STOCK_ITEM)
        foreign key food_item references food,
        foreign key stock_item references stock
-------------------------------------------------------------
*/

prompt what_in_food

insert into what_in_food
values
('Kale Salad', 'Kale'
);


insert into what_in_food
values
('Kale Salad', 'Tomato'
);

insert into what_in_food
values
('Kale Wrap', 'Kale'
);

insert into what_in_food
values
('Kale Wrap', 'Rice'
);

insert into what_in_food
values
('Grilled Kale', 'Kale' 
);

insert into what_in_food
values
('Grilled Kale', 'Salt' 
);

insert into what_in_food
values
('Kale Soup', 'Vegetable Stock'
);

insert into what_in_food
values
('Kale Soup', 'Kale'
);

insert into what_in_food
values
('Kale Soup', 'Salt'
);

insert into what_in_food
values
('Kale Taco', 'Kale'
);

insert into what_in_food
values
('Kale Taco', 'Black Beans'
);

insert into what_in_food
values
('Kale Taco', 'Taco Shell'
);

insert into what_in_food
values
('Kale Frittata', 'Egg'
);

insert into what_in_food
values
('Kale Frittata', 'Kale'
);

insert into what_in_food
values
('Kale Frittata', 'Tomato'
);

insert into what_in_food
values
('Kale Chips', 'Kale'
);

insert into what_in_food
values
('Kale Chips', 'Oil'
);

insert into what_in_food
values
('Kale Ravioli', 'Flour'
);

insert into what_in_food
values
('Kale Ravioli', 'Egg'
);

insert into what_in_food
values
('Kale Ravioli', 'Kale'
);

insert into what_in_food
values
('Stir-Fried Kale', 'Kale'
);

insert into what_in_food
values
('Stir-Fried Kale', 'Oil'
);

insert into what_in_food
values
('Stir-Fried Kale', 'Egg'
);

insert into what_in_food
values
('Chocolate-Dipped Kale', 'Chocolate'
);

insert into what_in_food
values
('Chocolate-Dipped Kale', 'Kale'
);

spool off














