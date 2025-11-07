<?
namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model {
    // Указываем таблицу с которой работает модель
    protected $table = 'blog';
    protected $primeryKey = 'id';

    // Список разрешенных полей для записи в бд 
    protected $allowedFields = ['title', 'excerpt', 'content'];
}

?>