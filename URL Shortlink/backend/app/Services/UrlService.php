<?php

namespace App\Services;

use App\Models\Urls;
use App\Services\Base\ServiceBase;
use App\Services\Interfaces\IUrlService;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UrlService extends ServiceBase implements IUrlService
{
    protected Urls $url;
    protected $userId;

    public function __construct(Urls $url) {
        
        $auth = auth()->user();
        if($auth){
              $this->userId = $auth['id'];
         }
        $this->url = $url;
    }

    public function redirect(string $url) : string
    {
        try
        {
            $urlDb = $this->url->where('short_url', $url)
            ->where('user_id', $this->userId)->firstOrFail();
               
            return $urlDb['url'];
        }
        catch(ModelNotFoundException $e)
        {
            return "Erro: ".$e->getMessage();
        }
    }

    public function delete(int $id) : array
    {
        try
        {
            $url = $this->url->find($id);

            if($url)
            {
                $url->delete();
                return (['message' => "Registro apagado"]);
            }
            return (['message' => "Url não encontrada"]);

        }
        catch(ModelNotFoundException $e)
        {
            return "Erro: ".$e->getMessage();
        }
    }

    public function compactUrl(string $longUrl) : array
    {   
        try
        {
            return self::createCode($longUrl);
        }
        catch (QueryException $e)
        {
            return ([
                'long_url' => $e->getMessage(),
                'short_url' => $e->getMessage(),
            ]);
        }
        catch(ErrorException $e)
        {
            return ([
                'long_url' => $e->getMessage(),
                'short_url' => $e->getMessage(),
            ]);
        }
    }

    public function getAllUrls() : array
    {
        try
        {
            return auth()->check() ? self::listUrl() : [];
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

    public function getUrl(int $id) : array
    {
        try
        {
            return self::firstUrl($id);
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
