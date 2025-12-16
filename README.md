# ❄️ Shiny Flakes - E-Commerce Web Application

**Shiny Flakes** is a web-based e-commerce application built with the **Laravel Framework**. This application is designed for a streetwear clothing brand, featuring a complete flow from product browsing to a simulated checkout process with digital receipt generation.

## 🎨 UI/UX Design

The interface and user experience of **Shiny Flakes** were prototyped using Figma before development. You can inspect the original design file here:

👉 **[View Shiny Flakes Figma Design](https://www.figma.com/design/4DUJLujhFF47M4SHO3oeFG/Shiny-Flakes-v1?node-id=0-1&t=eBhFlx46U46rm4Vm-1)**

## 📸 Screenshots

<img width="1919" height="963" alt="Screenshot 2025-12-16 082950" src="https://github.com/user-attachments/assets/bec59ba0-e94b-4da6-9900-47178a620e85" />
<img width="1919" height="967" alt="Screenshot 2025-12-14 232326" src="https://github.com/user-attachments/assets/818c5425-35f8-4b81-b975-6c90e9eaa913" />
<img width="1919" height="904" alt="Screenshot 2025-12-14 222339" src="https://github.com/user-attachments/assets/919bba76-5eb0-427d-aa53-683d6421aa7d" />
<img width="1913" height="951" alt="Screenshot 2025-12-14 223158" src="https://github.com/user-attachments/assets/2a4f55e7-423a-4b3e-a315-362f69389aef" />
<img width="1919" height="947" alt="Screenshot 2025-12-15 000508" src="https://github.com/user-attachments/assets/4d29c998-31bd-4d76-9643-a86715721c86" />


## ✨ Key Features

### 🛒 Public / Customer
- **Product Catalog:** Browse streetwear products with dynamic pricing.
- **Product Detail:** View detailed information about specific items.
- **Dynamic Checkout:** Real-time checkout simulation using **AJAX**.
- **Digital Receipt:** Automatic generation of transaction receipts (Struk) using **SweetAlert2**.

### 🔐 Authentication & Roles
- **Multi-Role System:** Supports Admin, Cashier (Kasir), and User/Guest.
- **Secure Login/Logout:** Built on top of Laravel's authentication system.

### ⚡ Admin Dashboard
- **Product Management:** Create, Read, Update, Delete (CRUD) products.
- **Transaction History:** View list of purchasing data.
- **User Management:** Manage registered users and roles.
- **Inventory Control:** Monitor stock levels (Drugs/Medicines & Clothing).

## 🛠️ Tech Stack

- **Backend:** Laravel (PHP Framework)
- **Frontend:** Blade Templates, HTML5, CSS3
- **Scripting:** JavaScript (jQuery)
- **UI Components:** SweetAlert2 (Popups & Alerts), TailwindCSS/Bootstrap
- **Database:** MySQL

## 📂 Project Structure

Key Controllers used in this project:
- `ShopController` - Handles public shop view and checkout logic.
- `ProdukController` - Manages clothing product data.
- `PembelianController` - Handles transaction data and reporting.
- `DrugController` - Manages specific inventory items.
- `DashboardController` - Main admin interface.

## 🚀 Installation & Setup

Follow these steps to run the project locally:

1. **Clone the repository**
   ```bash
   git clone [https://github.com/bjorcaw731/shiny-flakes.git](https://github.com/bjorcaw731/shiny-flakes.git)
   cd shiny-flakes

2. Install Dependencies

Bash

composer install
npm install

3. Environment Setup Copy the .env.example file to .env:

Bash

cp .env.example .env

4. Configure your database name (DB_DATABASE), username, and password in the .env file.

Generate App Key

Bash

php artisan key:generate

5. Run Migrations & Seeders

Bash

php artisan migrate --seed

6. Run the Server

Bash

php artisan serve
Open your browser and visit: http://127.0.0.1:8000

🤝 Contributing
Contributions are welcome! Please feel free to submit a Pull Request.

📝 License
This project is licensed under the MIT license.
