<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215103621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chaton_proprietaires (chaton_id INT NOT NULL, proprietaires_id INT NOT NULL, INDEX IDX_E0AAE35F640066C9 (chaton_id), INDEX IDX_E0AAE35F710ED0A5 (proprietaires_id), PRIMARY KEY(chaton_id, proprietaires_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chaton_proprietaires ADD CONSTRAINT FK_E0AAE35F640066C9 FOREIGN KEY (chaton_id) REFERENCES chaton (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chaton_proprietaires ADD CONSTRAINT FK_E0AAE35F710ED0A5 FOREIGN KEY (proprietaires_id) REFERENCES proprietaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprietaires_chaton DROP FOREIGN KEY FK_939FCA85640066C9');
        $this->addSql('ALTER TABLE proprietaires_chaton DROP FOREIGN KEY FK_939FCA85710ED0A5');
        $this->addSql('DROP TABLE proprietaires_chaton');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proprietaires_chaton (proprietaires_id INT NOT NULL, chaton_id INT NOT NULL, INDEX IDX_939FCA85710ED0A5 (proprietaires_id), INDEX IDX_939FCA85640066C9 (chaton_id), PRIMARY KEY(proprietaires_id, chaton_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE proprietaires_chaton ADD CONSTRAINT FK_939FCA85640066C9 FOREIGN KEY (chaton_id) REFERENCES chaton (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprietaires_chaton ADD CONSTRAINT FK_939FCA85710ED0A5 FOREIGN KEY (proprietaires_id) REFERENCES proprietaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chaton_proprietaires DROP FOREIGN KEY FK_E0AAE35F640066C9');
        $this->addSql('ALTER TABLE chaton_proprietaires DROP FOREIGN KEY FK_E0AAE35F710ED0A5');
        $this->addSql('DROP TABLE chaton_proprietaires');
    }
}
