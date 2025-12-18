<?php

namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ItemUploadService
{
    private static $path = 'itens';

    public static function handleUploadFile(UploadedFile $itemImage): array | null
    {
        $public_id = Storage::putFile(self::$path, $itemImage);

        // Verifica se deu certo
        if (!$public_id) { 
            throw new Exception("Erro ao salvar imagem do produto!!");
        }

        // ✅ MUDANÇA 2: Agora pedimos a URL baseada no ID correto que recebemos acima
        $url = Storage::url($public_id);

        if (!$url)
            throw new Exception("Erro ao salvar imagem $public_id em Cloudnary!!");

        return compact('url','public_id');
    }
}
