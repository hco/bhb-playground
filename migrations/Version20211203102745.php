<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211203102745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2AF5A5C9395C3F3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__asset AS SELECT id, customer_id, name FROM asset');
        $this->addSql('DROP TABLE asset');
        $this->addSql('CREATE TABLE asset (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, customer_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_2AF5A5C9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO asset (id, customer_id, name) SELECT id, customer_id, name FROM __temp__asset');
        $this->addSql('DROP TABLE __temp__asset');
        $this->addSql('CREATE INDEX IDX_2AF5A5C9395C3F3 ON asset (customer_id)');
        $this->addSql('ALTER TABLE customer ADD COLUMN address VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2AF5A5C9395C3F3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__asset AS SELECT id, customer_id, name FROM asset');
        $this->addSql('DROP TABLE asset');
        $this->addSql('CREATE TABLE asset (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, customer_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO asset (id, customer_id, name) SELECT id, customer_id, name FROM __temp__asset');
        $this->addSql('DROP TABLE __temp__asset');
        $this->addSql('CREATE INDEX IDX_2AF5A5C9395C3F3 ON asset (customer_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__customer AS SELECT id, name FROM customer');
        $this->addSql('DROP TABLE customer');
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO customer (id, name) SELECT id, name FROM __temp__customer');
        $this->addSql('DROP TABLE __temp__customer');
    }
}
