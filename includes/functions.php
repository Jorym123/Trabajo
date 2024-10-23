<?php
    require_once __DIR__ .'/../config/database.php';

    function obtenerTareas() {
        global $tasksCollection;
        return $tasksCollection->find();
    }

    function formatDate($dateString) {
        $dateTime = new DateTime($dateString);
        return $dateTime->format('y-m-d');
    }
    function agregarTarea($curso, $descripcion, $fechaEntrega) {
        global $tasksCollection;
        $newTask = [
            'curso' => $curso,
            'descripcion' => $descripcion,
            'fechaentrega' => $fechaentrega
        ];
        return $tasksCollection->insertOne($newTask);
    }
    function obtenerTareaPorId($id) {
        global $tasksCollection;
        return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
    function actualizarTarea($id, $curso, $descripcion, $fechaEntrega, $completada) {
        global $tasksCollection;
        $update = [
            '$set' => [
                'curso' => $curso,
                'descripcion' => $descripcion,
                'fechaEntrega' => $fechaEntrega,
                'completada' => $completada
            ]
        ];
        return $tasksCollection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], $update);
    }
    
?>