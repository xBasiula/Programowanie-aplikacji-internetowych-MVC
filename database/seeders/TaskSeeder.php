<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Design new landing page',
                'description' => 'Create a modern, responsive landing page with hero section, features, and call-to-action buttons',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(3),
            ],
            [
                'title' => 'Fix authentication bug',
                'description' => 'Users are getting logged out randomly. Need to investigate session handling and token expiration',
                'status' => 'todo',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(1),
            ],
            [
                'title' => 'Update documentation',
                'description' => 'Add API documentation for new endpoints and update installation guide',
                'status' => 'todo',
                'priority' => 'medium',
                'due_date' => Carbon::now()->addDays(7),
            ],
            [
                'title' => 'Implement dark mode',
                'description' => 'Add dark mode toggle with persistent user preference storage',
                'status' => 'todo',
                'priority' => 'low',
                'due_date' => Carbon::now()->addDays(14),
            ],
            [
                'title' => 'Database optimization',
                'description' => 'Add indexes to frequently queried columns and optimize slow queries',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(2),
            ],
            [
                'title' => 'Write unit tests',
                'description' => 'Create comprehensive unit tests for TaskController and Task model',
                'status' => 'todo',
                'priority' => 'medium',
                'due_date' => Carbon::now()->addDays(5),
            ],
            [
                'title' => 'Deploy to production',
                'description' => 'Deploy latest version to production server and verify all features work correctly',
                'status' => 'done',
                'priority' => 'high',
                'due_date' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Create user dashboard',
                'description' => 'Design and implement user dashboard with statistics, recent activity, and quick actions',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => Carbon::now()->addDays(10),
            ],
            [
                'title' => 'Set up CI/CD pipeline',
                'description' => 'Configure GitHub Actions for automated testing and deployment',
                'status' => 'done',
                'priority' => 'medium',
                'due_date' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Add email notifications',
                'description' => 'Send email notifications for task assignments, updates, and due date reminders',
                'status' => 'todo',
                'priority' => 'medium',
                'due_date' => Carbon::now()->addDays(8),
            ],
            [
                'title' => 'Refactor legacy code',
                'description' => 'Clean up old code in the user module and apply modern PHP patterns',
                'status' => 'todo',
                'priority' => 'low',
                'due_date' => Carbon::now()->addDays(20),
            ],
            [
                'title' => 'Mobile app design',
                'description' => 'Create mockups and wireframes for mobile application (iOS and Android)',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(6),
            ],
            [
                'title' => 'Security audit',
                'description' => 'Perform comprehensive security audit and fix any vulnerabilities found',
                'status' => 'done',
                'priority' => 'high',
                'due_date' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Add search functionality',
                'description' => 'Implement full-text search for tasks with filters and sorting options',
                'status' => 'todo',
                'priority' => 'medium',
                'due_date' => Carbon::now()->addDays(12),
            ],
            [
                'title' => 'Performance testing',
                'description' => 'Run load tests and identify bottlenecks in the application',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(4),
            ],
            [
                'title' => 'Create admin panel',
                'description' => 'Build admin dashboard for managing users, tasks, and system settings',
                'status' => 'todo',
                'priority' => 'medium',
                'due_date' => Carbon::now()->addDays(15),
            ],
            [
                'title' => 'Integrate payment gateway',
                'description' => 'Add Stripe integration for subscription payments and invoice generation',
                'status' => 'todo',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(9),
            ],
            [
                'title' => 'Code review session',
                'description' => 'Review pull requests and provide feedback to team members',
                'status' => 'done',
                'priority' => 'medium',
                'due_date' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Update dependencies',
                'description' => 'Update all npm and composer packages to latest stable versions',
                'status' => 'todo',
                'priority' => 'low',
                'due_date' => Carbon::now()->addDays(30),
            ],
            [
                'title' => 'Client presentation',
                'description' => 'Prepare and deliver presentation showcasing new features and roadmap',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(2),
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
