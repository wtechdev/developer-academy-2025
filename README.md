# Developer Academy 2025 - Blog con Laravel e Bootstrap

Progetto di corso per la creazione di un blog completo utilizzando Laravel come backend e Bootstrap per il frontend, con
sistema di autenticazione, API REST e pannello di amministrazione.

## 🎯 Obiettivi del Corso

- Apprendere i fondamenti di Laravel
- Implementare un sistema di autenticazione completo
- Creare CRUD con validation e gestione errori
- Sviluppare API REST con autenticazione JWT
- Utilizzare Bootstrap per interfacce responsive
- Gestire file multimediali con Spatie Media Library
- Comprendere le best practices dello sviluppo web

## 📋 Prerequisiti

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js e NPM
- Git
- Conoscenze base di HTML, CSS, JavaScript e PHP

## 🚀 Setup Iniziale del Progetto

### 1. Clonazione e Configurazione

```bash
# Clona il repository
git clone https://github.com/wtechdev/developer-academy-2025.git
cd developer-academy-2025

# Copia il file di configurazione
cp .env.example .env

# Installa le dipendenze PHP
composer install
```

### 2. Configurazione Database

Crea un database chiamato `developer_academy_2025` e scegli una delle seguenti opzioni:

**Opzione A - Con dati di esempio:**

```bash
# Importa il dump con dati di test
mysql -u username -p developer_academy_2025 < database/dump/developer_academy_2025.sql
```

**Opzione B - Database vuoto:**

```bash
# Esegui le migrazioni
php artisan migrate
```

### 3. Configurazione Logging

Nel file `config/logging.php`, modifica la configurazione per avere log giornalieri:

```php
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['daily'],
        'ignore_exceptions' => false,
    ],
    // ...
],
```

## 🎨 Design e Template

### Frontend

