<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191209121504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE platform_user_gender_type');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE platform_user_gender_type (platform_user_id INT NOT NULL, gender_type_id INT NOT NULL, INDEX IDX_88BADB53B25E19C7 (platform_user_id), INDEX IDX_88BADB5337A4F92F (gender_type_id), PRIMARY KEY(platform_user_id, gender_type_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE platform_user_gender_type ADD CONSTRAINT FK_88BADB5337A4F92F FOREIGN KEY (gender_type_id) REFERENCES gender_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE platform_user_gender_type ADD CONSTRAINT FK_88BADB53B25E19C7 FOREIGN KEY (platform_user_id) REFERENCES platform_user (id) ON DELETE CASCADE');
    }
}
