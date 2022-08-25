<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220712191411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, lore LONGTEXT NOT NULL, passive LONGTEXT NOT NULL, passive_img VARCHAR(255) NOT NULL, q_hability VARCHAR(255) NOT NULL, q_description LONGTEXT NOT NULL, w_hability VARCHAR(255) NOT NULL, w_description LONGTEXT NOT NULL, e_hability VARCHAR(255) NOT NULL, e_description LONGTEXT NOT NULL, r_hability VARCHAR(255) NOT NULL, r_description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE champion');
    }
}
