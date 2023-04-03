<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230403132308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, avatar_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64986383B10 (avatar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64986383B10 FOREIGN KEY (avatar_id) REFERENCES avatar (id)');
        $this->addSql('ALTER TABLE episode ADD author_id INT DEFAULT NULL, ADD season_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDAF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDAF675F31B ON episode (author_id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA4EC001D1 ON episode (season_id)');
        $this->addSql('ALTER TABLE personage ADD actor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_E60A6EC510DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E60A6EC510DAF24A ON personage (actor_id)');
        $this->addSql('ALTER TABLE quote ADD episode_id INT DEFAULT NULL, ADD personage_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4EA8E3E4A FOREIGN KEY (personage_id) REFERENCES personage (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6B71CBF4362B62A0 ON quote (episode_id)');
        $this->addSql('CREATE INDEX IDX_6B71CBF4EA8E3E4A ON quote (personage_id)');
        $this->addSql('CREATE INDEX IDX_6B71CBF4A76ED395 ON quote (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64986383B10');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_E60A6EC510DAF24A');
        $this->addSql('DROP INDEX UNIQ_E60A6EC510DAF24A ON personage');
        $this->addSql('ALTER TABLE personage DROP actor_id');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4362B62A0');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4EA8E3E4A');
        $this->addSql('DROP INDEX IDX_6B71CBF4362B62A0 ON quote');
        $this->addSql('DROP INDEX IDX_6B71CBF4EA8E3E4A ON quote');
        $this->addSql('DROP INDEX IDX_6B71CBF4A76ED395 ON quote');
        $this->addSql('ALTER TABLE quote DROP episode_id, DROP personage_id, DROP user_id');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDAF675F31B');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('DROP INDEX IDX_DDAA1CDAF675F31B ON episode');
        $this->addSql('DROP INDEX IDX_DDAA1CDA4EC001D1 ON episode');
        $this->addSql('ALTER TABLE episode DROP author_id, DROP season_id');
    }
}
