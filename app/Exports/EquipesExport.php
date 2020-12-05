<?php

namespace RW940cms\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use RW940cms\models\Equipes;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EquipesExport implements FromCollection, WithHeadings{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array{
        return [
        '#',
        'Nome',
        'Email',
        'Telefone',
        'Lattes',
        'Coordenador',
        'Equipe',
        'Status',
        ];
    }

    public function collection(){
        $membros = Equipes::all();

        foreach ($membros as $key => $value) {
        	$value->equipe_id = $value->equipe->nome_categoria;
        }
        return $membros;
    }
}
