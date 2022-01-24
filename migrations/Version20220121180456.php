<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121180456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basket (id VARCHAR(255) NOT NULL, user_id VARCHAR(255) NOT NULL, content CLOB NOT NULL --(DC2Type:json)
        , PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, order_id INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE category_option (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, name VARCHAR(100) NOT NULL, price DOUBLE PRECISION NOT NULL, order_id INTEGER DEFAULT 1 NOT NULL)');
        $this->addSql('CREATE INDEX IDX_556ECACB12469DE2 ON category_option (category_id)');
        $this->addSql('CREATE TABLE category_supplement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER DEFAULT NULL, name VARCHAR(100) NOT NULL, price DOUBLE PRECISION NOT NULL, order_id INTEGER DEFAULT 1 NOT NULL)');
        $this->addSql('CREATE INDEX IDX_274423B712469DE2 ON category_supplement (category_id)');
        $this->addSql('CREATE TABLE command (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id VARCHAR(255) NOT NULL, content CLOB NOT NULL --(DC2Type:json)
        , date DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , order_type CLOB NOT NULL --(DC2Type:json_array)
        )');
        $this->addSql('CREATE TABLE company (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, vat VARCHAR(12) DEFAULT NULL, street VARCHAR(255) NOT NULL, street_number VARCHAR(10) NOT NULL, zip_code VARCHAR(4) NOT NULL, city VARCHAR(50) NOT NULL, phone_number VARCHAR(15) NOT NULL, can_be_delivered BOOLEAN NOT NULL, order_delivery_dead_line VARCHAR(8) DEFAULT NULL, is_enabled BOOLEAN NOT NULL, comment CLOB DEFAULT NULL, contact_email VARCHAR(255) NOT NULL, store CLOB NOT NULL, has_invoice BOOLEAN NOT NULL, tourneeId VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_4FBF094FB5B5F1FD ON company (tourneeId)');
        $this->addSql('CREATE TABLE html_content (name VARCHAR(50) NOT NULL, html CLOB NOT NULL, PRIMARY KEY(name))');
        $this->addSql('CREATE TABLE pdf (id VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, pdf VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER DEFAULT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, price INTEGER NOT NULL, order_id INTEGER NOT NULL, is_enabled BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE TABLE tournees (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id VARCHAR(255) NOT NULL, company_id INTEGER DEFAULT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, phone_number VARCHAR(20) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, store VARCHAR(255) NOT NULL, role VARCHAR(10) NOT NULL, is_enabled BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE INDEX IDX_1483A5E9979B1AD6 ON users (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE basket');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_option');
        $this->addSql('DROP TABLE category_supplement');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE html_content');
        $this->addSql('DROP TABLE pdf');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE tournees');
        $this->addSql('DROP TABLE users');
    }
}
