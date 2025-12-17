<?php

namespace App\Repositories;

use App\Models\Item;
use App\Services\ItemUploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemRepository
{
    public static function store(array $itemData): Item
    {
        try {
            if (!isset($itemData['imagem']) && !isset($itemData['video']))
                return Item::create($itemData);

            $novoItem = Item::make($itemData);

            DB::beginTransaction();
            $novoItem->save();
            if (isset($itemData['imagem'])) {
                $uploadedImage = ItemUploadService::handleUploadFile($itemData['imagem']);

                $novoItem->media()->create([
                    'source' => $uploadedImage['url'],
                    'public_id'=> $uploadedImage['public_id']
                ]);
            }

            if (isset($itemData['video'])) {
                $novoItem->media()->create([
                    'source' => $itemData['video']
                ]);
            }
            $novoItem->load('media');
            $novoItem->refresh();
            return $novoItem;
        } catch (Exception $error) {
            DB::rollBack();
            throw $error;
        }finally{
            DB::commit();
        }
    }
}
