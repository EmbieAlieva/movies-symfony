<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224121458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, idcat_id INT NOT NULL, category VARCHAR(45) NOT NULL, INDEX IDX_64C19C1821004EF (idcat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, synopsis VARCHAR(5000) NOT NULL, price INT NOT NULL, cover VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, idusr_id INT NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, pass VARCHAR(55) NOT NULL, INDEX IDX_8D93D64968D47E57 (idusr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1821004EF FOREIGN KEY (idcat_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64968D47E57 FOREIGN KEY (idusr_id) REFERENCES movie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1821004EF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64968D47E57');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE user');
    }
}
