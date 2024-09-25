// Kiểm tra xem người dùng có đang đăng nhập không dựa trên token
export function isAuthenticated() {
    return !!localStorage.getItem('token'); // Trả về true nếu có token, false nếu không có
}
