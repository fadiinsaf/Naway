# 🎼 Naway
### *The Spirit of Arabic Music*

**Naway** is a cultural and educational web platform dedicated to Arabic music.  
It offers users an interactive way to explore **Arabic musical instruments**, **maqams**, **rhythms (Iqa’at)**, **artists**, and **musical genres** through rich content, audio samples, comments, likes, and real-time interaction.

---

## 🌍 Project Vision

Naway aims to preserve, explain, and promote **Arabic musical heritage** through a modern digital experience.

It acts as a bridge between:
- 🎶 **Heritage**
- 💻 **Technology**
- 🌐 **Global accessibility**

---

## ❗ Problem Statement

Arabic music is one of the richest musical traditions in the world, yet it is still difficult for many people to access and understand, especially outside the Arab world.

Many users face:
- 🌐 Language barriers
- 📚 Lack of structured learning resources
- 🎧 Limited interactive platforms for Arabic music theory and heritage

**Naway** solves this by offering a platform that makes Arabic music easier to discover, learn, and enjoy.

---

## ✨ Main Features

### 👤 User Features
- 🔐 Register and log in
- 🌍 Browse content without authentication
- 🔎 Search for artists, instruments, rhythms, maqams, and genres
- 🗂️ Filter content by category
- 📄 Paginate large datasets
- 💬 Add, edit, and delete comments
- ❤️ Like comments
- 🌐 Switch between **Arabic**, **French**, and **English**
- 🌙 Toggle **dark mode**

### 🎵 Content Features
- 🎻 Explore musical instruments with images and descriptions
- 🥁 Listen to rhythms with audio samples and scores
- 🎼 Discover maqams with explanations and notation
- 🎤 Read artist biographies
- 🎶 Browse musical genres and styles

### 🛡️ Admin Features
- ➕ Add, edit, and delete artists
- ➕ Add, edit, and delete instruments
- ➕ Add, edit, and delete rhythms
- ➕ Add, edit, and delete maqams
- ➕ Add, edit, and delete genres
- 🧹 Moderate comments
- 👥 Manage users

### 🎮 Bonus Features
- 🧠 Musical memory game
- 💬 Real-time community chat
- 🟢 Online presence indicators
- 📜 Message history

---

## 🛠️ Tech Stack

### 🎨 Frontend
- HTML5
- Blade
- Tailwind CSS
- React.js

### ⚙️ Backend
- PHP
- Laravel

### 🗄️ Database
- MySQL
- SQL

### 📡 Real-Time
- Laravel Echo
- Pusher / Reverb
- WebSockets

### 🎨 Design
- Figma

---

## 🧱 Database Entities

Main entities used in the project:

- `users`
- `artists`
- `instruments`
- `rhythms`
- `maqams`
- `genres`
- `comments`
- `likes`
- `conversations`
- `messages`

---

## 📊 UML & Modeling

This project includes:
- ✅ Use Case Diagram
- ✅ Class Diagram
- ✅ ERD (Entity Relationship Diagram)

---

## 🚀 Installation

### 1. Clone the repository
```bash
git clone https://github.com/fadiinsaf/Naway.git
cd Naway
```


### 2. Install dependencies
```bash
composer install
npm install
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```
#### Update your .env file with your database configuration:

```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Migrations

```bash
php artisan migrate
```

(Optional) Seed the database with dummy data:

```bash
php artisan db:seed
```

### 5. Run the Application

Start the local development server:

```bash
php artisan serve
```

Visit http://localhost:8000 in your browser.

## 🤝 Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 👍 Author

**Fadi Insaf** – [GitHub](https://github.com/fadiinsaf) | [Email](mailto:fadiinafff@gmail.com)
