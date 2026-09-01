<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Idempotent: skip if customers already exist
        if (Customer::count() > 0) {
            return;
        }

        $demoCustomers = [
            [
                'name' => 'Aria Chen',
                'email' => 'aria.chen@meridian.co',
                'phone' => '(415) 555-0182',
                'company' => 'Meridian Analytics',
                'notes' => 'Key decision-maker for the analytics platform refresh. Prefers email communication. Met at SaaSConf 2024.',
            ],
            [
                'name' => 'Marcus Okonkwo',
                'email' => 'm.okonkwo@nova-financial.com',
                'phone' => '(212) 555-0347',
                'company' => 'Nova Financial Partners',
                'notes' => 'CFO evaluating budgeting tools. Has a Q3 deadline. Requested a custom demo for the treasury team.',
            ],
            [
                'name' => 'Priya Kapoor',
                'email' => 'priya@stellartech.io',
                'phone' => '(206) 555-0911',
                'company' => 'Stellar Technologies',
                'notes' => 'Head of engineering. Interested in API-first integrations. Current stack is AWS + Kubernetes.',
            ],
            [
                'name' => 'James Holloway',
                'email' => 'james.holloway@ridgeway-consulting.com',
                'phone' => '(312) 555-0423',
                'company' => 'Ridgeway Consulting',
                'notes' => 'Managing partner. Looking for a white-label CRM solution for their client base. Needs multi-tenancy.',
            ],
            [
                'name' => 'Elena Vasquez',
                'email' => 'e.vasquez@greenfield-logistics.com',
                'phone' => '(713) 555-0765',
                'company' => 'Greenfield Logistics',
                'notes' => 'Operations director. Currently migrating from spreadsheets to a proper CRM. 200+ contacts to import.',
            ],
            [
                'name' => 'David Lindström',
                'email' => 'david.lindstrom@nordic-design.se',
                'phone' => '+46 70 555 12 34',
                'company' => 'Nordic Design Studio',
                'notes' => 'Founder and creative director. Small team of 8. Needs simple contact management without overhead.',
            ],
            [
                'name' => 'Yuki Tanaka',
                'email' => 'y.tanaka@sakura-ventures.jp',
                'phone' => '+81 3-5555-0187',
                'company' => 'Sakura Ventures',
                'notes' => 'Investment analyst tracking portfolio company contacts. Needs tagging and segmentation features.',
            ],
            [
                'name' => 'Fatima Al-Rashid',
                'email' => 'fatima@oasis-holdings.ae',
                'phone' => '+971 4 555 6789',
                'company' => 'Oasis Holdings Group',
                'notes' => 'VP of strategic partnerships. Expanding into European markets. Interested in localization capabilities.',
            ],
            [
                'name' => 'Thomas Bergeron',
                'email' => 't.bergeron@acme-construction.ca',
                'phone' => '(514) 555-0298',
                'company' => 'Acme Construction Quebec',
                'notes' => 'Project manager. Needs to track subcontractor contacts per project site. Current system is paper-based.',
            ],
            [
                'name' => 'Olivia Nkosi',
                'email' => 'o.nkosi@trailblazer-edtech.org',
                'phone' => '(202) 555-0816',
                'company' => 'Trailblazer EdTech',
                'notes' => 'Executive director of a nonprofit. Evaluating affordable CRM options for donor and partner management.',
            ],
        ];

        foreach ($demoCustomers as $data) {
            Customer::create($data);
        }
    }
}
