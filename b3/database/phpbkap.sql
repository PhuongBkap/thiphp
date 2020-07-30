-- Chú ý tạo DATABASE và chọn DATABASE sau đó chạy lệnh sql sưới đây hoặc sử dụng chức năng imporrt

-- Tạo bảng lớp học
CREATE TABLE IF NOT EXISTS lop_hoc (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL UNIQUE
);

-- Thêm mưới dữ liệu mẫu vào bảng lớp học
INSERT INTO lop_hoc(name) VALUES
('C1807J'),
('C1807H'),
('C1807I'),
('C1808I');

-- Tạo bảng sinh vien
CREATE TABLE IF NOT EXISTS sinh_vien (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  lop_hoc_id int(11) NOT NULL,
  avatar varchar(255) NOT NULL,
  birthday date NOT NULL,
  gender tinyint(1) DEFAULT '0' COMMENT 'Giới tính giá trị 0 là nữ, 1 là nam',
  about text
);
-- Tạo khóa ngoại từ bảng sinh_vien tới bảng lop_hoc
ALTER TABLE sinh_vien ADD FOREIGN KEY FK_sinh_vien_lop(lop_hoc_id) REFERENCES lop_hoc(id);