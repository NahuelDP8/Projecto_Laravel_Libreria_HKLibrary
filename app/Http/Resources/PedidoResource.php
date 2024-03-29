<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Libro;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $titulosLibros = $this->libros->map(function(Libro $item, int $key){
            return [
                'id' => $item->id,
                'titulo' => $item->titulo, 
                'precio_unitario' => $item->precio,
                'cantidad_unidades' => $item->pivot->cantidadUnidades
            ];
        });

        return [
            'id' => $this->id,
            'fecha' => $this->fecha,
            'precio_total' => $this->precio_total,
            'cliente' => $this->cliente,
            'libros' => $titulosLibros,
        ];
    }
}
