anitt@gmail.com / anita123
Per far sì che tutti gli articoli visibili al pubblico siano filtrati automaticamente con where('is_accepted', true) (cioè solo quelli accettati dai revisori), la soluzione più pulita, manutenibile e consigliata in Laravel è utilizzare un Global Scope sul modello Article.
In questo modo non devi ricordarti di aggiungere il where in ogni controller/metodo (homepage, categoria, ricerca, API futura, ecc.), riducendo drasticamente il rischio di dimenticanze.

Utente normale crea articolo
→ is_accepted = null (o false, dipende da come l’hai impostato)
Article::query() normale (es: homepage, show, index pubblico)
→ filtra automaticamente where('is_accepted', true)
→ articolo invisibile finché non approvato
Pablo (revisore) va su /revisor
→ IsRevisor middleware → ok solo se è revisore
→ RevisorController@index
→ prende il primo articolo con is_accepted === null (o false)
→ lo passa alla vista revisor/index.blade.php
Nella vista Pablo vede:
titolo, testo, immagini, autore, data…
due bottoni:
Accetta → POST → acceptArticCosa succede se non ci sono più articoli da revisionare?
(messaggio “Nessun articolo in attesa” nella vista?)le($id)
Rifiuta → POST → rejectArticle($id)


```
userstory3
├─ .editorconfig
├─ app
│  ├─ Console
│  │  └─ Commands
│  │     └─ MakeUserRevisor.php
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ ArticleController.php
│  │  │  ├─ Auth
│  │  │  │  ├─ ConfirmPasswordController.php
│  │  │  │  ├─ ForgotPasswordController.php
│  │  │  │  ├─ LoginController.php
│  │  │  │  ├─ RegisterController.php
│  │  │  │  ├─ ResetPasswordController.php
│  │  │  │  ├─ VerificationController.php
│  │  │  │  └─ VerifyEmailController.php
│  │  │  ├─ Controller.php
│  │  │  └─ RevisorController.php
│  │  └─ Middleware
│  │     └─ IsRevisor.php
│  ├─ Livewire
│  │  ├─ Actions
│  │  │  └─ Logout.php
│  │  └─ Forms
│  │     └─ LoginForm.php
│  ├─ Mail
│  │  └─ BecomeRevisor.php
│  ├─ Models
│  │  ├─ Article.php
│  │  ├─ Revisor.php
│  │  └─ User.php
│  ├─ Providers
│  │  ├─ AppServiceProvider.php
│  │  └─ VoltServiceProvider.php
│  └─ View
│     └─ Components
│        ├─ AppLayout.php
│        ├─ GuestLayout.php
│        └─ RevisorNotification.blade.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_02_14_093528_add_is_revisor_column_to_users_table.php
│  │  ├─ 2026_02_14_125815_create_candidature_revisore.php
│  │  └─ 2026_02_17_101352_create_annunci_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ package-lock.json
├─ package.json
├─ phpunit.xml
├─ postcss.config.js
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ auth
│  ├─ css
│  │  ├─ app.css
│  │  └─ style.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  ├─ sass
│  │  ├─ app.scss
│  │  └─ _variables.scss
│  └─ views
│     ├─ annunci
│     │  ├─ create.blade.php
│     │  ├─ index.blade.php
│     │  └─ show.blade.php
│     ├─ auth
│     │  ├─ login.blade.php
│     │  ├─ register.blade.php
│     │  └─ verify-email.blade.php
│     ├─ components
│     │  ├─ badge-revisore.blade.php
│     │  ├─ flash-messages.blade.php
│     │  ├─ footer.blade.php
│     │  └─ navbar.blade.php
│     ├─ errors
│     │  └─ 403.blade.php
│     ├─ home.blade.php
│     ├─ layouts
│     │  ├─ app.blade.php
│     │  ├─ guest.blade.php
│     │  └─ revisor.blade.php
│     ├─ mails
│     │  └─ become-revisor.blade.php
│     ├─ partials
│     │  ├─ card-anuncio.blade.php
│     │  └─ immagini-annuncio.blade.php
│     ├─ revisor
│     │  ├─ components
│     │  │  └─ buttons-action.blade.php
│     │  └─ index.blade.php
│     └─ welcome.blade.php
├─ routes
│  ├─ auth.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  │  └─ disks
│  │  │     └─ local
│  │  └─ views
│  └─ logs
├─ tailwind.config.js
├─ tests
│  ├─ Feature
│  │  ├─ Auth
│  │  │  ├─ AuthenticationTest.php
│  │  │  ├─ EmailVerificationTest.php
│  │  │  ├─ PasswordConfirmationTest.php
│  │  │  ├─ PasswordResetTest.php
│  │  │  ├─ PasswordUpdateTest.php
│  │  │  └─ RegistrationTest.php
│  │  ├─ ExampleTest.php
│  │  └─ ProfileTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
├─ vite.config.js
└─ _ide_helper.php

```