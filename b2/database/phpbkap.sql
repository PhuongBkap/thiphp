-- Chú ý tạo DATABASE và chọn DATABASE sau đó chạy lệnh sql sưới đây hoặc sử dụng chức năng imporrt
-- Tạo bảng category
CREATE TABLE IF NOT EXISTS category (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL UNIQUE
);

-- Thêm dữ liệu mãu vào bảng category
INSERT INTO category(name) VALUES
('Áo Nam'),
('Áo Nữ'),
('Đồng Phục Công Sở'),
('Đồng Phục Học Sinh');

-- tạo bảng product
CREATE TABLE IF NOT EXISTS product (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  category_id int(11) NOT NULL,
  image varchar(255) NOT NULL,
  price float (10,2) NOT NULL,
  status tinyint(1) DEFAULT '0' COMMENT 'Trạng thái trị 0 là Ẩn, 1 là hiện',
  description text
);

-- Tạo khóa ngoại từ bảng product tới bang category
ALTER TABLE product ADD FOREIGN KEY FK_product_category(category_id) REFERENCES category(id);