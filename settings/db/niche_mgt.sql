-- Roles Table
CREATE TABLE roles 
(
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name ENUM('Administrator', 'Customer', 'Expert Reviewer', 'Personal Shopper') NOT NULL UNIQUE
);

INSERT INTO roles (role_name) VALUES
    ('Administrator'),
    ('Customer'),
    ('Expert Reviewer'),
    ('Personal Shopper');

-- Users Table
CREATE TABLE users 
(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Approvals Table
CREATE TABLE approvals 
(
    approval_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    approval_status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    approval_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Privileges Table
CREATE TABLE privileges
(
    privilege_id INT AUTO_INCREMENT PRIMARY KEY,
    tier ENUM('Basic Shopper', 'Essential Shopper', 'Premium Shopper', 'Elite Shopper') DEFAULT 'Basic Shopper',
    monthly_fee DECIMAL(10, 2) NOT NULL,
    usage_total INT NOT NULL
);

INSERT INTO privileges (tier, monthly_fee, usage_total) VALUES
    ('Basic Shopper', 0, 0),
    ('Essential Shopper', 19.99, 10),
    ('Premium Shopper', 29.99, 30),
    ('Elite Shopper', 69.99, 10000000);

-- Subscriptions Table
CREATE TABLE subscriptions 
(
    subscription_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    privilege_id INT NOT NULL DEFAULT 1,
    usage_count INT DEFAULT 0,
    points INT DEFAULT 0,
    year INT NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (privilege_id) REFERENCES privileges(privilege_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Transactions Table
CREATE TABLE transactions 
(
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    points_earned INT GENERATED ALWAYS AS (FLOOR(amount / 2)) STORED,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Themes Table
CREATE TABLE themes
(
    theme_id INT AUTO_INCREMENT PRIMARY KEY,
    theme_name VARCHAR(255) NOT NULL
);

INSERT INTO themes (theme_name) VALUES
    ('Media'),
    ('Entertainment'),
    ('Artifacts'),
    ('Food Experiences');

-- Products Table
CREATE TABLE products 
(
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    theme_id INT NOT NULL,
    link VARCHAR(2083) NOT NULL,
    image_url VARCHAR(2083),
    avg_score DECIMAL(3, 2) DEFAULT 0,
    FOREIGN KEY (theme_id) REFERENCES themes(theme_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Reviews Table
CREATE TABLE reviews 
(
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    reviewer_id INT NOT NULL,
    score TINYINT NOT NULL CHECK (score BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (reviewer_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Sourced Items Table
CREATE TABLE sourced_items 
(
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    shopper_id INT NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (shopper_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Conversations Table
CREATE TABLE conversations 
(
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    shopper_id INT NOT NULL,
    sender ENUM('Customer', 'Shopper') NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (shopper_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Commissions Table
CREATE TABLE commissions 
(
    commission_id INT AUTO_INCREMENT PRIMARY KEY,
    shopper_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    sale_date DATE NOT NULL,
    FOREIGN KEY (shopper_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Shipping Fees Table
CREATE TABLE shipping_fees 
(
    fee_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    fee DECIMAL(10, 2) DEFAULT 0,
    waived BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Orders Table
CREATE TABLE orders 
(
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    shopper_id INT DEFAULT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    shipping_fee DECIMAL(10, 2) DEFAULT 0,
    status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (shopper_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Order Details Table
CREATE TABLE order_details 
(
    orderdetail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    item_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (item_id) REFERENCES sourced_items(item_id) ON DELETE CASCADE ON UPDATE CASCADE
);
