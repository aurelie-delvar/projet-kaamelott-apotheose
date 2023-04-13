<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413120146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_quote (user_id INT NOT NULL, quote_id INT NOT NULL, INDEX IDX_89B330ACA76ED395 (user_id), INDEX IDX_89B330ACDB805178 (quote_id), PRIMARY KEY(user_id, quote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_quote ADD CONSTRAINT FK_89B330ACA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_quote ADD CONSTRAINT FK_89B330ACDB805178 FOREIGN KEY (quote_id) REFERENCES quote (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_quote DROP FOREIGN KEY FK_89B330ACA76ED395');
        $this->addSql('ALTER TABLE user_quote DROP FOREIGN KEY FK_89B330ACDB805178');
        $this->addSql('DROP TABLE user_quote');
    }
}
