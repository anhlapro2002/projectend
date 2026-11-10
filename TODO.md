# TODO - Bug fixing & test

## Đã tìm thấy & sửa
- [x] **Bug 1: Thứ tự migration sai** -> các bảng tham chiếu FK tới bảng tạo sau nó (orders/OrderDetails/ProductsDetails/wards/districts). Đã đổi lại thứ tự file migration.
- [x] **Bug 2: Cột `pass` != `password`** trong migration bảng `user`. Đã sửa thành `password`.

## Test lại
- [x] MySQL đang chạy (cổng 3306 mở)
- [x] `php artisan migrate:fresh` chạy hết 19 migration
- [x] Đăng ký customer (POST /signup) -> 302 (thành công)
- [x] Đăng nhập customer (POST /login, check=1) -> 302 ve `/`, GET /cart -> 200
- [x] Đăng nhập admin (POST /login, check=0) -> 302 ve `/home`
- [x] Các trang chính: `/`, `/shop`, `/login`, `/logincus`, `/signupcus`, `/{id}/detail`, `/orders/details` -> 200
- [x] Các trang admin: `/home`, `/products/index`, `/category/index`, `/employee/index`, `/customer/index`, `/Orders/index` -> 200

## Vấn đề còn lại (chờ xử lý)
- [ ] Các Seeder đang rỗng -> provinces/districts/wards chưa có data (đã seed tạm để test)
- [ ] Route `/forgotPass`, `/newPass` -> method `forgotPass`/`newPass` không tồn tại trong EmployeeController
