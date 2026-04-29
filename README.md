วิธีรันโปรเจกต์ (XAMPP + MySQL)
1) ติดตั้งและเปิดใช้งาน
-ติดตั้ง XAMPP
-เปิดโปรแกรม แล้วกด Start:
-Apache
-MySQL
2) วางไฟล์โปรเจกต์
-แตกไฟล์โปรเจกต์ (ถ้ามี .zip)
-นำโฟลเดอร์ไปไว้ที่:
C:\xampp\htdocs\
-ตัวอย่าง:
C:\xampp\htdocs\shop-web
3) สร้างฐานข้อมูล
-เข้า phpMyAdmin
(http://localhost/phpmyadmin)
-กด New → สร้าง Database ชื่อ:
products_shop_db
4) Import ฐานข้อมูล
-คลิกเข้า database products_shop_db
ไปที่แท็บ Import
เลือกไฟล์:
products_shop_db.sql
กด Go
✔ ถ้าสำเร็จ จะมี table โผล่มา
5) เปิดใช้งานเว็บไซต์

เปิด browser แล้วเข้า:

http://localhost/web map
