<?php
// exportar.php

// Incluye el archivo de configuración de la base de datos
require_once "configuraciones/database.php";
// Incluye el archivo del modelo
require_once "modelos/exportarModel.php";
// Incluye la biblioteca PhpSpreadsheet
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\BaseWriter;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Border;

// Verifica si se ha enviado la solicitud para exportar a Excel
if (isset($_POST['action']) && $_POST['action'] === 'exportar') {
    // Lógica para exportar a Excel
    $exportarModel = new ExportarModel();
    $data = $exportarModel->obtenerDatosGuardados();

    // Crear un nuevo objeto Spreadsheet
    $spreadsheet = new Spreadsheet();

    // Establecer propiedades del documento
    $spreadsheet->getProperties()->setTitle("Exportar Datos")->setDescription("Datos exportados de la base de datos");

    // Crear una hoja de cálculo activa
    $sheet = $spreadsheet->getActiveSheet();

    // Estilos del encabezado
    $headerStyle = [
        'font' => [
            'bold' => true,
            'color' => ['rgb' => '0067B3'],
            'name' => 'Times New Roman',
            'size' => 16,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
            ],
        ],
    ];

    // Establecer los encabezados de columna
    $encabezados = ['ID', 'Área', 'Fecha', 'Línea/Equipo', 'Autor', 'No. Empl', 'Síntoma/Avería', 'Descripción Trabajo', 'Departamento', 'Prioridad', 'No. OT', 'No. ST', 'Fecha Real de Creacion'];
    $columna = 'A';
    $fila = 1;
    foreach ($encabezados as $encabezado) {
        $sheet->setCellValue($columna . $fila, $encabezado);
        $sheet->getStyle($columna . $fila)->applyFromArray($headerStyle);
        $columna++;
    }

    // Llenar los datos en las celdas
    $fila = 2;
    foreach ($data as $registro) {
        $columna = 'A';
        foreach ($registro as $valor) {
            $sheet->setCellValue($columna . $fila, $valor);
            $sheet->getColumnDimension($columna)->setAutoSize(true); // Ajustar el ancho de la columna aquíS
            $columna++;
        }
        $fila++;
    }
    // Establecer el nombre del archivo y la ruta completa
    $archivo = "datos.xlsx";
    $rutaCompleta = "C:/Users/edgar/Downloads/" . $archivo;

    // Guardar el archivo Excel en la ubicación especificada;
    $writer = new Xlsx($spreadsheet);
    $writer->save($rutaCompleta);

    // Descargar el archivo Excel generado
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $archivo . '"');
    header('Cache-Control: max-age=0');

    // Leer el archivo y enviarlo al flujo de salida
    readfile($rutaCompleta);

    // Eliminar el archivo generado
    unlink($rutaCompleta);

    // Finalizar la ejecución del script
    exit();
}
?>