- **Template Bootstrap:** [StartBootstrap Blog Home](https://github.com/startbootstrap/startbootstrap-blog-home)
- **Sistema di paginazione:** Bootstrap 5 integrato con Laravel
- **Icone:** [Bootstrap Icons](https://github.com/twbs/icons)

### Backend (Dashboard)

- **Template:** [Bootstrap Dashboard Example](https://getbootstrap.com/docs/5.3/examples/dashboard/)
- **Interfaccia amministrativa** con sidebar e componenti moderni

## 🏗️ Architettura del Progetto

### Modelli e Relazioni

- **Post:** Modello principale per gli articoli del blog
- **User:** Modello per la gestione utenti
- **Relazioni Eloquent:** Configurate tra Post e User (hasMany/belongsTo)

### Layout System

Il progetto utilizza due sistemi di layout:

1. **Frontend Layout:** Gestito tramite componenti Blade (`components/layout.blade.php`)
2. **Backend Layout:** Template tradizionale per dashboard e autenticazione

### Componenti Blade

- `components/navbar.blade.php` - Navigazione frontend
- `components/dashboardnav.blade.php` - Navigazione backend

## 🔐 Sistema di Autenticazione

### Backend Authentication

- **Pacchetto:** Laravel UI
- **Customizzazione:** Override del metodo logout per redirect al login
- **Protezione:** Middleware auth per le rotte amministrative

### API Authentication

- **JWT Token:** Implementato con tymondesigns/jwt-auth
- **Endpoint Login:** `POST /api/login`
- **Protezione API:** Bearer token per rotte protette

## 📝 CRUD e Gestione Dati

### Controllers Resource

- `PostController` - Gestione articoli
- `UserController` - Gestione utenti
- Utilizzo di rotte resource per operazioni CRUD standard

### Validation

- `PostRequest` - Validazione form articoli
- `UserRequest` - Validazione form utenti
- Gestione errori con try-catch nei metodi store/update

### Soft Delete

- Implementato per il modello User
- Possibilità di recupero dati eliminati

## 📷 Gestione Media

### Spatie Media Library

- Upload e gestione immagini
- Associazione media ai post
- Ottimizzazione automatica delle immagini
- Creazione link simbolico per rendere disponibili le immagini nel frontend

```bash
#Linux #Mac
ln -s ../../storage/app/media mediagallery

#Windows
mklink /D allegati ..\storage\allegati
```

## 🔧 Comandi Artisan Utilizzati

```bash
# Componenti
php artisan make:component layout
php artisan make:component navbar
php artisan make:component dashboardnav

# Database
php artisan make:migration create_post_table
php artisan migrate

# Controllers
php artisan make:controller PostController --resource
php artisan make:controller UserController --resource

# Validation
php artisan make:request PostRequest
php artisan make:request UserRequest
```

## 📦 Pacchetti Installati

- **[Laravel UI](https://github.com/laravel/ui)** - Autenticazione e scaffolding
- **[Spatie Media Library](https://github.com/spatie/laravel-medialibrary)** - Gestione file multimediali
- **[JWT Auth](https://github.com/tymondesigns/jwt-auth)** - Autenticazione API
- **[Laravel Lang](https://github.com/Laravel-Lang/common)** - Traduzione italiana

## 🌐 API Endpoints

### Autenticazione

```
POST /api/login?email=user@example.com&password=password
```

**Risposta:** Token JWT per le successive chiamate

### Posts API

```
GET /api/posts
```

**Headers:** `Authorization: Bearer {token}`
**Risposta:** Lista dei post dell'utente autenticato

## 🎓 Argomenti del Corso

### 1. Introduzione a Laravel

- Installazione e configurazione
- Struttura del framework
- Artisan CLI
- Routing e Controllers

### 2. Database e Eloquent ORM

- Migrazioni e Schema Builder
- Modelli Eloquent
- Relazioni tra modelli
- Query Builder

### 3. Autenticazione e Autorizzazione

- Laravel UI
- Middleware
- Policies e Gates
- Sessioni e Cookie

### 4. Frontend con Blade e Bootstrap

- Template Blade
- Componenti riutilizzabili
- Asset compilation
- Responsive design

### 5. CRUD Operations

- Form Handling
- Validation
- File Upload
- Pagination

### 6. API Development

- RESTful APIs
- JWT Authentication
- API Resources
- Error Handling

### 7. Testing e Debugging

- Unit Testing
- Feature Testing
- Logging
- Debug Bar

## 🔄 Controllo Versione con Git

### Setup Repository

```bash
# Inizializza il repository
git init

# Aggiungi remote origin
git remote add origin https://github.com/wtechdev/developer-academy-2025.git

# Primo commit
git add .
git commit -m "Initial commit: Laravel blog setup"
git push -u origin main
```

### Workflow di Sviluppo

```bash
# Crea branch per nuove feature
git checkout -b feature/user-authentication
git checkout -b feature/post-crud
git checkout -b feature/api-endpoints

# Commit delle modifiche
git add .
git commit -m "Add user authentication system"

# Merge nel branch main
git checkout main
git merge feature/user-authentication
git push origin main
```

### Best Practices Git

- **Commit frequenti** con messaggi descrittivi
- **Branch per feature** per sviluppo parallelo
- **Pull requests** per code review
- **Gitignore** configurato per Laravel (vendor/, .env, storage/logs/)

### Comandi Git Essenziali

```bash
# Verifica stato
git status
git log --oneline

# Gestione branch
git branch -a
git checkout -b new-feature

# Sincronizzazione
git pull origin main
git push origin feature-branch

# Rollback
git reset --hard HEAD~1
git revert commit-hash
```

## 🚀 Deploy e Produzione

### Preparazione per il Deploy

```bash
# Ottimizzazione
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Asset compilation
npm run production
```

### Configurazione Server

- Apache/Nginx configuration
- SSL Certificate
- Database optimization
- Caching strategies

## 📚 Risorse Aggiuntive

- [Documentazione Laravel](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)
- [Laravel Best Practices](https://github.com/alexeymezenin/laravel-best-practices)
- [JWT Auth Documentation](https://jwt-auth.readthedocs.io/)

## 👥 Team

Progetto sviluppato per Developer Academy 2025 - Corso completo di sviluppo web con Laravel e Bootstrap.

---

**Nota:** Questo progetto è a scopo educativo e include esempi pratici di tutte le funzionalità moderne di Laravel.
