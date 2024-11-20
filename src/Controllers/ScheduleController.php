<?php
// src/Controllers/ScheduleController.php

namespace App\Controllers;

use App\Models\Schedule;

class ScheduleController {
    public function index() {
        $scheduleModel = new Schedule();
        $schedules = $scheduleModel->getAllSchedules();
        return $schedules;
    }

    public function save($data) {
        $scheduleModel = new Schedule();
        $scheduleModel->saveSchedule($data);
    }

    public function delete($day) {
        $scheduleModel = new Schedule();
        $scheduleModel->deleteSchedule($day);
    }
}
