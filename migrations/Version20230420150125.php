<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230420150125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, picture VARCHAR(128) DEFAULT NULL, description_picture LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avatar (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, icon VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, season_id INT DEFAULT NULL, title VARCHAR(128) NOT NULL, number BIGINT DEFAULT NULL, INDEX IDX_DDAA1CDAF675F31B (author_id), INDEX IDX_DDAA1CDA4EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personage (id INT AUTO_INCREMENT NOT NULL, actor_id INT DEFAULT NULL, name VARCHAR(64) NOT NULL, picture VARCHAR(128) DEFAULT NULL, description_picture LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, credit_order TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E60A6EC510DAF24A (actor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE play_quizz (id INT AUTO_INCREMENT NOT NULL, quizz_id INT DEFAULT NULL, user_id INT DEFAULT NULL, score SMALLINT DEFAULT NULL, INDEX IDX_8DA87081BA934BCD (quizz_id), INDEX IDX_8DA87081A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, quizz_id INT DEFAULT NULL, title LONGTEXT NOT NULL, answer1 LONGTEXT NOT NULL, answer2 LONGTEXT NOT NULL, answer3 LONGTEXT NOT NULL, answer4 LONGTEXT NOT NULL, good_answer LONGTEXT NOT NULL, INDEX IDX_B6F7494EBA934BCD (quizz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quote (id INT AUTO_INCREMENT NOT NULL, episode_id INT DEFAULT NULL, personage_id INT DEFAULT NULL, user_id INT DEFAULT NULL, text LONGTEXT NOT NULL, rating DOUBLE PRECISION DEFAULT NULL, validated TINYINT(1) NOT NULL, INDEX IDX_6B71CBF4362B62A0 (episode_id), INDEX IDX_6B71CBF4EA8E3E4A (personage_id), INDEX IDX_6B71CBF4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rate (id INT AUTO_INCREMENT NOT NULL, quote_id INT DEFAULT NULL, user_id INT DEFAULT NULL, rating SMALLINT DEFAULT NULL, INDEX IDX_DFEC3F39DB805178 (quote_id), INDEX IDX_DFEC3F39A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(128) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, avatar_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64986383B10 (avatar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_quote (user_id INT NOT NULL, quote_id INT NOT NULL, INDEX IDX_89B330ACA76ED395 (user_id), INDEX IDX_89B330ACDB805178 (quote_id), PRIMARY KEY(user_id, quote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDAF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_E60A6EC510DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE play_quizz ADD CONSTRAINT FK_8DA87081BA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id)');
        $this->addSql('ALTER TABLE play_quizz ADD CONSTRAINT FK_8DA87081A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EBA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4EA8E3E4A FOREIGN KEY (personage_id) REFERENCES personage (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rate ADD CONSTRAINT FK_DFEC3F39DB805178 FOREIGN KEY (quote_id) REFERENCES quote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rate ADD CONSTRAINT FK_DFEC3F39A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64986383B10 FOREIGN KEY (avatar_id) REFERENCES avatar (id)');
        $this->addSql('ALTER TABLE user_quote ADD CONSTRAINT FK_89B330ACA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_quote ADD CONSTRAINT FK_89B330ACDB805178 FOREIGN KEY (quote_id) REFERENCES quote (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDAF675F31B');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_E60A6EC510DAF24A');
        $this->addSql('ALTER TABLE play_quizz DROP FOREIGN KEY FK_8DA87081BA934BCD');
        $this->addSql('ALTER TABLE play_quizz DROP FOREIGN KEY FK_8DA87081A76ED395');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EBA934BCD');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4362B62A0');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4EA8E3E4A');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF4A76ED395');
        $this->addSql('ALTER TABLE rate DROP FOREIGN KEY FK_DFEC3F39DB805178');
        $this->addSql('ALTER TABLE rate DROP FOREIGN KEY FK_DFEC3F39A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64986383B10');
        $this->addSql('ALTER TABLE user_quote DROP FOREIGN KEY FK_89B330ACA76ED395');
        $this->addSql('ALTER TABLE user_quote DROP FOREIGN KEY FK_89B330ACDB805178');
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE avatar');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE personage');
        $this->addSql('DROP TABLE play_quizz');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE rate');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_quote');
    }
}
