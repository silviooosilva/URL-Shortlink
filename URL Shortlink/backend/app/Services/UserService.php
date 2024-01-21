<?php 

namespace App\Services;

use App\Models\User;
use App\Services\Base\ServiceBase;
use App\Services\Interfaces\IUserService;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService extends ServiceBase implements IUserService
{
    protected User $user;
    protected $userId;

    public function __construct(User $user) {
        $auth = auth()->user();
        if($auth){
            $this->userId = $auth['id'];
        }
        $this->user = $user;
    }

    public function register(array $request) : array
    {
        try
        {
            return self::storeUser($request) ? ['response' => 'Cadastro efetuado!'] :
                ['response' => 'Este email já foi cadastrado!'];
        }
        catch(ErrorException $e)
        {
            return ['response' => 'Erro: '.$e];
        }
    }

    public function getUsers() : array
    {
        try
        {
            return auth()->check() ? array($this->user->find($this->userId)) : [];
        }
        catch(ModelNotFoundException $e)
        {
            return (['error' => 'ERRO: '. $e->getMessage()]);
        }
        catch(ErrorException $e)
        {
            return (['error' => 'ERRO: '. $e->getMessage()]);
        }
    }
}
