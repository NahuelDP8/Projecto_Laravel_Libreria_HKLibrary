<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API Libreria",
 *      description="Esta API puede usarse para obtener información sobre los libros, autores y generos de la librería, y crear un pedido.
 *      Si la url para la API no tiene el formato adecuado o no existe, se retornará un json con un mensaje indicándoselo."
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 * )
 *
 * @OA\Tag(
 *     name="Libros",
 *     description="Listar y mostrar libro."
 * )
 * @OA\Tag(
 *     name="Autores",
 *     description="Listar y mostrar autor."
 * )
 * @OA\Tag(
 *     name="Generos",
 *     description="Listar y mostrar generos."
 * )
 * @OA\Tag(
 *     name="Pedido",
 *     description="Crear pedido."
 * )
 * 
 * 
 * 
 */

class DocumentationController extends Controller
{
}
