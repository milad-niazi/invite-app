# 🎉 Digital Invitation Card

This project is built with **Laravel** and aims to create a digital invitation system.  
Users can register, create their own ceremony, and generate a unique invitation link to share with others.  
Anyone with the link can view the ceremony details such as date, location, and description.

---

## 🧩 Project Status
This repository is currently under development and serves as a **learning project** to practice the following design patterns:
- Repository Pattern  
- Factory Method Pattern  
- Facade Pattern  
- **Observer Pattern** ✅ *(newly added)*  

---

## 💡 Design Pattern Highlight — Observer Pattern
The **Observer Design Pattern** is implemented in this project to keep the system data consistent.

Whenever a **Ceremony** changes its status (e.g., becomes inactive),  
the `CeremonyObserver` automatically updates all related **Invitation Links** to match the new status.

**Implementation files:**
- `app/Observers/CeremonyObserver.php`
- `app/Models/Ceremony.php`
- `app/Models/InvitationLink.php`

This approach ensures **decoupled logic**, **cleaner controllers**, and **automatic synchronization**  
between ceremonies and their invitation links — following clean architecture principles.

---

## ⚙️ Tech Stack
- Laravel 10+
- PHP 8.1+
- MySQL
- Tailwind CSS
- Laravel Breeze (for authentication)

---

## 🚧 Work in Progress
This project is still in progress and will be continuously updated.  
Commits may include experiments, refactors, and implementations for learning purposes.

---

## 💡 Educational Purpose
The main goal of this project is to **learn and apply clean architecture concepts**  
and common **design patterns** in Laravel development.

---

## 📌 Note
Please note that this project is currently in a **testing and learning phase**.  
Any feedback or suggestions are highly appreciated 🙌

---

## 📬 Contact
👤 Developer: *[Milad Niazi]*  
📧 Email (optional): *realmiladniazi@email.com*  
📅 Last Updated: *November 2025*
