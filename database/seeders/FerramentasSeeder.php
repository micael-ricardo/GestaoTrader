<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ferramenta;


class FerramentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $ferramentas = [
            ['nome' => 'Editor Pro', 'versao' => '1.0', 'status' => 'Ativa', 'path' => 'C:\Ferramentas\EditorPro\editor.exe'],
            ['nome' => 'Compilador X', 'versao' => '2.1', 'status' => 'Inativa', 'path' => '/usr/local/bin/compiler'],
            ['nome' => 'Gerador PDF', 'versao' => '1.5', 'status' => 'Inativa', 'path' => 'https://tools.com/pdfgen'],
            ['nome' => 'Analisador XML', 'versao' => '3.0', 'status' => 'Ativa', 'path' => '/apps/xml-analyzer'],
            ['nome' => 'Backup Tool', 'versao' => '4.2', 'status' => 'Inativa', 'path' => '/mnt/backup/run.sh'],
            ['nome' => 'Conversor CSV', 'versao' => '1.8', 'status' => 'Ativa', 'path' => 'C:\tools\csv.exe'],
            ['nome' => 'Minificador JS', 'versao' => '2.0', 'status' => 'Ativa', 'path' => 'https://tools.com/jsmin'],
            ['nome' => 'Validador JSON', 'versao' => '1.2', 'status' => 'Ativa', 'path' => '/usr/bin/json-validator'],
            ['nome' => 'OCR Reader', 'versao' => '5.3', 'status' => 'Inativa', 'path' => 'https://ocr.ai/download'],
            ['nome' => 'Image Optimizer', 'versao' => '3.9', 'status' => 'Ativa', 'path' => '/opt/imgopt/run.sh'],
        ];

        foreach ($ferramentas as $item) {
            Ferramenta::create($item);
        }
    }
}
