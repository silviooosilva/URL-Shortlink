<?php

namespace App\Services\Base;

use App\Models\Urls;
use App\Models\User;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ServiceBase
{
    protected Urls $url;
    protected User $user;
    protected $userId;
    protected $urlId;

    public function __construct(User $user, Urls $url) {
        $auth = auth()->user();
        if($auth){
           $this->userId = $auth['id'];
}
        $this->url = $url;
        $this->user = $user;
    }

    //URL HELPERS
    public function createCode(string $longUrl) : array
    {
        $urlDb = $this->url->where('url', $longUrl)
            ->where('user_id', $this->userId)->first();

        if(isset($urlDb))
        {
            return ([
                'long_url' => $urlDb['url'],
                'short_url' => $urlDb['short_url']
            ]);   
        }

        $urlCode = self::generateRandonCode();
        
        $this->url->create([
            'url' => $longUrl,
            'short_url' => "http://localhost:8000/api/?uri=".$urlCode,
            'user_id' => $this->userId
        ])->save();
        
        return ([
            'long_url' => $longUrl,
            'short_url' => "http://localhost:8000/api/?uri=".$urlCode
        ]);
    }
    
public function firstUrl(int $id): array
{
    $this->urlId = $id; 
    

    
    $res = $this->url
        ->where('user_id', $this->userId)
        ->where('id', $this->urlId)
        ->first(['id', 'url', 'short_url']);

    return $res ? [
        'id' => $res->id,
        'url' => $res->url,
        'short_url' => $res->short_url
    ] : [];
}


   public function listUrl() : array
{
    $response = [];

    $res = $this->url->where('user_id', '=', $this->userId)
        ->select('id', 'url', 'short_url')
        ->get();

    foreach ($res as $item)
    {
        $response[] = [
            'id' => $item->id,
            'url' => $item->url,
            'short_url' => $item->short_url
        ];
    }

    return $response;
}


    public static function generateRandonCode(int $length = 6) : string
    {
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $char[rand(0, strlen($char) - 1)];
        }
        return $code;
    }

  
    //USER HELPERS
    public function storeUser(array $request) : bool
    {
        $userExists = $this->user->where('email', $request['email'])->first();

        if(!isset($userExists))
        {
            $this->user->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'nickname' => $request['nickname'],
                'active' => $request['active'],
                'password' => Hash::make($request['password'])
            ])->save();
            return true;
        }
        return false;
    }
}
