<?php

use Illuminate\Database\Seeder;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
        Moradores::truncate();
           for ($i=1; $i <=200 ; $i++) { 

                Moradores::insert([

                    'nome_completo'=>$faker->name,
                    'data_nascimento'=>$faker->date('d/m/Y'),
                    'naturalidade'=>$faker->city,
                    'sexo'=>$faker->randomElement(['Masculino','Feminino']),
                    'necessidades_especiais'=>'',
                    'rg'=>$faker->randomDigit(8),
                    'rg_orgao_expedidor'=>'SSP',
                    'rg_estado_expedidor'=>'SP',
                    'rg_data_emissao'=>$faker->date('d/m/Y'),
                    'cpf'=>$faker->cpf,
                    'cpf_data_emissao'=>$faker->date('d/m/Y'),
                    'estado_civil'=>'Solteiro',
                    'grau_instrucao'=>'allala',
                    'ctps'=>$faker->randomNumber(),
                    'ctps_serie'=>$faker->randomNumber(),
                    'ctps_data_emissao'=>$faker->date('d/m/Y'),
                    'trabalha'=>$faker->randomElement(['Sim','Não']),
                    'empresa'=>$faker->company,
                    'funcao'=>$faker->jobTitle,
                    'salario'=>$faker->randomDigit(4).'.00',
                    'telefone_fixo'=>$faker->phoneNumber,
                    'telefone_celular'=>$faker->phoneNumber,
                    'telefone_recado'=>$faker->phoneNumber,
                    'nome_recado'=>$faker->name,
                    'endereco_id'=>$faker->numberBetween(1,100)
    }
}
