const imageInput = document.getElementById('image-input');
const previewImage = document.getElementById('img_show');
imageInput.addEventListener('change', () => {
    const file = imageInput.files[0]; // cái này nếu mà có cả label mà for cho một thằng input thì nó vẫn lấy input này
    // files chứa tất cả các tệp đã chọn , còn files[0] lấy ra phần tử đầu tiên , cái này biết rồi :v
    if (file) {
        const imageUrl = URL.createObjectURL(file); // tạo url duy nhất cho cái ảnh
        previewImage.src = imageUrl; // gán lại cho cái img ảnh mới được chọn lúc nãy này
    }
});