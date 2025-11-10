<?

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    // Указываем таблицу с которой работает модель
    protected $table = 'test';
    protected $primeryKey = 'id';

    // Список разрешенных полей для записи в бд 
    protected $allowedFields = ['name', 'email'];

    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[test.email]',
        'name' => 'required'
    ];

//    Кастомизация вывода ошибок
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Пользователь с таким {field} уже существует'
        ]
    ];

//    protected $dateFormat = 'datetime';
//
//    // Список полей для записи даты создания и обновления
//    protected $useTimestamps = true;
//    protected $useSoftDeletes = true;
//    protected $createdField = 'created_at';
//    protected $updatedField = 'updated_at';
//    protected $deletedField = 'deleted_at';
}
