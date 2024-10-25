
-- Create Privileges Table
CREATE TABLE `privileges`
(
    `privilege_id` INT(11) NOT NULL AUTO_INCREMENT,
    `privilege_name` ENUM('BRONZE', 'SILVER', 'GOLD'),
    `privilege_point` INT(11),
    `privilege_equivalence` DOUBLE NOT NULL,
    PRIMARY KEY (`privilege_id`)
);

-- Insert Values into Privileges Table
INSERT INTO `privileges` (`privilege_id`, `privilege_name`, `privilege_point`, `privilege_equivalence`) VALUES (1, 'BRONZE', 0, 0),
                                                                                                               (2, 'SILVER', 1000, 2000),
                                                                                                               (3, 'GOLD', 3000, 6000);

-- Create Users Table
CREATE TABLE `users`
(
    `user_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(100) NOT NULL,
    `user_email` VARCHAR(100) NOT NULL UNIQUE,
    `user_contact` VARCHAR(100) NOT NULL,
    `user_pass` VARCHAR(250) NOT NULL,
    `user_location` VARCHAR(50) NOT NULL,
    `user_type` ENUM('Customer', 'Admin', 'Expert', 'Personal Shopper') DEFAULT 'Customer',
    `user_level` INT(11) NOT NULL DEFAULT 4,
    `user_image` VARCHAR(250),
    `user_privilege` INT(11) DEFAULT 1,
    PRIMARY KEY (`user_id`),
    CONSTRAINT `fk_user_privilege` FOREIGN KEY (`user_privilege`) REFERENCES `privileges`(`privilege_id`)
);

-- Create Categories Table
CREATE TABLE `categories`
(
    `cat_id` INT(11) NOT NULL AUTO_INCREMENT,
    `cat_name` ENUM('Entertainment', 'Food', 'Media', 'Artifacts'),
    PRIMARY KEY (`cat_id`)
);

-- Insert Values into Categories Table
INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES (1, 'Entertainment'), 
                                                       (2, 'Food'), 
                                                       (3, 'Media'), 
                                                       (4, 'Artifacts');

-- Create Brands Table
CREATE TABLE `brands`
(
    `brand_id` INT(11) NOT NULL AUTO_INCREMENT,
    `brand_name` VARCHAR(100) NOT NULL,
    `brand_description` VARCHAR(500),
    `brand_image` VARCHAR(250),
    PRIMARY KEY (`brand_id`)
);

-- Create Products Table
CREATE TABLE `products`
(
    `product_id` INT(11) NOT NULL AUTO_INCREMENT,
    `product_name` VARCHAR(100) NOT NULL,
    `product_brand` INT(11) NOT NULL,
    `product_image` VARCHAR(250) NOT NULL,
    `aggregate_score` DOUBLE,
    PRIMARY KEY (`product_id`),
    CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands`(`brand_id`)
);

-- Create Partners Table
CREATE TABLE `partners`
(
    `partner_id` INT(11) NOT NULL AUTO_INCREMENT,
    `partner_name` VARCHAR(100) NOT NULL,
    `partner_interest` INT(11) NOT NULL,
    `partner_type` INT(11) NOT NULL,
    PRIMARY KEY (`partner_id`),
    CONSTRAINT `fk_partner_interest` FOREIGN KEY (`partner_interest`) REFERENCES `categories`(`cat_id`)
);

-- Create Reviews Table
CREATE TABLE `reviews`
(
    `review_id` INT(11) NOT NULL AUTO_INCREMENT,
    `review_product` INT(11) NOT NULL,
    `review_score` INT(11) NOT NULL,
    `review_details` VARCHAR(500),
    `partner_id` INT(11) NOT NULL,
    PRIMARY KEY (`review_id`),
    CONSTRAINT `fk_review_product` FOREIGN KEY (`review_product`) REFERENCES `products`(`product_id`),
    CONSTRAINT `fk_review_partner` FOREIGN KEY (`partner_id`) REFERENCES `partners`(`partner_id`)
);

-- Create Payment Details Table
CREATE TABLE `payment_details`
(
    `gateway_id` INT(11) NOT NULL AUTO_INCREMENT,
    `gateway_name` VARCHAR(100) NOT NULL,
    `gateway_type` VARCHAR(100),
    `user_id` INT(11) NOT NULL,
    PRIMARY KEY (`gateway_id`),
    CONSTRAINT `fk_payment_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
);

-- Create Transactions Table
CREATE TABLE `transactions`
(
    `transaction_id` INT(11) NOT NULL AUTO_INCREMENT,
    `transaction_amount` DOUBLE NOT NULL,
    `payment_method` VARCHAR(100),
    `transaction_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `gateway` INT(11) NOT NULL,
    `product` INT(11) NOT NULL,
    `user_id` INT(11) NOT NULL,
    PRIMARY KEY (`transaction_id`),
    CONSTRAINT `fk_transaction_gateway` FOREIGN KEY (`gateway`) REFERENCES `payment_details`(`gateway_id`),
    CONSTRAINT `fk_transaction_product` FOREIGN KEY (`product`) REFERENCES `products`(`product_id`),
    CONSTRAINT `fk_transaction_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
);

-- Create Cart Table
CREATE TABLE `cart`
(
    `cart_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `product_id` INT(11) NOT NULL,
    `quantity` INT(11) NOT NULL,
    PRIMARY KEY (`cart_id`),
    CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`),
    CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`)
);
