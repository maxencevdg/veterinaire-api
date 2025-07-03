<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250318152414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_6AAB231FEA9FDD75 ON animal');
        $this->addSql('ALTER TABLE animal ADD photo_id INT NOT NULL, DROP media_id, CHANGE name name VARCHAR(255) NOT NULL, CHANGE species species VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F7E9E4C8C FOREIGN KEY (photo_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AAB231F7E9E4C8C ON animal (photo_id)');
        $this->addSql('ALTER TABLE treatment CHANGE name name VARCHAR(255) NOT NULL, CHANGE price price NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE last_name last_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_IDENTIFIER_EMAIL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F7E9E4C8C');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F7E3C61F9');
        $this->addSql('DROP INDEX UNIQ_6AAB231F7E9E4C8C ON animal');
        $this->addSql('ALTER TABLE animal ADD media_id INT DEFAULT NULL, DROP photo_id, CHANGE name name VARCHAR(100) NOT NULL, CHANGE species species VARCHAR(100) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AAB231FEA9FDD75 ON animal (media_id)');
        $this->addSql('ALTER TABLE treatment CHANGE name name VARCHAR(100) NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE `user` CHANGE first_name first_name VARCHAR(100) NOT NULL, CHANGE last_name last_name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE `user` RENAME INDEX uniq_identifier_email TO UNIQ_8D93D649E7927C74');
    }
}
