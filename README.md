Payment System — Object-Oriented PHP (CLI)

## Summary

A compact, console-based PHP application showcasing a clean, object-oriented design for a payment domain. The code models clients, orders (commandes) and polymorphic payments (carte bancaire, PayPal, virement) while following SOLID principles and secure persistence via PDO.

## Highlights

- Clear domain model: `Client`, `Commande`, abstract `Paiement` and concrete payment types.
- Strong OOP: abstraction, inheritance, polymorphism, encapsulation, typed properties and return types (PHP 8.1+).
- Secure persistence: PDO + prepared statements, repositories/DAOs for data access.
- CLI-only application suitable for learning and small demos; structured for extension into larger systems.

## Entities & Key Attributes

- Client

  - id, nom, email
  - One-to-many: Client 1..n Commande

- Commande (Order)

  - id, montant_total, statut
  - Belongs to one `Client`
  - Composition: contains exactly one `Paiement`

- Paiement (abstract)
  - id, montant, statut, date_paiement
  - Must be associated with a `Commande` and cannot exist on its own
  - Concrete implementations: `CarteBancaire`, `Paypal`, `Virement`
  - Each concrete class implements `traiter(): bool`

## Technical Requirements

- PHP 8.1 or newer
- MySQL
- PDO for database access (prepared statements mandatory)
- CLI application (no web UI)
- PSR-4 autoloading and PSR-12 coding style recommended

## Architecture & Design

- Separation of concerns:
  - `src/Entity` — domain entities and value objects
  - `src/Repository` — PDO-based repositories (CRUD)
  - `src/Service` — business use cases (processing payments, creating orders)
  - `config/` — database and environment configuration
- Error handling via custom exceptions and defensive validation in setters/constructors.
- Transactions around payment processing to keep domain and persistence consistent.

## Getting started

1. Clone the repository

   git clone <repository-url>
   cd <repository-folder>

2. Configure your database connection in `config/database.php`.

3. Create the database and tables (using the SQL script provided in `database/schema.sql`, or the example above):

```bash
mysql -u your_user -p your_database < database/schema.sql
```

4. Run the CLI entry point:

```bash
php index.php
```

## Typical use cases implemented

- Create a `Client`
- Create a `Commande` and attach it to a `Client`
- Choose and attach a `Paiement` implementation to a `Commande`
- Process the payment via `traiter()` (polymorphic behavior)
- Query payment status

## Development & Quality

- Add unit tests for services and repositories.
- Use static analysis tools (PHPStan) and formatters/linters (PHPCS) to maintain PSR-12.
- Prefer small, focused classes with single responsibility.

## Next steps (suggestions)

- Add `database/schema.sql` and a sample `config/database.php` if you want, I can create them.
- Add basic unit tests and CI configuration (GitHub Actions) for automated checks.
