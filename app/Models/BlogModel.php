<?

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    // Указываем таблицу с которой работает модель
    protected $table = 'blog';
    protected $primeryKey = 'id';

    // Список разрешенных полей для записи в бд 
    protected $allowedFields = ['title', 'excerpt', 'content'];

    protected $dateFormat = 'datetime';

    // Список полей для записи даты создания и обновления
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
