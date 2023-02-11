<?php
namespace App\Enums;

enum ProjectStatus: string {
    case OPEN = 'OPEN';
    case DOING = 'DOING';
    case DONE = 'DONE';
}