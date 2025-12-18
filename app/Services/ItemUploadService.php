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
        $hashFilename = $itemImage->hashName();
        $result = Storage::putFile(self::$path, $itemImage);

        if (!$result)
            throw new Exception("Erro ao salvar imagem do item!!");

        $public_id = self::$path."/$hashFilename";
        $url = Storage::url($public_id);

        if (!$url)
            throw new Exception("Erro ao salvar imagem $public_id em Cloudnary!!");

        return compact('url','public_id');
    }

    public static function deleteFile(?string $public_id = null): bool
{
    // Se for nulo ou vazio, não faz nada e retorna falso
    if (!$public_id) {
        return false;
    }

    if (Storage::disk('cloudinary')->exists($public_id)) {
        return Storage::disk('cloudinary')->delete($public_id);
    }

    return false;
}
}
