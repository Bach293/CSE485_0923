-- a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình 
SELECT baiviet.* 
FROM baiviet 
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
WHERE theloai.ten_tloai = 'Nhạc trữ tình'

-- b. Liệt kê các bài viết của tác giả “Nhacvietplus”
SELECT baiviet.* 
FROM baiviet 
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
WHERE tacgia.ten_tgia = 'Nhacvietplus'

-- c. Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào.
SELECT theloai.ten_tloai
FROM theloai 
LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
WHERE baiviet.ma_tloai IS NULL

-- d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết.
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai

-- e. Tìm thể loại có số bài viết nhiều nhất
SELECT theloai.ten_tloai, COUNT(baiviet.ma_bviet) AS so_bviet
FROM theloai
JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai
GROUP BY theloai.ma_tloai -- Hoặc theloai.ten_tloai hoặc cả 2
ORDER BY so_bviet DESC LIMIT 1

-- f. Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_bviet) AS so_bviet
FROM tacgia
JOIN baiviet ON tacgia.ma_tgia = baiviet.ma_tgia
GROUP BY tacgia.ten_tgia -- Vì em lỡ để tên 6 tác giả lặp lại trong 100 data tác giả nên chỉ lấy tên mới được ạ 
ORDER BY so_bviet DESC LIMIT 2

-- g. Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em”
SELECT *
FROM baiviet
WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%'

-- h. Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em” 
SELECT *
FROM baiviet
WHERE tieude LIKE '%yêu%' OR tieude LIKE '%thương%' OR tieude LIKE '%anh%' OR tieude LIKE '%em%'
   OR ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%'

-- i. Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả 
CREATE VIEW vw_Music AS
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;

-- j. Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách 
-- Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi.
DELIMITER //

CREATE PROCEDURE sp_DSBaiViet(IN p_ten_tloai VARCHAR(50))
BEGIN
  DECLARE v_ma_tloai INT;
  
  SELECT ma_tloai INTO v_ma_tloai
  FROM theloai
  WHERE ten_tloai = p_ten_tloai;
  
  IF v_ma_tloai IS NULL THEN
    SELECT 'Thể loại không tồn tại' AS Error;
  ELSE
    SELECT baiviet.*
    FROM baiviet
    WHERE ma_tloai = v_ma_tloai;
  END IF;
END //

DELIMITER ;

-- k. Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để
-- khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo.
ALTER TABLE theloai
ADD COLUMN SLBaiViet INT DEFAULT 0;

DELIMITER //

CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
  DECLARE v_ma_tloai INT;
  
  SELECT ma_tloai INTO v_ma_tloai
  FROM baiviet
  WHERE ma_bviet = NEW.ma_bviet;

  UPDATE theloai
  SET SLBaiViet = (SELECT COUNT(*) FROM baiviet WHERE ma_tloai = v_ma_tloai)
  WHERE ma_tloai = v_ma_tloai;
END //

DELIMITER ;
