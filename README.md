# ArtVerse - Full-Stack Laravel Application

A modern, premium digital platform for local artists to showcase their artwork online with AI moderation, community interaction, and responsive glassmorphism UI.

## 🎨 Features

### Core Platform
- **Artist Profiles**: Local artists can create and manage their profiles
- **Digital Galleries**: Upload and showcase artwork with metadata
- **Community Interaction**: Like, rate, and comment on artworks
- **Search & Filter**: Browse by category and search functionality
- **Admin Dashboard**: Moderate content and manage platform

### AI Moderation System
- **Nudity Detection**: Mock NSFW score detection
- **AI-Generated Image Detection**: Authenticity labeling system
- **Moderation Queue**: Flag suspicious uploads for admin review
- **Clean Architecture**: Ready for real API integration (Clarifai, Sightengine, etc.)

### UI/UX
- **Glassmorphism Design**: Modern frosted glass effects
- **Dark Theme**: Premium dark gradient backgrounds
- **Responsive Layout**: Mobile-first design
- **Smooth Animations**: Hover effects and transitions
- **Tailwind CSS**: Utility-first styling

## 🛠️ Tech Stack

- **Backend**: Laravel 12 + PHP 8+
- **Database**: MySQL (configured in `.env`)
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js (optional)
- **Authentication**: Laravel Breeze
- **Storage**: Local filesystem (structured for S3/Cloudinary)

## 📦 Quick Start

```bash
# 1. Install dependencies
composer install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Fresh database with seeders
php artisan migrate:fresh --seed

# 4. Run server
php artisan serve
```

Visit: **http://localhost:8000**

## 👤 Test Credentials

- **Admin**: `admin@artverse.test` / `password`
- **Other users**: Created by seeders (randomized)

## 📁 Project Structure

**Models**: User, Artwork, Comment, Rating, Like
**Controllers**: Home, Artwork, Artist, Dashboard, Admin, Comment, Rating, Like
**Services**: ModerationService, NudityDetectorService, AIGenerationDetectorService
**Views**: Home, Gallery, Artworks, Artists, Dashboard, Admin
**Migrations**: Users, Artworks, Comments, Ratings, Likes, Profile Fields

## 🔑 User Roles

- **Admin**: Moderate content, review flagged artworks
- **Artist**: Upload/edit artworks, view stats
- **Visitor**: Browse, like, rate, comment

## 🤖 AI Moderation

Mock services with scoring system:
- NSFW Detection (0-1 scale)
- AI Generation Detection (0-1 scale)
- Auto-flagging if NSFW > 0.7
- Authenticity labels (Human Made, AI Assisted, Suspected AI Generated)

## 🚀 Routes

**Public**: `/`, `/gallery`, `/artists`, `/artworks/{id}`
**Auth**: `/dashboard`, `/artworks/create`, `/artworks/{id}/edit`
**Admin**: `/admin`, `/admin/review/{id}`, `/admin/moderate/{id}`

## 📊 Database

- **Users**: id, name, email, password, role, avatar, bio, location, socials, timestamps
- **Artworks**: id, user_id, title, description, image, category, tags, likes_count, views_count, nsfw_score, ai_generated_score, moderation_status, authenticity_label, timestamps
- **Comments/Ratings/Likes**: Standard relationship tables

## 🔧 Configuration

Database connection in `.env`:
```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

## 🚀 Production Deployment

```bash
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
chmod -R 775 storage bootstrap/cache
```

## 📈 Future Enhancements

- Real API integration for AI moderation (Clarifai, Sightengine)
- Cloudinary/S3 storage integration
- Infinite scrolling gallery
- Real-time notifications
- Artist verification badges
- Social sharing features
- Payment system for commissions

## 📝 Notes

- All styling uses Tailwind CSS with glassmorphism effects
- Mock AI services ready for real API swapping
- Role-based access control via middleware
- Factory-based seeding for consistent test data
- Clean service architecture for moderation system

---

**Happy Creating! 🎨**
