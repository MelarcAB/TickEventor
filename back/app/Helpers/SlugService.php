<?php 

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SlugService
{ 
    
    /**
    * Genera un slug único para un modelo dado.
    *
    * @param string $modelName Nombre de la clase del modelo (e.g., App\Models\Event).
    * @param string $name El valor base para generar el slug.
    * @param string $columnName El nombre de la columna slug en la base de datos.
    * @return string El slug generado.
    */
   public static function createSlug(string $modelName, $name, $columnName = 'slug'): string
   {
       $slug = Str::slug($name);
       $originalSlug = $slug;
       $count = 1;
       // Aquí, $modelName se usa para crear una consulta sobre el modelo específico.
       while ($modelName::where($columnName, '=', $slug)->exists()) {
           $slug = $originalSlug . '-' . $count++;
       }
       return $slug;
   }
}
