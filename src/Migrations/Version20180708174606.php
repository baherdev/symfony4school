<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180708174606 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE grade_course (grade_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_5431EEA7FE19A1A8 (grade_id), INDEX IDX_5431EEA7591CC992 (course_id), PRIMARY KEY(grade_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE grade_course ADD CONSTRAINT FK_5431EEA7FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE grade_course ADD CONSTRAINT FK_5431EEA7591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE grade_course');
    }
}
