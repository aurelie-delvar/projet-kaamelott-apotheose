<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230403100152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personage ADD actor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_E60A6EC510DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E60A6EC510DAF24A ON personage (actor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_E60A6EC510DAF24A');
        $this->addSql('DROP INDEX UNIQ_E60A6EC510DAF24A ON personage');
        $this->addSql('ALTER TABLE personage DROP actor_id');
    }
}
